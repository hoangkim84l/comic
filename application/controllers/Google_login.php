<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google_login extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * Login function via Google
    */
    function register(){
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
                        'picture'       => $data['picture'],
                        'updated'       => $current_datetime
                    );

                    $this->user_model->update_user_data($user_data, $data['id']);
                }else{
                    //này là nó chưa có thì mình thêm vô
                    $user_data = array(
                        'oauth_uid'     => $data['id'],
                        'first_name'    => $data['given_name'],
                        'last_name'     => $data['family_name'],
                        'email'         => $data['email'],
                        'picture'       => $data['picture'],
                        'created'       => $current_datetime
                    );

                    $this->user_model->insert_user_data($user_data);
                }
                $this->session->set_userdata('user_data_google', $user_data);
            }
        }
        // tạo cái nút cho bấm login
        var_dump("zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz");
        $button_login = '';
        if(!$this->session->user_data('access_token')){
            $button_login = '<a href="'.$google_client->createAuthUrl().'">1111222<img src="'.public_url().'site/images/google-login.png" width="300" height="100"></a>';
            $data['button_login']   = $button_login;
            //hiển thị ra view
            // $this->data['temp'] = 'site/user/register';
            $this->load->view('site/user/register', $data);
        }else{
            $this->data['temp'] = 'site/user/register';
            $this->load->view('site/layout', $this->data);
        }
    }

    /**
     * Tạo logout
    */
    function logout(){
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data_google');
        redirect(site_url('user/login'));
    }
}