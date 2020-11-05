<?php
Class Comment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('comment_model');
        $this->load->model('story_model');
        $this->load->model('chapter_model');
        $this->load->model('user_model');
    }
    
    /**
     * Description: Hiển thị danh sách chương phân trang 15 chương 1 trang
     * Function: index()
     * @author: Di
     * @params: none
     * @return: list of comment
     */
    function index()
    {
        //lay tong so luong ta ca cac comment trong websit
        $total_rows = $this->comment_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //Load thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = admin_url('comment/index');
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
        $body = $this->input->get('body');
        if($body){
            $input['like'] = array('body', $body);
        }
        $story_id = $this->input->get('story_id');
        $story_id = intval($story_id);
        if($story_id > 0){
            $input['where']['story_id'] = $story_id;
        }

        //lấy danh sách theo điều kiện
        $list = $this->comment_model->get_list($input);
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
        $this->data['temp'] = 'admin/comment/index';
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
        $this->session->set_flashdata('message', 'Xóa comment thành công');
        redirect(admin_url('comment'));
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
        //lay tat ca id comment muon xoa
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
        $comment = $this->comment_model->get_info($id);
        if(!$comment)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại comment này');
            redirect(admin_url('comment'));
        }
        //thuc hien xoa comment
        $this->comment_model->delete($id);
        //xoa cac anh cua comment
        $image_link = './upload/comment/'.$comment->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        
    }
}



