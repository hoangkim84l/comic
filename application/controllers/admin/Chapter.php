<?php
Class Chapter extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('chapter_model');
        $this->load->model('story_model');
        $this->load->model('lovelists_model');
    }
    
    /**
     * Description: Hiển thị danh sách chương phân trang 15 chương 1 trang
     * Function: index()
     * @author: Di
     * @params: none
     * @return: list of chapter
     */
    function index()
    {
        //lay tong so luong ta ca cac chapter trong websit
        $total_rows = $this->chapter_model->get_total();

        $this->data['total_rows'] = $total_rows;

        //Load thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = admin_url('chapter/index');
        $config['per_page'] = 300000;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'Trang kế';
        $config['prev_link'] = 'Trang trước';

        //khởi tạo các cấu hình vào phân trang
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $segment =intval($segment);
            
        //lấy data theo dữ liệu phân trang
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiểm tra coi minh có filter dữ liệu hay không
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0){
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name){
            $input['like'] = array('name', $name);
        }
        $story_id = $this->input->get('story_id');
        $story_id = intval($story_id);
        $number_custom =  str_replace('/','',$this->input->get('page')) ;
        if($story_id > 0){
            $this->load->library('pagination');
            $input['where']['story_id'] = $story_id;
            
            $totalrow = $this->chapter_model->get_list($input);
            //set lai số lượng chap
            $this->data['totalrow'] = $totalrow;
        }
        
        //lấy danh sách theo điều kiện
        $list = $this->chapter_model->get_list($input);
        $this->data['list'] = $list;

        //load danh sách truyện
        $this->load->model('story_model');
        $input = array();
        $catalogs = $this->story_model->get_list($input);
        foreach($catalogs as $row){
            $subs = $this->story_model->get_list($input);
            $row->subs =$subs;
        }
        $this->data['catalogs'] = $catalogs;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/chapter/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Thêm chương mới
     * Function: add()
     * @author: Di
     * @params: .
     * @return: Store data to database
     */
    function add()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'chapters',
        );
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('slug_library',$config);
        $this->load->helper('text');

        //lay danh sach danh muc truyện
        $this->load->model('story_model');
        $input = array();
        $catalogs = $this->story_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $subs = $this->story_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên chapter', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //lay ten file anh minh hoa duoc update len
                $this->load->library('email'); // Note: no $config param needed
                $this->load->model('lovelists_model');
                $this->load->library('upload_library');
                $upload_path = './upload/chapter';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $upload_audio_data = $this->upload_library->upload($upload_path, 'audio');  
                $image_link = '';
                $audio_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                if(isset($upload_audio_data['file_name']))
                {
                    $audio_link = $upload_audio_data['file_name'];
                }
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'          => $name,
                    'image_link'    => $image_link,
                    'audio_link'    => $audio_link,
                    'story_id'      => $this->input->post('category_id'),
                    'show_img'      => $this->input->post('show_img'),
                    'content'       => $this->input->post('content'),
                    'site_title'    => $this->input->post('site_title'),
                    'meta_desc'     => $this->input->post('meta_desc'),
                    'meta_key'      => $this->input->post('meta_key'),
                    'author'        => $this->input->post('author'),
                    'status'        => $this->input->post('status'),
                    'created'       => date("Y-m-d H:i:s"),
                    'ordering'      => $this->input->post('ordering'),
                ); 
                // Replace unsupported characters (add your owns if necessary)
                $data['slug'] = $this->create_slug($name);
               
                //lấy danh sách user cần gởi mail
                $input = array();
                $input['where']['story_id'] =$this->input->post('category_id');
                $loveLists = $this->lovelists_model->get_list($input);
                $listUsers = '';
                foreach($loveLists as $row){
                    $listUsers .= $row->user_email.", ";
                }
                //them moi vao csdl
                if($this->chapter_model->create($data))
                {
                    //tạo link chap
                    $storyID = $this->db->insert_id();
                    $storyName = $this->story_model->get_info($this->input->post('category_id'));
                    $custom_link = base_url()."truyen/".$storyName->slug.'-'.$data['slug'].'-'.$storyID;
                    $linkSend = '<p>Truyện bạn theo dõi đã có chap mới click vào link bên dưới để xem ngay nha</p>'.PHP_EOL.
                                '<p>----</p>' .PHP_EOL.
                                '<p>Cafe Sữa Team.</p>'.PHP_EOL.
                                '<p>Lướt cà phê sữa, muốn đọc nữa, không muốn dừng.</p>'.PHP_EOL.
                                '<p>Đội ngũ quản trị viên Cafe Sữa Team</p>'.PHP_EOL.
                                '<p> </p>'.PHP_EOL.
                                '<p>Ho Chi Minh City, VietNam</p>'.PHP_EOL.
                                '<p>Tel: (035) 6 000 439</p>'.PHP_EOL.
                                '<p>Email: teamcafesua@gmail.com</p>'.PHP_EOL.
                                    $custom_link;
                    //send mail
                    $from = 'teamcafesua@gmail.com';
                    $to = $listUsers;
                    $subject = "[Chap/Chương Mới] Truyện bạn đang theo dõi vừa được cập nhật";
                    $message = $linkSend;
                    $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
                    //2 ways
                    $this->email->from('teamcafesua@gmail.com');
                    $this->email->to($listUsers);
                    $this->email->subject('[Chap/Chương Mới] Truyện bạn đang theo dõi vừa được cập nhật');
                    $this->email->message($linkSend);
                    $this->email->send(); 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('chapter'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/chapter/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Cập nhật thông tin
     * Function: edit()
     * @author: Di
     * @params: id.
     * @return: Store new data to database
     */
    function edit()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'chapters',
        );
        
        $id = $this->uri->rsegment('3');
        $chapter = $this->chapter_model->get_info($id);
        if(!$chapter)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại chương này');
            redirect(admin_url('chapter'));
        }
        $this->data['chapter'] = $chapter;
       
        //lay danh sach danh muc truyện
        $this->load->model('story_model');
        $input = array();
        $catalogs = $this->story_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $subs = $this->story_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('slug_library',$config);
        $this->load->helper('text');

        // $this->load->library('my_slug_library');
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên chương', 'required');
            $this->form_validation->set_rules('category_id', 'Tên truyện là bắt buộc', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/chapter';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $upload_audio_data = $this->upload_library->upload($upload_path, 'audio');
                $image_link = '';
                $audio_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                if(isset($upload_audio_data['file_name']))
                {
                    $audio_link = $upload_audio_data['file_name'];
                }
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'          => $name,
                    'story_id'      => $this->input->post('category_id'),
                    'show_img'      => $this->input->post('show_img'),
                    'status'        => $this->input->post('status'),
                    'content'       => $this->input->post('content'),
                    'site_title'    => $this->input->post('site_title'),
                    'meta_desc'     => $this->input->post('meta_desc'),
                    'meta_key'      => $this->input->post('meta_key'),
                    'author'        => $this->input->post('author'),
                    // 'created'       => date("Y-m-d H:i:s"),
                    'ordering'      => $this->input->post('ordering'),
                ); 
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
                if($audio_link != '')
                {
                    $data['audio_link'] = $audio_link;
                }

                // Replace unsupported characters (add your owns if necessary)
                $data['slug'] = $this->create_slug($name);
                //them moi vao csdl
                if($this->chapter_model->update($chapter->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('chapter'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/chapter/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Xóa chương
     * Function: del()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa chapter thành công');
        redirect(admin_url('chapter'));
    }
    
    /**
     * Description: Xóa tất cả
     * Function: delete_all()
     * @author: Di
     * @params: list of id.
     * @return: Remove all data in database
     */
    function delete_all()
    {
        //lay tat ca id chapter muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /**
     * Description: Xóa truyện và ảnh  kèm theo
     * Function: del()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    private function _del($id)
    {
        $chapter = $this->chapter_model->get_info($id);
        if(!$chapter)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại chapter này');
            redirect(admin_url('chapter'));
        }
        //thuc hien xoa chapter
        $this->chapter_model->delete($id);
        //xoa cac anh cua chapter
        $image_link = './upload/chapter/'.$chapter->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        
    }

    /**
     * Description: Upto public chap
     * Function: auto_edit()
     * @author: Di
     * @params: list.
     * @return: update data to database
     */
    function auto_edit()
    {
        $input = array();
        $input['where'] = array('status' => 0);
        $input['order'] = array('id',  'asc');    
        $data_auto_update = $this->chapter_model->get_list($input);
        $i = 0;
        foreach($data_auto_update as $id_auto){
            $data = array(
                'status' => '1',
            );
            $this->chapter_model->update($id_auto->id, $data);
            if($i == 1 ){
                break;
            }
            $i++;
        }
    }

    function slugify2($string)
        {
            // Get an instance of $this
            $CI =& get_instance(); 

            $CI->load->helper('text');
            $CI->load->helper('url');

            // Replace unsupported characters (add your owns if necessary)
            // $string = str_replace("'", '-', $string);
            // $string = str_replace(".", '.', $string);
            // $string = str_replace("²", '2', $string);
            
            $search = array(
                '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                '#(ì|í|ị|ỉ|ĩ)#',
                '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                '#(đ)#',
                '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                '#(Đ)#',
                "/[^a-zA-Z0-9\-\_]/",
            );
            $replace = array(
                'a',
                'e',
                'i',
                'o',
                'u',
                'y',
                'd',
                'A',
                'E',
                'I',
                'O',
                'U',
                'Y',
                'D',
                '-',
            );
            $string = preg_replace($search, $replace, $string);
            $string = preg_replace('/(-)+/', '-', $string);
            $string = strtolower($string);

            // Slugify and return the string
            return url_title(convert_accented_characters($string), 'dash', true);
        }
        
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}



