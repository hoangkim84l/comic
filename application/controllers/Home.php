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
		$input['limit'] = array(8, 0);
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
        $input_comic['where'] = array('category_id' => '5');
        $list_comic = $this->story_model->get_list($input_comic);
		$this->data['list_comic'] = $list_comic;
		
		//lấy truyện đam mẽo
		$input_dammeo = array();
		$input_dammeo['limit'] = array(4, 0);
        $input_dammeo['where'] = array('category_id' => '11');
        $list_dammeo = $this->story_model->get_list($input_dammeo);
        $this->data['list_dammeo'] = $list_dammeo;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}