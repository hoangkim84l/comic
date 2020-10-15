<?php
Class Login extends MY_controller{
    
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                redirect(admin_url('home'));
            }
        }
        
        $this->load->view('admin/login/index');
    }
    
    /*
     * Kiem tra username va password co chinh xac khong
     */
    function check_login()
    {
        $username = strip_tags($this->input->post('username'));
        $password = strip_tags($this->input->post('password'));
        $password = md5($password);
        $this->load->model('admin_model');
        $where = array('username' => $username , 'password' => $password);
        $admin = $this->admin_model->get_info_rule($where);
        if($this->admin_model->check_exists($where))
        {
            $this->session->set_userdata('login', $admin->id);
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
}