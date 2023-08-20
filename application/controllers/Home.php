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
		$top1 = array();
		$top1['limit'] = array(1, 0);
		$top1['order'] = array('view', 'DESC');
		$top1 = $this->story_model->get_list($top1);
		$this->data['top1'] = $top1; //SLIDE 1
		
		$top2 = array();
		$top2['limit'] = array(1, 1);
		$top2['order'] = array('view', 'DESC');
		$top2 = $this->story_model->get_list($top2);
		$this->data['top2'] = $top2; //SLIDE 2
		
		$top3 = array();
		$top3['limit'] = array(2, 1);
		$top3['order'] = array('view', 'DESC');
		$top3 = $this->story_model->get_list($top3);
		$this->data['top3'] = $top3; //SLIDE 3

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