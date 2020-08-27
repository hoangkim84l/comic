<?php
Class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model san pham
        $this->load->model('catalog_model');
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
        $total_rows = $this->catalog_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        $config = array();
        $config['base_url']    = base_url('catalog/index');
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
        
        $catalogs = $this->catalog_model->get_list($input);
        $this->data['list'] = $catalogs;
    
        // Hien thi view
        $this->data['temp'] = 'site/catalog/index';
        $this->load->view('site/layout', $this->data);
    }
    
    /**
     * Description: Xem chi tiết truyện
     * Function: view()
     * @author: Di
     * @params: id
     * @return: Chi tiết của truyện, lấy danh sách danh mục, danh sách chương/catalog theo truyện
     */
    function view()
    {
        //lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $output = explode("-",$id);
        $id =  $output[count($output)-1];
        
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog) redirect();
        //lấy số điểm trung bình đánh giá
        // $catalog->raty = ($catalog->rate_count > 0) ? $catalog->rate_total/$catalog->rate_count : 0;
        
        $this->data['catalog'] = $catalog;
        
        //cap nhat lai luot xem cua san pham
        // $data = array();
        // $data['view'] = $catalog->view + 1;
        // $this->catalog_model->update($catalog->id, $data);
        //lấy truyện theo danh mục
        $this->load->model('story_model');
        $input = array();
        $input['where'] = array('category_id' => $id);
        $list = $this->story_model->get_list($input);
        $this->data['list_story'] = $list;
        //lay thong tin cua danh mục san pham
        $catalogs = $this->catalog_model->get_list();
        $this->data['catalogs'] = $catalogs;

        //hiển thị ra view
        $this->data['temp'] = 'site/catalog/list';
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
        $list = $this->catalog_model->get_list($input);
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
            $this->data['temp'] = 'site/catalog/search';
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
        $info = $this->catalog_model->get_info($id);//lấy thông tin sản phẩm cần đánh giá
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
        $this->catalog_model->update($id,$data);
    
        // Khai bao du lieu tra ve
        $result['complete'] = TRUE;
        $result['msg']      = 'Cám ơn bạn đã đánh giá cho sản phẩm này';
        $output             = json_encode($result);//trả về mã json
        echo $output;
        exit();
    }
}



