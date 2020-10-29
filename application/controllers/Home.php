<?php
Class Home extends MY_Controller
{
	function index()
	{
		//get lay danh sach slide
		$this->load->model('story_model');
		$input = array();
		$input['order'] = array('created', 'DESC');
		$results = $this->story_model->get_list($input);
		$this->data['data_slides'] = $results;

		//get chapter by dates mới cập nhật
		$this->load->model('chapter_model');
		$input = array();
		$input['limit'] = array(40, 0);
		$input['order'] = array('created', 'DESC');
		$result_home = $this->chapter_model->get_list($input);
		$this->data['data_home'] = $result_home;
		
		//lấy truyện hot (view cao)
		$input_hot = array();
		$input_hot['limit'] = array(4, 0);
		$input_hot['order'] = array('view', 'DESC');
		$results = $this->story_model->get_list($input_hot);
		$this->data['data_hot'] = $results;
		
		//lấy truyện Comic
		$input_comic = array();
		$input_comic['limit'] = array(4, 0);
        $input_comic['like'] = array('category_id', "95");
        $list_comic = $this->story_model->get_list($input_comic);
		$this->data['list_comic'] = $list_comic;
		
		//lấy truyện hành động
		$input_action = array();
		$input_action['limit'] = array(4, 0);
        $input_action['like'] = array('category_id', "23");
        $action = $this->story_model->get_list($input_action);
		$this->data['list_novel'] = $action;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}