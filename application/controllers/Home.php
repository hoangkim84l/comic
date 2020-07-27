<?php
Class Home extends MY_Controller
{
	function index()
	{
	    //lay danh sach slide
	    $this->load->model('slide_model');
	    $slide_list = $this->slide_model->get_list();
		$this->data['slide_list'] = $slide_list;
		
		//get  stories by views
		$this->load->model('story_model');
		$input = array();
		$input['order'] = array('view', 'DESC');
		$results = $this->story_model->get_list($input);
		$this->data['data_slides'] = $results;

		//get  stories by dates
		$this->load->model('story_model');
		$input = array();
		$input['order'] = array('created', 'DESC');
		$result_home = $this->story_model->get_list($input);
		$this->data['data_home'] = $result_home;
		
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}