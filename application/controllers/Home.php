<?php

use Config\Session;

/**
 *  @property Story_model $story_model
 *  @property Chapter_model $chapter_model
 *  @property CI_Loader $load
 *  @property Session\ $session
 *
 * */
class Home extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	function index()
	{
		// lay lay danh sach slide theo view cao
		$this->load->model('story_model');
		$sliders = array();
		$sliders['limit'] = array(6, 0);
		$sliders['order'] = array('view', 'DESC');
		$sliders = $this->story_model->get_list($sliders);
		$this->data['sliders'] = $sliders; //SLIDE 1

		//get chapter by dates mới cập nhật
		$this->db->distinct();
		$this->db->select('story_id');
		$this->db->order_by('created', 'DESC');
		$this->db->limit(30);
		$query = $this->db->get('chapters');
		$rows = $query->result_array();
		$storyIds = [];
		foreach ($rows as $level0) {
			foreach ($level0 as $level1) {
				$storyIds[] = $level1;
			}
		}

		// $this->load->model('chapter_model');
		// $input = array();
		// $input['limit'] = array(100, 0);
		// $input['order'] = array('created', 'DESC');
		// $input['in'] = array($storyIds);

		// $result_home = $this->chapter_model->get_list($input);
		$this->data['data_homes'] = $storyIds;

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
