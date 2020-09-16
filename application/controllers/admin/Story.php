<?php
class Story extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('story_model');
    }
    
    /**
     * Description: Hiển thị danh sách truyện chia 20 records 1 trang
     * Function: index()
     * @author: Di
     * @params: none
     * @return: list of stories
     */
    public function index()
    {
        //lay tong so luong ta ca cac story trong websit
        $total_rows = $this->story_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('story/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('name', $name);
        }
        $category_id = $this->input->get('category_id');
        $category_id = intval($category_id);
        if ($category_id > 0) {
            $input['where']['category_id'] = $category_id;
        }
        
        //lay danh sach san pha
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

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/story/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Description: Thêm truyện mới
     * Function: add()
     * @author: Di
     * @params: name, slug, description, image, catagory, status, view, created, updated.
     * @return: Store data to database
     */
    public function add()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'stories',
        );

        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('slug_library', $config);

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

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên story', 'required');
            
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //lay ten file upload
                $this->load->library('upload_library');
                $upload_path = './upload/stories';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'          => $this->input->post('name'),
                    'category_id'   => $this->input->post('category_id'),
                    'description'   => $this->input->post('description'),
                    'author'        => $this->input->post('author'),
                    'image_link'    => $image_link,
                    'status'        => $this->input->post('status'),
                    'continues'     => $this->input->post('continues'),
                    'created'       => date("Y-m-d H:i:s"),
                    'updated'       => date("Y-m-d H:i:s"),
                );
                $data['slug'] = $this->slug_library->create_uri($name);
                //them moi vao csdl
                if ($this->story_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
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
    
    /**
     * Description: Cập nhật thông tin
     * Function: edit()
     * @author: Di
     * @params: id, name, slug, description, image, catagory, status, view, created, updated.
     * @return: Store new data to database
     */
    public function edit()
    {
        $config = array(
            'field' => 'slug',
            'name'  => 'name',
            'table' => 'stories',
        );

        $id = $this->uri->rsegment('3');
        $story = $this->story_model->get_info($id);
        if (!$story) {
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
        foreach ($catalogs as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('slug_library', $config);

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên story', 'required');
            
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //lấy tên file ảnh bìa được admin upload
                $this->load->library('upload_library');
                $upload_path = './upload/stories';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'name'         => $this->input->post('name'),
                    'category_id'  => $this->input->post('category_id'),
                    'description'  => $this->input->post('description'),
                    'author'       => $this->input->post('author'),
                    'status'       => $this->input->post('status'),
                    'continues'    => $this->input->post('continues'),
                    'updated' => date("Y-m-d H:i:s"),
                );
                $data['slug'] = $this->slug_library->create_uri($name);
                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }
                //them moi vao csdl
                if ($this->story_model->update($story->id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
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
    
    /**
     * Description: Xóa truyện
     * Function: del()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    public function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa truyện thành công');
        redirect(admin_url('story'));
    }
    
    /**
     * Description: Xóa tất cả
     * Function: delete_all()
     * @author: Di
     * @params: list of id.
     * @return: Remove all data in database
     */
    public function delete_all()
    {
        //lay tat ca id story muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $this->_del($id);
        }
    }
    
    /**
     * Description: Xóa truyện và ảnh bìa kèm theo
     * Function: del()
     * @author: Di
     * @params: id.
     * @return: delete record to database
     */
    private function _del($id)
    {
        $story = $this->story_model->get_info($id);
        if (!$story) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại truyện này');
            redirect(admin_url('story'));
        }
        //thuc hien xoa story
        $this->story_model->delete($id);
        //xoa cac anh cua story
        $image_link = './upload/stories/'.$story->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
    }

    /**
     * Description: Lấy data từ medoctruyentranh.net
     * Function: craw()
     * @author: Di
     * @params: none.
     * @return: Lấy về rồi store trong database
     */
    public function craw(){

        $this->load->library('crawler');
       
        for($i = 1; $i <= 999 ; $i++){
            $html = file_get_html('https://webtruyen.com/truyen-full/'.$i);
            foreach ($html->find('img') as $link) {
                    echo  $link->src.'<br>';
                    echo  $link->alt.'<br>';
                    echo  $link.'<br>';
                }
        }
    }
}