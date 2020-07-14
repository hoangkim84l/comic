<?php
Class Home extends MY_Controller
{
	function index()
	{
	    //lay danh sach slide
	    $this->load->model('slide_model');
	    $slide_list = $this->slide_model->get_list();
	    $this->data['slide_list'] = $slide_list;
		
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}