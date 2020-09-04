<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class Comment extends MY_Controller
{
   /*
   * Ham khi khoi tao
   */
   public function __construct()
   {
       parent::__construct();
       //load các file để validation form
       $this->load->helper('form');
       $this->load->library('form_validation');
       
       //load file model
   	  $this->load->model('comment_model');
   	  
   }
   
   /*
    * Trang dang ky thanh vien
    */
   public function index()
   { 
   	 
   	  //set cac tap luat cho cac the input
   	  $this->form_validation->set_rules('body', 'nội dung', 'required');
   
   	  if($this->form_validation->run())
   	  {
   	       // Luu vao bảng comment
			$data = array();
			$data['user_id'] = $this->input->post('user_id');
			$data['post_id'] = $this->input->post('post_id');
			$data['parent_id'] = $this->input->post('parent_id');
			$data['body']	 = $this->input->post('body');
			$data['created']  = date("Y-m-d");
			$this->comment_model->create($data);
			//$this->session->set_flashdata('message', 'Liên hệ thành công');
			//redirect();//chuyen toi trang chu
			//echo "<script>window.location.href='javascript:history.back(-2);'</script>";
			echo'
			<script>
			window.onload = function() {
				alert("Đăng thành công");
				location.href = "javascript:history.back(-2);";  
			}
			</script>
			';
   	  }
   }
   
}

