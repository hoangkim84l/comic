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
        $config['per_page'] = 25;
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
        if($story_id > 0){
            $input['where']['story_id'] = $story_id;
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
                $data['slug'] = $this->slug_library->create_uri($name);
               
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
                    $linkSend = 'Truyện bạn theo dõi đã có chap mới click vào link bên dưới để xem ngay nha'.PHP_EOL.
                                    $custom_link;
                    //send mail
                    $from = 'teamcafesua@gmail.com';
                    $to = $listUsers;
                    $subject = "Truyện bạn yêu thích đã có chap mới:";
                    $message = $linkSend;
                    $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
                    //2 ways
                    $this->email->from('teamcafesua@gmail.com');
                    $this->email->to($listUsers);
                    $this->email->subject('Truyện bạn yêu thích đã có chap mới:');
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
                    'created'       => date("Y-m-d H:i:s"),
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
                $data['slug'] = $this->slug_library->create_uri($name);
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
}



