<?php
Class Story extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('story_model');
        
    }
    
    /*
     * Hien thi danh sach story
     */
    function index()
    {
        //lay tong so luong ta ca cac story trong websit
        $total_rows = $this->story_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $input = array();
       
        //lay danh sach story
        $list = $this->story_model->get_list($input);
        $this->data['list'] = $list;

         //lay danh sach danh muc truyện
         $this->load->model('catalog_model');
         $input = array();
         $input['where'] = array('parent_id' => 0);
         $catalogs = $this->catalog_model->get_list($input);
         foreach ($catalogs as $row)
         {
             $input['where'] = array('parent_id' => $row->id);
             $subs = $this->catalog_model->get_list($input);
             $row->subs = $subs;
         }
         $this->data['catalogs'] = $catalogs;
       
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/story/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them story moi
     */
    function add()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'stories',
        );

        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('slug_library',$config);

        //lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên story', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                $name        = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'category_id' => $this->input->post('category_id'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                    'created' => date("Y-m-d H:i:s"),
                    'updated' => date("Y-m-d H:i:s"),
                ); 
                $data['slug'] = $this->slug_library->create_uri($name);
                //them moi vao csdl
                if($this->story_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('story'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/story/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua story
     */
    function edit()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'stories',
        );

        $id = $this->uri->rsegment('3');
        $story = $this->story_model->get_info($id);
        if(!$story)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại story này');
            redirect(admin_url('story'));
        }
        $this->data['story'] = $story;
       //lay danh sach danh muc san pham
       $this->load->model('catalog_model');
       $input = array();
       $input['where'] = array('parent_id' => 0);
       $catalogs = $this->catalog_model->get_list($input);
       foreach ($catalogs as $row)
       {
           $input['where'] = array('parent_id' => $row->id);
           $subs = $this->catalog_model->get_list($input);
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
            $this->form_validation->set_rules('name', 'Tên story', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'category_id' => $this->input->post('category_id'),
                    'description'       => $this->input->post('description'),
                    'updated' => date("Y-m-d H:i:s"),
                ); 
                $data['slug'] = $this->slug_library->create_uri($name);
                //them moi vao csdl
                if($this->story_model->update($story->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('story'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/story/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa truyện thành công');
        redirect(admin_url('story'));
    }
    
    /*
     * Xóa nhiều story
     */
    function delete_all()
    {
        //lay tat ca id story muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa story
     */
    private function _del($id)
    {
        $story = $this->story_model->get_info($id);
        if(!$story)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại truyện này');
            redirect(admin_url('story'));
        }
        //thuc hien xoa story
        $this->story_model->delete($id);
        //xoa cac anh cua story
        $image_link = './upload/story/'.$story->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        
    }
}



