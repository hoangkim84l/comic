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
       $this->load->library('email');
       //load file model
   	  $this->load->model('contact_model');
   	  
   }
   
   /*
    * Trang dang ky thanh vien
    */
   public function index()
   { 
   	 
   	  //set cac tap luat cho cac the input
		 $this->form_validation->set_rules('email', 'Địa chỉ email', 'required|valid_email',
		 array('required' => 'Bằng hữu nhập địa chỉ email đi', 'valid_email' => 'Bằng hữu nhập sai định dạng email rồi')	
		);
		 $this->form_validation->set_rules('name', 'Họ tên', 'required',
		 array('required' => 'Bằng hữu nhập họ tên đi'));
		 $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|numeric',
		 array('required' => 'Bằng hữu nhập số điện thoại đi', 'numeric' => 'Nhập số huynh đài ơi'));
		 $this->form_validation->set_rules('address', 'Địa chỉ', 'required',
		 array('required' => 'Bằng hữu cho em địa chỉ với'));
		 $this->form_validation->set_rules('title', 'Tiêu đề', 'required',
		 array('required' => 'Bằng hữu đặt tựa đề đi'));
		 $this->form_validation->set_rules('content', 'Nội dung', 'required',
		 array('required' => 'Bằng hữu liên hệ có việc gì?'));
   	
   	  if($this->form_validation->run())
   	  {
   	       // Luu vao bảng contact
			$data = array();
			$data['email']			= strip_tags($this->input->post('email'));
			$data['name']			= strip_tags($this->input->post('name'));
			$data['phone']			= strip_tags($this->input->post('phone'));
			$data['address']		= strip_tags($this->input->post('address'));
			$data['title']		    = strip_tags($this->input->post('title'));
			$data['content']		= strip_tags($this->input->post('content'));
			$data['created'] 		= now();
			$this->contact_model->create($data);
			//$this->session->set_flashdata('message', 'Liên hệ thành công');
			$this->load->library('email'); // Note: no $config param needed
			// $this->email->from('YOUREMAILHERE@gmail.com', 'YOUREMAILHERE@gmail.com');
			$datas = 'Tên: '. $this->input->post('name') .' ' .PHP_EOL.
					'Email: '.$this->input->post('email') .' '.PHP_EOL.
					'Số điện thoại: '.$this->input->post('phone') .' '.PHP_EOL.
					'Địa chỉ: '.$this->input->post('address') .' '.PHP_EOL.
					'Tiêu đề: '.$this->input->post('title') .' '.PHP_EOL.
					'Nội dung: '.$this->input->post('content');
					$from = $this->input->post('email');
					$to = "teamcafesua@gmail.com";
					$subject = "Email liên hệ";
					$message = $datas;
					$headers = "From:" . $from;
					mail($to,$subject,$message, $headers);
			// 2 ways
			$this->email->from($this->input->post('email'));
			$this->email->to('teamcafesua@gmail.com');
			$this->email->subject('Email liên hệ');
			$this->email->message($datas);
			$this->email->send();
			
			// var_dump($this->email->send());die();
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

