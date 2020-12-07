<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * Facebook PHP SDK v5 for CI 3x
 * 
*/
require_once APPPATH .'vendor/autoload.php';

use Facebook\Facebook as FB;
use Facebook\Authentication\AccessToken;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Helpers\FacebookJavaScriptHelper;
use Facebook\Helpers\FacebookRedirectLoginHelper;
Class Facebook{
    // var FB
    private $fb;
    
    // var FacebookJavaScriptHelper | FacebookRedirectLoginHelper
    private $helper;

    //Fb constructor
    public function __construct()
    {
        //load fb config
        $this->load->config('facebook');

        //load required libraries and helper
        $this->load->library('session');
        $this->load->helper('url');
        if(!isset($this->fb)){
            $this->fb = new FB([
                'app_id'        => $this->config->item('facebook_app_id'),
                'app_secret'    => $this->config->item('facebook_app_secret'),
                'default_graph_version' => $this->config->item('facebook_graph_version'),
            ]);
        }
        //load correct helper depending on login type
        //set in the config file
        switch ($this->config->item('facebook_login_type')) {
            case 'js':
                $this->helper = $this->fb->getJavaScriptHelper();
                break;
            case 'canvas':
                $this->helper = $this->fb->getCanvasHelper();
                break;
            case 'page_tab':
                $this->helper = $this->fb->getPageTabHelper();
                break;
            case 'web':
                $this->helper = $this->fb->getRedirectLoginHelper();
                break;
        }
        if($this->config->item('facebook_auth_on_load') === TRUE){
            //try and authenticate the user right away(get valid token)
            $this->authenticate();
        }
    }
    /**
     * return FB
    */
    public function object(){
        return $this->fb;
    }
    /**
     * Check khi nào user login bằng access token
    */
    public function is_authenticated(){
        $access_token = $this->authenticate();
        if(isset($access_token)){
            return $access_token;
        }
        return false;
    }
    /**
     * Thực hiện request với graph
     * param $method
     * param $endpoint
     * param array $params
     * param null $access_token
     * 
     * return array
    */
    public function request($method, $endpoint, $params = [], $access_token = null){
        try {
            $response = $this->fb->{strtolower($method)}($endpoint, $params, $access_token);
            return $response->getDecodedBody();
        } catch (FacebookResponseException $e) {
            return $this->logError($e->getCode(), $e->getMessage());
        } catch(FacebookSDKException $e){
            return $this->logError($e->getCode(), $e->getMessage());
        }
    }
    /**
     * Login URL for web
    */
    public function login_url(){
        // kiểm tra phải là web ko thì trả về chuổi rổng
        if($this->config->item('facebook_login_type') != 'web'){
            return '';
        }
        //get login URL
        return $this->helper->getLoginUrl(
            base_url() . $this->config->item('facebook_login_redirect_url'),
            $this->config->item('facebook+permissions')
        );
    }
    /**
     * Logout URL for web
    */
    public function logout_url(){
        // nếu ko phải web link trống
        if($this->config->item('facebook_login_type') != 'web'){
            return '';
        }
        //get link logout
        return $this->helper->getLogoutUrl(
            $this->get_access_token(),
            base_url() . $this->config->item('facebook_logout_redirect_url')
        );
    }
    /**
     * destroy local Facebook session
    */
    public function desctroy_session(){
        $this->session->unset_usermeta('fb_access_token');
    }
    /**
     * Get new login from Facebook by access token
     * 
     * return array | access token | null | onject | void
    */
    private function authenticate(){

    }
    /**
     * Chuyển đổi nếu token có thời gian sống ngắn 
     * Đổi thành token có thời gian dài
    */
    private function long_lived_token(AccessToken $access_token){

    }
    /**
     * Get store access token
     * 
     * return mixed
    */
    private function get_access_token(){

    }
    /**
     * Save access token
     * 
     * param AccessToken $access_token
    */
    private function set_access_token(AccessToken $access_token){

    }
    /**
     * thời gian chết của session
    */
    private function get_expire_time(){

    }
    /**
     * Set thời gian cho session
    */
    private function set_expire_time(DateTime $time = null){

    }
    /**
     * param $code
     * param $message
     * 
     * return array lỗi :((
    */
    private function logError($code, $message){

    }
    /**
     * bật tính năng này để CI có thể sài mà o cần xác định thêm biến
     * 
    */
    public function __get($var)
    {
        return get_instance()->$var;
    }
}