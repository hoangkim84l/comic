<?php
Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('lovelists_model');
        $this->load->model('story_model');
    }
    
    /*
     * Kiểm tra email đã tồn tại chưa
     */
    function check_email()
    {
        $email = strip_tags($this->input->post('email'));
        $where = array('email' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if($this->user_model->check_exists($where))
        {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }
    
    /*
     * Đăng ký thành viên
     */
    function register()
    {
        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if($this->session->userdata('user_id_login'))
        {
            redirect(site_url('user'));
        }
        $this->load->model('user_model');
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]|max_length[20]',
            array('required' => 'Bằng hữu nhập tên mình đi', 'min_length' => 'Tên huynh đài phải 8 kí tự nha','max_length'=>'Tên huynh đài dài quá 20 kí tự thôi nha'));
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email|callback_check_email',
            array('required' => 'Bằng hữu nhập địa chỉ email đi', 'valid_email' => 'Bằng hữu nhập sai định dạng rồi'));
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]',
            array('required' => 'Bằng hữu nhập mật khẩu đi', 'min_length[6]' => 'Ngắn quá phải từ 6 kí tự trở lên nha'));
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]',
            array('matches[password]' => 'Bằng hữu nhập lại mật khẩu 1 lần nữa'));
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required',
            array('required' => 'Bằng hữu nhập số điện thoại đi'));
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required',
            array('required' => 'Bằng hữu nhập địa chỉ đi'));
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $password = strip_tags($this->input->post('password'));
                $password = md5($password);
                
                $data = array(
                    'name'     => strip_tags($this->input->post('name')),
                    'email'    => strip_tags($this->input->post('email')),
                    'phone'    => strip_tags($this->input->post('phone')),
                    'address'  => strip_tags($this->input->post('address')),
                    'password' => $password,
                    'created'  => now(),
                );
                $this->load->library('email'); // Note: no $config param needed
                // $this->email->from('YOUREMAILHERE@gmail.com', 'YOUREMAILHERE@gmail.com');
                $dataEmail = 'Tên: '. strip_tags($this->input->post('name')) .' '.PHP_EOL.
                        'Email: '. strip_tags($this->input->post('email')) .' '.PHP_EOL.
                        'Số điện thoại: '. strip_tags($this->input->post('phone') ).' '.PHP_EOL.
                        'Địa chỉ: '. strip_tags($this->input->post('address')).' ' .PHP_EOL.
                        'Password: '. $this->input->post('password');
                        $from = $this->input->post('email');
                        $to = "teamcafesua@gmail.com";
                        $subject = "Người dùng đăng kí:";
                        $message = $dataEmail;
                        $headers = "From:" . $from;
                        mail($to,$subject,$message, $headers);
                //2 ways
                $this->email->from($this->input->post('email'));
                $this->email->to('teamcafesua@gmail.com');
                $this->email->subject('Người dùng đăng kí : ');
                $this->email->message($dataEmail);
                $this->email->send();
                if($this->user_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    echo'
                    <script>
                    window.onload = function() {
                        alert("Đăng ký thành viên thành công");
                        location.href = "";  
                    }
                    </script>
                    ';
                }else{
                    echo'
                    <script>
                    window.onload = function() {
                        alert("Opps có lổi xãy ra kiểm tra form nhập");
                        location.href = "";  
                    }
                    </script>
                    ';
                }
            }
        }
        //hiển thị ra view
        $this->data['temp'] = 'site/user/register';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
     * Kiem tra đăng nhập
     */
    function login()
    {
        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if($this->session->userdata('user_id_login'))
        {
            redirect(site_url('user'));
        }
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper("cookie");
        //remember me
        $autoLogin = $this->input->post("autologin",true);
        if($this->input->post())
        {
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email',
            array('required' => 'Bằng hữu nhập email đi', 'valid_email' => 'Tên huynh đài sai định dạng email rồi kìa'));
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]',
            array('required' => 'Bằng hữu nhập mật khẩu đi', 'min_length[6]' => 'Mật khẩu huynh đài nhập ngắn quá'));
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                //lay thong tin thanh vien
                $user = $this->_get_user_info();
                $email = strip_tags($this->input->post('email'));
                $password = strip_tags($this->input->post('password'));
                //gắn session id của thành viên đã đăng nhập
                $this->session->set_userdata('user_id_login', $user->id);
                //auto login
                if($autoLogin == 1){
                    $cookie_id = array(
                        'name'      => 'autologin_id',
                        'value'     => $user->id,
                        'expire'    => '1209600',//2 tuần
                        'path'      => '/'
                    );
                    $cookie_email = array(
                        'name'      => 'autologin_email',
                        'value'     => $email,
                        'expire'    => '1209600',//2 tuần
                        'path'      => '/'
                    );
                    $cookie_password = array(
                        'name'      => 'autologin_password',
                        'value'     => $password,
                        'expire'    => '1209600',//2 tuần
                        'path'      => '/'
                    );
                    $this->input->set_cookie($cookie_id);
                    $this->input->set_cookie($cookie_email);
                    $this->input->set_cookie($cookie_password);
                }else{
                    delete_cookie("autologin_email");
                    delete_cookie("autologin_password");
                }
                echo'
                    <script>
                    window.onload = function() {
                        alert("Đăng nhập thành công");
                        location.href = "";  
                    }
                    </script>
                    ';
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Kiem tra email va password co chinh xac khong
     */
    function check_login()
    {
        $user = $this->_get_user_info();
        if($user)
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    
    /*
     * Lay thong tin cua thanh vien
     */
    private function _get_user_info()
    {
        $email = strip_tags($this->input->post('email'));
        $password = strip_tags($this->input->post('password'));
        $password = md5($password);
        
        $where = array('email' => $email , 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        return $user;
    }
    
    /*
     * login by remember me
     */
    function remember_me($username, $password)
    {
        $email = $username;
        $password = $password;
        $password = md5($password);
        
        $where = array('email' => $email , 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        return $user;
    }
    

    /*
     * Chinh sua thong tin thanh vien
     */
    function edit()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(site_url('user/login'));
        }
        //lay thong tin cua thanh vien
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }
        $this->data['user']  = $user;
        

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $password = $this->input->post('passwords');
            if($password == ''){
                $this->form_validation->set_rules('passwords', 'Mật khẩu', 'required',
                array('required' => 'Bằng hữu nhập mật khẩu xác nhận đi'));
            }
            
            if(md5($password) != $user->password){
                $this->form_validation->set_rules('passwords', 'Mật khẩu', 'matches[password]',
                array('matches' => 'Bằng hữu nhập sai mật khẩu rồi'));
            }
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
        
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //lấy tên file ảnh avatar được user upload
                $this->load->library('upload_library');
                $upload_path = './upload/user';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }
                //them vao csdl
                $data = array(
                    'name'     => strip_tags($this->input->post('name')), 
                    'phone'    => strip_tags($this->input->post('phone')),
                    'address'  => strip_tags($this->input->post('address')),
                );
                if($password)
                {
                    $data['password'] = md5($password);
                }
                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }
                if($this->user_model->update($user_id, $data))
                {
                    //tạo ra nội dung thông báo
                   // $this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
                    echo'
                    <script>
                    window.onload = function() {
                        alert("Chỉnh sửa thông tin thành công");
                        location.href = "";  
                    }
                    </script>
                    ';
                }else{
                    //$this->session->set_flashdata('message', 'Không thành công');
                    echo'
                    <script>
                    window.onload = function() {
                        alert("Không thành công");
                        location.href = "";  
                    }
                    </script>
                    ';
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url('user'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'site/user/edit';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
     * Cập nhật mật khẩu thanh vien
     */
    function changepassword()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect(site_url('user/login'));
        }
        //lay thong tin cua thanh vien
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }
        $this->data['user']  = $user;
        

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $password = $this->input->post('password');
            $new_password = $this->input->post('new_password');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required',
                array('required' => 'Bằng hữu nhập mật khẩu cũ đi'));
            $this->form_validation->set_rules('new_password', 'Mật khẩu', 'required|min_length[6]',
                array('required' => 'Bằng hữu nhập mật khẩu mới đi', 'min_length' => 'Mật khẩu mới ít nhất 6 kí tự'));
            $this->form_validation->set_rules('re_password', 'Mật khẩu', 'matches[new_password]',
                array('matches' => 'Bằng hữu nhập không khớp với mật khẩu mới'));

            if(md5($password) != $user->password){
                $this->form_validation->set_rules('password', 'Mật khẩu', 'matches[passwords]',
                array('matches' => 'Bằng hữu nhập mật khẩu cũ đi'));
            }
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $data = array(
                    'password'     => md5($new_password),
                );
               
                if($this->user_model->update($user_id, $data))
                {
                    //tạo ra nội dung thông báo
                   $this->session->set_flashdata('message', 'Bằng hữu đã chỉnh sửa thông tin thành công.');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url('user'));
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'site/user/changepassword';
        $this->load->view('site/layout', $this->data);
    }
    /*
     * Lấy lại mật khẩu
     */
    function forgotpassword()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('user_model');
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $email = $this->input->post('email');
            
            $this->form_validation->set_rules('email', 'Email', 'required',
                array('required' => 'Bằng hữu nhập email đi'));

            $str = rand(); 

            $where = array('email' => $email);
            $user = $this->user_model->get_info_rule($where);
            if($user){
                var_dump($user->id);
                //nhập liệu chính xác
                if($this->form_validation->run())
                    {
                    //them vao csdl
                        $this->load->library('email'); // Note: no $config param needed
                    // // $this->email->from('YOUREMAILHERE@gmail.com', 'YOUREMAILHERE@gmail.com');
                    $dataEmail = 'Mật khẩu của email: '. strip_tags($this->input->post('email')) .' '.PHP_EOL.
                            'Mật Khẩu: '. $str;
                            $from = "teamcafesua@gmail.com";
                            $to = $this->input->post('email');
                            $subject = "Mật khẩu của bằng hữu là:";
                            $message = $dataEmail;
                            $headers = "From:" . $from;
                            mail($to,$subject,$message, $headers);
                    //2 ways
                    $this->email->from('teamcafesua@gmail.com');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Mật khẩu của bằng hữu là: ');
                    $this->email->message($dataEmail);
                    $this->email->send();
                    $data = array(
                        'password'     => md5($str),
                    );
                    if($this->user_model->update($user->id, $data)){
                        $this->session->set_flashdata('message', 'Mail đã được gữi bằng hữu kiểm tra mail và đăng nhập lại đi.');
                    }
                }
            }else{
                $this->session->set_flashdata('message', 'Hình như bằng hữu nhập sai email bọn em tìm không ra thông tin email này :(.');
            }
        }
        
        //hiển thị ra view
        $this->data['temp'] = 'site/user/forgotpassword';
        $this->load->view('site/layout', $this->data);
    }
    /*
     * Thong tin cua thanh vien
     */
    function index()
    {
        if(!$this->session->userdata('user_id_login'))
        {
            redirect();
        }
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if(!$user)
        {
            redirect();
        }
        $this->data['user']  = $user;

        $input = array();
        $input['where'] = array('user_id', $user_id);
        $love_lists = $this->lovelists_model->get_list();
        $this->data['lovelists'] = $love_lists;
        
        
        //hiển thị ra view
        $this->data['temp'] = 'site/user/index';
        $this->load->view('site/layout', $this->data);
    }

    /**
     * REMOVE RECORD from lovelists
    */
    function remove_lovelists(){
        $id = $this->uri->rsegment('3');
        $data = array(
            'status'      => 0
        );
        //them moi vao csdl
        if($this->lovelists_model->delete($id))
        {
            $this->session->set_flashdata('message', 'Bằng hữu đã xóa thành công.');
        }else{
            $this->session->set_flashdata('message', 'Có lổi thử lại.');
        }
        redirect('/user');
    }
    /*
     * Thuc hien dang xuat
     */
    function logout()
    {
        $this->load->helper('cookie');
        if($this->session->userdata('user_id_login'))
        {
            $this->session->unset_userdata('user_id_login');
        }
        delete_cookie("autologin_id");
        delete_cookie("autologin_email");
        delete_cookie("autologin_password");
        $this->session->set_flashdata('message', 'Đăng xuất thành công');
        redirect();
    }
}

