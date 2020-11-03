<?php
Class Chapter extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model san pham
        $this->load->model('chapter_model');
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
        $total_rows = $this->chapter_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        $config = array();
        $config['base_url']    = base_url('chapter/index');
        $config['total_rows']  = $total_rows;
        $config['per_page']    = 3;
        $config['uri_segment'] = 3;
        $config['next_link']   = "Trang kế tiếp";
        $config['prev_link']   = "Trang trước";
    
        //Khoi tao phan trang
        $this->pagination->initialize($config);
    
        //lay danh sach san pham trong csdl,moi lan lay limit 3 san pham
        //$this->uri->segment(n): lay ra phan doan thu n tren link url
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        $chapters = $this->chapter_model->get_list($input);
        $this->data['list'] = $chapters;
    
        // Hien thi view
        $this->data['temp'] = 'site/chapter/index';
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
        $this->load->model('user_model');
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $output = explode("-",$id);
        $id =  $output[count($output)-1];
        
        $chapter = $this->chapter_model->get_info($id);
        if(!$chapter) redirect();
        //lấy số điểm trung bình đánh giá
        // $chapter->raty = ($chapter->rate_count > 0) ? $chapter->rate_total/$chapter->rate_count : 0;
        
        $this->data['chapter'] = $chapter;
        
        //cap nhat lai luot xem cua san pham
        $data = array();
        $data['view'] = $chapter->view + 1;
        $this->chapter_model->update($chapter->id, $data);
        
        //lay thong tin cua danh mục san pham
        $catalog = $this->catalog_model->get_list();
        $this->data['catalogs'] = $catalog;

        //lay danh mục chương/chapter
        $this->load->model('chapter_model');
        $chapter = $this->chapter_model->get_info($id);
        $this->data['chapter'] = $chapter;
        $input_chapter = array();
        $input_chapter['where'] = array('story_id' => $chapter->story_id);
        $list = $this->chapter_model->get_list($input_chapter);
        $this->data['list_chapters'] = $list;

        //lấy tên truyện
        $this->load->model('story_model');
        $story = $this->story_model->get_info($chapter->story_id);
        $this->data['story'] = $story;

        //lấy truyện cùng danh mục
        $story_catalog = $this->story_model->get_info($chapter->story_id);
        $input_stories = array();
        $input_stories['where'] = array('category_id' => $story_catalog->category_id);
        $list_stories = $this->story_model->get_list($input_stories);
        $this->data['list_stories'] = $list_stories;

        //Lấy danh sách bình luận
        $input_comment = array();
        $input_comment['where'] = array('post_id'=> $chapter->id);
        $this->load->model('comment_model');
        $comments = $this->comment_model->get_list($input_comment);
        $this->data['comments'] = $comments;
        // Chap-Truyện vừa xem
        $recentlyChapViewed = $this->session->userdata('recentlyChapViewed');
        if(!is_array($recentlyChapViewed)){
            $recentlyChapViewed = array();  
        }
        //change this to 10
        if(sizeof($recentlyChapViewed)>5){
            array_shift($recentlyChapViewed);
        }
        //here set your id or page or whatever
        if(!in_array($id,$recentlyChapViewed)){           
            array_push($recentlyChapViewed,$id);          
         }
        $this->session->set_userdata('recentlyChapViewed', $recentlyChapViewed);    
        $recentlyChapViewed = array_reverse($recentlyChapViewed);
        $this->data['recentlyChapViewed'] = $recentlyChapViewed;
        //hiển thị ra view
        $this->data['temp'] = 'site/chapter/view';
        $this->load->view('site/layout', $this->data);
    }
    /**
     * Description: Lấy danh sách chapter
     * Function: list()
     * @author: Di
     * @params: id
     * @return: Danh sách chap theo từ id
     */
    function list(){
        $id = $this->uri->rsegment(4);
        $output = explode("-",$id);
        $id =  $output[count($output)-1];
        //lay danh mục chương/chapter
        $this->load->model('chapter_model');
        
        $input_chapter = array();
        $input_chapter['where'] = array('story_id' => $id);
        $list = $this->chapter_model->get_list($input_chapter);
        $this->data['list_chapters'] = $list;

        //lấy tên truyện
        $this->load->model('story_model');
        $story = $this->story_model->get_info($id);
        $this->data['story'] = $story;

         //lay danh sach truyện truyện mới
	    $input_story = array();
        $input_story['limit'] = array(10, 0);
        $input_story['order'] = array('created', 'DESC');
	    $story_newest = $this->story_model->get_list($input_story);
        $this->data['story_newest'] = $story_newest;

        //hiển thị ra view
        $this->data['temp'] = 'site/chapter/list';
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
        $list = $this->chapter_model->get_list($input);
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
            $this->data['temp'] = 'site/chapter/search';
            $this->load->view('site/layout', $this->data);
        }
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
        $id = (!is_numeric($id)) ? 0 : $id;
        $info = $this->chapter_model->get_info($id);//lấy thông tin sản phẩm cần đánh giá
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
        $this->chapter_model->update($id,$data);
    
        // Khai bao du lieu tra ve
        $result['complete'] = TRUE;
        $result['msg']      = 'Cám ơn bạn đã đánh giá cho sản phẩm này';
        $output             = json_encode($result);//trả về mã json
        echo $output;
        exit();
    }
}



