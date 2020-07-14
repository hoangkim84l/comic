<?php
Class Home extends MY_Controller
{
    function index()
    {
        // Tai cac file thanh phan
        $this->load->model('user_model');
        $this->load->model('contact_model');
        
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
        
        $this->lang->load('admin/home');
        
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}