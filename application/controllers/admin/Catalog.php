<?php
Class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_model');
    }
    
    /**
     * Description: Lấy ra danh sách danh mục của truyện
     * Function: index()
     * @author: Di
     * @params: none
     * @return: list of category
     */
    function index()
    {
        $list = $this->catalog_model->get_list();
        $this->data['list'] = $list;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/catalog/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Thêm mới dữ liệu
     * Function: add()
     * @author: Di
     * @params: 
     * @return: Store data to database
     */
    function add()
    {
		$config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'catalog',
        );
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
		$this->load->library('slug_library',$config);
        $this->load->helper('text');
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
                
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'parent_id' => $parent_id,
                    'description' => $this->input->post('description'),
                    'date_created' => date("Y-m-d H:i:s"),
                    'date_updated' => date("Y-m-d H:i:s"),
                );
				$name = str_replace("'", '-', $name);
                $name = str_replace(" ", '-', $name);
                $name = str_replace(",", '', $name);
                $name = str_replace("!", '', $name);
                $name = str_replace("(", '', $name);
                $name = str_replace(")", '', $name);
                $name = str_replace("[", '', $name);
                $name = str_replace("]", '', $name);
                $data['slug'] = convert_accented_characters($name);
                //them moi vao csdl
                if($this->catalog_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('catalog'));
            }
        }
        
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list']  = $list;
        
        $this->data['temp'] = 'admin/catalog/add';
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
            'table' => 'catalog',
        );
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
		$this->load->library('slug_library',$config);
        $this->load->helper('text');
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->catalog_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('catalog'));
        }
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
    
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
    
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'parent_id' => $parent_id,
                    'description' => $this->input->post('description'),
                    'date_updated' => date("Y-m-d H:i:s"),
                );
                $name = str_replace("'", '-', $name);
                $name = str_replace(" ", '-', $name);
                $name = str_replace(",", '', $name);
                $name = str_replace("!", '', $name);
                $name = str_replace("(", '', $name);
                $name = str_replace(")", '', $name);
                $name = str_replace("[", '', $name);
                $name = str_replace("]", '', $name);
                $data['slug'] = convert_accented_characters($name);
                //them moi vao csdl
                if($this->catalog_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('catalog'));
            }
        }
    
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list']  = $list;
    
        $this->data['temp'] = 'admin/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Xóa danh mục
     * Function: delete()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('catalog'));
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
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id , false);
        }
    }
    
    /**
     * Description: Xóa danh mục vaf các bảng liên quan
     * Function: _del()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    private function _del($id, $rediect = true)
    {
        $info = $this->catalog_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
        if($product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //xoa du lieu
        $this->catalog_model->delete($id);
        
    }
}

