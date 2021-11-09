<?php
Class Home extends MY_Controller
{
    function index()
    {
        // Tai cac file thanh phan
        $this->load->model('user_model');
        $this->load->model('contact_model');
        $this->load->model('comment_model');
        $this->load->model('catalog_model');
        $this->load->model('story_model');
        $this->load->model('chapter_model');
        
        //thong ke doanh thu ngay hom nay
        $today = get_date(now());
        $time  = get_time_between($today);
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
       	
        //thống kê tổng số
        $this->data['total_user']    = $this->user_model->get_total();
        $this->data['total_contact'] = $this->contact_model->get_total();
        $this->data['total_comment'] = $this->comment_model->get_total();
        $this->data['total_catalog'] = $this->catalog_model->get_total();
        $this->data['total_stories'] = $this->story_model->get_total();
        $this->data['chapter_comment'] = $this->chapter_model->get_total();
        //get view by story 
        $stories = $this->story_model->get_list();
        $count_view_stories = 0;
        foreach($stories as $data_stories){
            $count_view_stories += $data_stories->view;
        }
        $this->data['count_view_stories'] = $count_view_stories;
        //get view by  chapter
        $chapters = $this->chapter_model->get_list();
        $count_view_chapters = 0;
        foreach($chapters as $data_chapters){
            $count_view_chapters += $data_chapters->view;
        }
        $this->data['count_view_chapters'] = $count_view_chapters;
        $this->lang->load('admin/home');
        
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}