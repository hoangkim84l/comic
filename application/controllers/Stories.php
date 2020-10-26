<?php
Class Stories extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model san pham
        $this->load->model('story_model');
        $this->load->model('lovelists_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
    }

    /**
     * Description: Trang danh sách truyện
     * Function: index()
     * @author: Di
     * @params: none
     * @return: Danh sách truyện
     */
    public function index()
    {
        //Buoc 1:load thu vien phan trang
        $this->load->library('pagination');
        //Buoc 2:Cau hinh cho phan trang
        //lay tong so luong san pham tu trong csdl
        $total_rows = $this->story_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        $config = array();
        $config['base_url']    = base_url('stories/index');
        $config['total_rows']  = $total_rows;
        $config['per_page']    = 9;
        $config['uri_segment'] = 3;
        $config['next_link']   = "Trang kế tiếp";
        $config['prev_link']   = "Trang trước";
    
        //Khoi tao phan trang
        $this->pagination->initialize($config);
    
        //lay danh sach san pham trong csdl,moi lan lay limit 3 san pham
        //$this->uri->segment(n): lay ra phan doan thu n tren link url
        $segment = $this->uri->segment(3);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        $stories = $this->story_model->get_list($input);
        $this->data['list_story'] = $stories;
    
          //lay danh sach truyện view cao
	    $input_story = array();
        $input_story['limit'] = array(10, 0);
        $input_story['order'] = array('view', 'DESC');
	    $story_newest = $this->story_model->get_list($input_story);
        $this->data['story_newest'] = $story_newest;
        
        //lay thong tin cua danh mục san pham
        $catalogs = $this->catalog_model->get_list();
        $this->data['catalogs'] = $catalogs;

        // Hien thi view
        $this->data['temp'] = 'site/stories/index';
        $this->load->view('site/layout', $this->data);
    }
    
    /**
     * Description: Xem chi tiết truyện
     * Function: view()
     * @author: Di
     * @params: id
     * @return: Chi tiết của truyện, lấy danh sách danh mục, danh sách chương/chapter theo truyện
     */
    function view()
    {
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $output = explode("-",$id);
        $id =  $output[count($output)-1];
        // var_dump($last_key);
        $stories = $this->story_model->get_info($id);
        if(!$stories) redirect();
        //lấy số điểm trung bình đánh giá
        // $stories->raty = ($stories->rate_count > 0) ? $stories->rate_total/$stories->rate_count : 0;
        
        $this->data['stories'] = $stories;
        
        //lấy danh sách ảnh sản phẩm kèm theo
        $image_list = @json_decode($stories->image_list);
        $this->data['image_list'] = $image_list;
        
        //cap nhat lai luot xem cua san pham
        $data = array();
        $data['view'] = $stories->view + 1;
        $this->story_model->update($stories->id, $data);
        
        //lay thong tin cua danh mục san pham
        $catalog = $this->catalog_model->get_list();
        $this->data['catalogs'] = $catalog;

        //Lấy tên danh mục
        $name_catalog = $this->catalog_model->get_info($stories->category_id);
        $this->data['name_catalog'] = $name_catalog;

        //lay danh mục chương/chapter
        $this->load->model('chapter_model');
        $chapter = $this->chapter_model->get_info($id);
        
        $this->data['chapter'] = $chapter;
        $input = array();
        $input['where'] = array('story_id' => $id);
        $list = $this->chapter_model->get_list($input);
        $this->data['list_chapters'] = $list;

        //danh sách truyện mới
        $this->load->model('story_model');
		$input_stories = array();
        $input_stories['limit'] = array(5, 0);
        $results = $this->story_model->get_list($input_stories);
        $this->data['view_stories'] = $results;
        // Truyện vừa xem
        $recentlyViewed = $this->session->userdata('recentlyViewed');
        if(!is_array($recentlyViewed)){
            $recentlyViewed = array();  
        }
        //change this to 10
        if(sizeof($recentlyViewed)>5){
            array_shift($recentlyViewed);
        }
        //here set your id or page or whatever
        if(!in_array($id,$recentlyViewed)){           
            array_push($recentlyViewed,$id);          
         }
        $this->session->set_userdata('recentlyViewed', $recentlyViewed);    
        $recentlyViewed = array_reverse($recentlyViewed);
        $this->data['recentlyViewed'] = $recentlyViewed;
        //hiển thị ra view
        $this->data['temp'] = 'site/stories/view';
        $this->load->view('site/layout', $this->data);
    }
    
    /**
     * Description: tìm kiếm tên truyện
     * Function: search()
     * @author: Di
     * @params: id, tên truyện
     * @return: Danh sách truyện theo từ khóa
     */
    function search()
    {
        if($this->uri->rsegment('3') == 1)
        {
            //lay du lieu tu autocomplete
            $key =  $this->input->get('term');
        }else{
            $key =  $this->input->get('key-search');
        }
        
        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->story_model->get_list($input);
        $this->data['list']  = $list;
        
        if($this->uri->rsegment('3') == 1)
        {
            //xu ly autocomplete
            $result = array();
            foreach ($list as $row)
            {
                $item = array();
                $item['id'] = $row->id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            //du lieu tra ve duoi dang json
            die(json_encode($result));
        }else{
            //load view
            $this->data['temp'] = 'site/stories/search';
            $this->load->view('site/layout', $this->data);
        }
    }
    
    /**
     * Description: tìm kiếm nâng cao
     * Function: search_adv()
     * @author: Di
     * @params: id, tên truyện
     * @return: Danh sách truyện theo từ khóa
     */
    function search_adv()
    {
        $input = array();
        $input['limit'] = array(12,0);
        //kiem tra co thuc hien loc du lieu hay khong
        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('name', $name);
        }
        $status = $this->input->get('status');
        if ($status) {
            $input['where'] = array('continues' => $status);
        }
        $category_ids = $this->input->get('category_id');
        if ($category_ids) {
            foreach($category_ids as $row){
                    $this->db->or_like('category_id', $row);
                }
            }
        //lay danh sach truyen
        $list = $this->story_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        //load view
        $this->data['temp'] = 'site/stories/search_adv';
        $this->load->view('site/layout', $this->data);
        
    }

    /**
     * Description: Thêm danh sách yêu thích
     * Function: love_lists()
     * @author: Di
     * @params: user_id, story_id
     * @return: lưu vô datbase
     */
    function love_lists(){
        
        $this->form_validation->set_rules('user_id', 'Bạn chưa đăng nhập nè', 'required');
        $this->form_validation->set_rules('story_id', 'Không thấy id truyện', 'required');
        if ($this->form_validation->run()) {
            //them vao csdl
            $user_id     = $this->input->post('user_id');
            $story_id    = $this->input->post('story_id');
            $user_email    = $this->input->post('user_email');
        
            $data = array(
                'user_email' => $user_email,
                'user_id'   => $user_id,
                'story_id'  =>$story_id,
                'status'    => 1,
                'created'   => date("Y-m-d H:i:s"),
            );
            if ($this->lovelists_model->create($data)) {
                
                    $this->session->set_flashdata('message', 'Bằng hữu đã thêm vào danh sách yêu thích thành công.');             
            } else {
                $this->session->set_flashdata('message', 'Opps không thêm được, liên hệ quản trị viên về lổi này.');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    /**
     * Description: tìm kiếm tên truyện autocomplete
     * Function: fetch()
     * @author: Di
     * @params: tên truyện
     * @return: Danh sách truyện theo từ khóa
     */
    function fetch(){
        $query = $this->input->get('query');
        $this->db->like('name', $query);


        $data = $this->db->get("stories")->result();


        echo json_encode( $data);
    }

    /**
     * Description: Đánh giá truyện
     * Function: raty()
     * @author: Di
     * @params: id
     * @return: Theo mức độ 4 5 6..
     */
    function raty()
    {
        $result = array();
    
        // Lay thong tin
        $id = $this->input->post('id');//lấy id sản phẩm gửi lên từ trang ajax
        var_dump($id);
        $id = (!is_numeric($id)) ? 0 : $id;
        $info = $this->story_model->get_info($id);//lấy thông tin sản phẩm cần đánh giá
        if (!$info)
        {
            exit();
        }
    
        //kiem tra xem khach da binh chon hay chua
        $raty    = $this->session->userdata('session_raty');
        $raty   = (!is_array($raty)) ? array() : $raty;
        $result = array();
        //nếu đã tồn tại id sản phẩm này trong session đánh giá
        if(isset($raty[$id]))
        {
            $result['msg'] = 'Bạn chỉ được đánh giá 1 lần cho sản phẩm này';
            $output        = json_encode($result);//trả về mã json
            echo $output;
            exit();
        }
        //cap nhat trang thai da binh chon
        $raty[$id] = TRUE;
        $this->session->set_userdata('session_raty', $raty);
    
        $score = $this->input->post('score');//lấy số điểm post lên từ trang ajax
        $data  = array();
        $data['rate_total'] = $info->rate_total + $score;//tổng số điểm
        $data['rate_count'] = $info->rate_count + 1;//tổng số lượt đánh giá
        //cập nhật lại đánh gia cho sản phẩm
        $this->story_model->update($id,$data);
    
        // Khai bao du lieu tra ve
        $result['complete'] = TRUE;
        $result['msg']      = 'Cám ơn bạn đã đánh giá cho sản phẩm này';
        $output             = json_encode($result);//trả về mã json
        echo $output;
        exit();
    }
}



