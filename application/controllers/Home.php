<?php

use Config\Session;

/**
 *  @property Story_model $story_model 
 *  @property Chapter_model $chapter_model 
 *  @property CI_Loader $load 
 *  @property Session\ $session 
 * 
 * */
Class Home extends MY_Controller
{
	function index()
	{
		// lay lay danh sach slide theo view cao
		$this->load->model('story_model');
		$input = array();
		$input['order'] = array('view', 'DESC');
		$results = $this->story_model->get_list($input);
		$this->data['data_slides'] = $results;

		//get chapter by dates mới cập nhật
		$this->load->model('chapter_model');
		$input = array();
		$input['limit'] = array(100, 0);
		$input['order'] = array('created', 'DESC');
		$result_home = $this->chapter_model->get_list($input);
		$this->data['data_homes'] = $result_home;
		
		// lấy truyện moi cap nhat
		$input = array();
		$input['limit'] = array(25, 0);
		$input['order'] = array('created', 'DESC');
		$input = $this->story_model->get_list($input);
		$this->data['story_news'] = $input;

		// lay truyện theo view cao
		$this->load->model('story_model');
		$input = array();
		$input['limit'] = array(5, 0);
		$input['order'] = array('view', 'DESC');
		$results = $this->story_model->get_list($input);
		$this->data['story_views'] = $results;
		
		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}