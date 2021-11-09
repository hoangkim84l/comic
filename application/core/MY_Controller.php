<?php
Class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang ben view
    public $data = array();
    
    function __construct()
    {
        //ke thua tu CI_Controller
        parent::__construct();
        $this->load->library('facebook');
        $this->load->library('session');
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin' :
                {
                    $this->load->helper('language');
                    $this->lang->load('admin/common');
                    
                    //xu ly cac du lieu khi truy cap vao trang admin
                    //kiem tra xem có session của Login Controller gởi qua hay chưa
                    $user_id_login = $this->session->userdata('login');
                   // var_dump($user_id_login);exit();
                    $this->data['login'] = $user_id_login;
                    //neu da dang nhap thi lay thong tin cua thanh vien
                    if($user_id_login)
                    {
                        $this->load->model('admin_model');
                        $user_info = $this->admin_model->get_info($user_id_login);
                        $this->data['user_info'] = $user_info;
                    }
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
            default:
                {  
                    //xu ly du lieu o trang ngoai
                    $this->load->model('catalog_model');
                    $input = array();
                    $input['where'] = array('parent_id' => 0);
                    $catalog_list = $this->catalog_model->get_list($input);
                    foreach ($catalog_list as $row)
                    {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['catalog_list'] = $catalog_list;
                    
                    //kiem tra xem thanh vien da dang nhap hay chua
                    $user_id_login = $this->session->userdata('user_id_login');
                    $this->data['user_id_login'] = $user_id_login;
                    //neu da dang nhap thi lay thong tin cua thanh vien
                    if($user_id_login)
                    {
                        $this->load->model('user_model');
                        $user_info = $this->user_model->get_info($user_id_login);
                        $this->data['user_info'] = $user_info;
                    }
                   
                    //load model ho tro truc tuyen
                    $this->load->model('support_model');
                    //lay danh sach ho tro truc tuyen
                    $support = $this->support_model->get_info(1);
                    //gui bien sang view
                    $this->data['support'] = $support;

                    //remember me
                    if(isset($_COOKIE['autologin_email']) && isset($_COOKIE['autologin_password'])){
                        $this->load->model('user_model');
                        
                        $this->user_model->remember_me($_COOKIE['autologin_email'], $_COOKIE['autologin_password']);
                        $this->session->set_userdata('user_id_login', $_COOKIE['autologin_id']);
                        $user_id_login = $this->session->userdata($_COOKIE['autologin_id']);
                        $this->data['user_id_login'] = $user_id_login;
                    }

                    //login via facebook
                    $userData = array(); 
                    
                    // Authenticate user with facebook 
                    if($this->facebook->is_authenticated()){ 
                        $this->load->library('session');
                        // Get user info from facebook 
                        $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            
                        // Preparing data for database insertion 
                        $userData['oauth_provider'] = 'facebook'; 
                        $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
                        $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
                        $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
                        $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
                        $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
                        $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
                        $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
                        
                        // Insert or update user data to the database 
                        $userID = $this->user->checkUser($userData); 
                        
                        // Check user data insert or update status 
                        if(!empty($userID)){ 
                            $data['userData'] = $userData; 
                            
                            // Store the user profile info into session 
                            $this->session->set_userdata('userData', $userData); 
                        }else{ 
                        $data['userData'] = array(); 
                        } 
                        // Facebook logout URL 
                        $data['logoutURL'] = $this->facebook->logout_url(); 
                    }else{ 
                        // Facebook authentication url 
                        $data['authURL'] =  $this->facebook->login_url(); 
                        $this->data['authURL'] = $data['authURL'];
                    }
                    //Login via Google
                    include_once APPPATH."vendor/autoload.php";

                    $google_client = new Google_Client();
                    
                    $google_client->setClientId('256738196364-dkede1fsdleiqejtqbhunhksspdqlajb.apps.googleusercontent.com');
                    $google_client->setClientSecret('reAXUqXUE6X8IowFGdUZhiSv');
                    $google_client->setRedirectUri('https://cafesuanovel.com/user/register.html');
                    $google_client->addScope('email');
                    $google_client->addScope('profile');

                    if(isset($_GET["code"])){
                        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
                        
                        if(!isset($token["error"])){
                            $this->load->library('session');
                            $this->load->model('user_model');
                            $google_client->setAccessToken($token["access_token"]);
                            $this->session->set_userdata('access_token', $token["access_token"]);

                            $google_service = new Google_Service_Oauth2($google_client);
                            $data = $google_service->userinfo->get();

                            $current_datetime = date('Y-m-d H:i:s');

                            if($this->user_model->is_already_register($data['id'])){
                                //nếu có rồi thì cập nhật thôi
                                $user_data = array(
                                    'first_name'    => $data['given_name'],
                                    'last_name'     => $data['family_name'],
                                    'email'         => $data['email'],
                                    'image_link'       => $data['picture'],
                                    'updated'       => $current_datetime
                                );

                                $this->user_model->update_user_data($user_data, $data['id']);
                                $this->session->set_userdata('user_data_google', $data['id']);
                                redirect(site_url('user'));
                            }else{
                                //này là nó chưa có thì mình thêm vô
                                $user_data = array(
                                    'oauth_uid'     => $data['id'],
                                    'first_name'    => $data['given_name'],
                                    'last_name'     => $data['family_name'],
                                    'email'         => $data['email'],
                                    'image_link'       => $data['picture'],
                                    'created'       => $current_datetime
                                );

                                $this->user_model->insert_user_data($user_data);
                                $this->session->set_userdata('user_data_google', $data['id']);
                                redirect(site_url('user'));
                            }
                            
                        }
                    }
                    // tạo cái nút cho bấm login
                    
                    $button_login = '';
                    if(!$this->session->userdata('access_token')){
                        $button_login = '<a href="'.$google_client->createAuthUrl().'"><img src="'.public_url().'site/images/google-login.png"></a>';
                        $this->data['button_login']   = $button_login;
                    }

                    $user_data_google = $this->session->userdata('user_data_google');
                    // $this->data['user_data_google'] = $user_data_google;
                    //neu da dang nhap thi lay thong tin cua thanh vien
                    if($user_data_google)
                    {
                        $this->load->model('user_model');
                        $key_id = array();
                        $key_id['where'] = array('oauth_uid' => $user_data_google);
                        $user_data_google = $this->user_model->get_row($key_id);
                        $this->data['user_data_google'] = $user_data_google;
                    }
                }
        }
    }
    
    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
    
        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}