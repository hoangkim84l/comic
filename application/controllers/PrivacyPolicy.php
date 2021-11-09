<?php
Class PrivacyPolicy extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model san pham
        $this->load->model('story_model');
        $this->load->model('lovelists_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
    }

    /**
     * Description: Trang danh sách truyện
     * Function: index()
     * @author: Di
     * @params: none
     * @return: Danh sách truyện
     */
    public function index()
    {
        $this->data['temp'] = 'site/privacy_policy/index';
	  $this->load->view('site/layout', $this->data);
    }
}



