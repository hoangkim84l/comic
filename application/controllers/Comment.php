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
   
    /**
     * Description: Lưu comment ở chap
     * Function: index()
     * @author: Di
     * @params: none
     * @return: Save database
     */
   public function index()
   { 
   	 
   	  //set cac tap luat cho cac the input
   	  $this->form_validation->set_rules('post_id', 'nội dung', 'required');
   
   	  if($this->form_validation->run())
   	  {
   	       // Luu vao bảng comment
			$data = array();
			$data['user_id'] = strip_tags($this->input->post('user_id'));
			$data['post_id'] = strip_tags($this->input->post('post_id'));
			$data['parent_id'] = strip_tags($this->input->post('parent_id'));
			$data['body']	 = strip_tags($this->input->post('body'));
			$data['icon'] = strip_tags($this->input->post('icon'));
			$data['created']  = date("Y-m-d");
			$this->comment_model->create($data);
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
   /**
     * Description: Lưu comment ở chap
     * Function: ChapCommentWithoutLogin()
     * @author: Di
     * @params: none
     * @return: Save database
     */
	public function ChapCommentWithoutLogin()
	{ 
        if ($this->input->post()) {
            //set cac tap luat cho cac the input
            $this->form_validation->set_rules(
                'name',
                'Tên',
                'required',
                array('required' => 'Bằng hữu nhập tên mình đi')
            );
            if ($this->form_validation->run()) {
                // Luu vao bảng comment
                $data = array();
                $data['user_id'] = strip_tags($this->input->post('user_id'));
                $data['name'] = strip_tags($this->input->post('name'));
                $data['post_id'] = strip_tags($this->input->post('post_id'));
                $data['parent_id'] = strip_tags($this->input->post('parent_id'));
                $data['body']	 = strip_tags($this->input->post('body'));
                $data['icon'] = strip_tags($this->input->post('icon'));
                $data['created']  = date("Y-m-d");
                $this->comment_model->create($data);
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
   /**
     * Description: Lưu comment ở story
     * Function: story()
     * @author: Di
     * @params: none
     * @return: Save database
     */
	public function story()
	{ 
		 
		  //set cac tap luat cho cac the input
		  $this->form_validation->set_rules('story_id', 'nội dung', 'required');
		  if($this->form_validation->run())
		  {
			// Luu vao bảng comment
			 $data = array();
			 $data['user_id'] = strip_tags($this->input->post('user_id'));
			 $data['name'] = strip_tags($this->input->post('name'));
			 $data['story_id'] = strip_tags($this->input->post('story_id'));
			 $data['parent_id'] = strip_tags($this->input->post('parent_id'));
			 $data['icon'] = strip_tags($this->input->post('icon'));
			 $data['body']	 = strip_tags($this->input->post('body'));
			 $data['created']  = date("Y-m-d");
			 $this->comment_model->create($data);
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
	/**
     * Description: Lưu comment ở story
     * Function: storyHaveLogin()
     * @author: Di
     * @params: none
     * @return: Save database
     */
	public function storyHaveLogin()
	{ 
		 //set cac tap luat cho cac the input
		$this->form_validation->set_rules('user_id', 'nội dung', 'required');
		if($this->form_validation->run())
		{
		// Luu vao bảng comment
			$data = array();
			$data['user_id'] = strip_tags($this->input->post('user_id'));
			$data['name'] = strip_tags($this->input->post('name'));
			$data['story_id'] = strip_tags($this->input->post('story_id'));
			$data['parent_id'] = strip_tags($this->input->post('parent_id'));
			$data['icon'] = strip_tags($this->input->post('icon'));
			$data['body']	 = strip_tags($this->input->post('body'));
			$data['created']  = date("Y-m-d");
			$this->comment_model->create($data);
			echo'
			<script>
			window.onload = function() {
				alert("Đăng thành công");
				location.href = "javascript:history.back(-2);";  
			}
			document.getElementById("postComment").reset();
			</script>
			';
		}
	}
	/**
     * Description: Trả lời bình luận
     * Function: replyComment()
     * @author: Di
     * @params: parent_id
     * @return: Save database
     */
	public function replyComment($parent_id){

	}
}

