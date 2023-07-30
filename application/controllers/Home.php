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
		$input['limit'] = array(60, 0);
		$input['order'] = array('created', 'DESC');
		$result_home = $this->chapter_model->get_list($input);
		$this->data['data_home'] = $result_home;
		
		// lấy truyện moi cap nhat
		// TOP 1
		$top1 = array();
		$top1['limit'] = array(1, 0);
		$top1['order'] = array('created', 'DESC');
		$top1 = $this->story_model->get_list($top1);
		$this->data['top1'] = $top1;
		// TOP 2 va 3
		$top2 = array();
		$top2['limit'] = array(2, 1);
		$top2['order'] = array('created', 'DESC');
		$top2 = $this->story_model->get_list($top2);
		$this->data['top2'] = $top2;
		// TOp 4
		$top4 = array();
		$top4['limit'] = array(1, 3);
		$top4['order'] = array('created', 'DESC');
		$top4 = $this->story_model->get_list($top4);
		$this->data['top4'] = $top4;
		
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