<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class Contact extends MY_Controller
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
   	  $this->load->model('contact_model');
   	  
   }
   
   /*
    * Trang dang ky thanh vien
    */
   public function index()
   { 
   	 
   	  //set cac tap luat cho cac the input
   	  $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|valid_email');
   	  $this->form_validation->set_rules('name', 'Họ tên', 'required');
   	  $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|numeric');
   	  $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
   	  $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
   	  $this->form_validation->set_rules('content', 'Nội dung', 'required');
   	
   	  if($this->form_validation->run())
   	  {
   	       // Luu vao bảng contact
			$data = array();
			$data['email']			= $this->input->post('email');
			$data['name']			= $this->input->post('name');
			$data['phone']			= $this->input->post('phone');
			$data['address']		= $this->input->post('address');
			$data['title']		    = $this->input->post('title');
			$data['content']		= $this->input->post('content');
			$data['created'] 		= now();
			$this->contact_model->create($data);
			//$this->session->set_flashdata('message', 'Liên hệ thành công');
			$this->load->library('email'); // Note: no $config param needed
			// $this->email->from('YOUREMAILHERE@gmail.com', 'YOUREMAILHERE@gmail.com');
			$data = 'Tên: '. $this->input->post('name') .'<br/>'.
					'Email: '.$this->input->post('email') .'<br/>'.
					'Số điện thoại: '.$this->input->post('phone') .'<br/>'.
					'Địa chỉ: '.$this->input->post('address') .'<br/>'.
					'Tiêu đề: '.$this->input->post('title') .'<br/>'.
					'Nội dung: '.$this->input->post('content');
			$this->email->from($this->input->post('email'));
			$this->email->to('teamcafesua@gmail.com');
			$this->email->subject('Email liên hệ');
			$this->email->message($data);
			$this->email->send();
			echo'
                    <script>
                    window.onload = function() {
                        alert("Liên hệ thành công");
                        location.href = "";  
                    }
                    </script>
                    ';
			//redirect();//chuyen toi trang chu
			
   	  }
   	 
   	  // Hien thi view
	  $this->data['temp'] = 'site/contact/add';
	  $this->load->view('site/layout', $this->data);
   }
   
}

