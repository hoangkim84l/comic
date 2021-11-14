<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * Facebook API Config
 * 
*/
$config['facebook_app_id']      = '810215646486373';
$config['facebook_app_secret']  = '441826cf2528e52e585a94f115e82023';
$config['facebook_login_redirect_url']  =   'user';
$config['facebook_logout_redirect_url'] =   'user/logout';
$config['facebook_login_type']          = 'web';
$config['facebook_permissions']         = array('email');
$config['facebook_graph_version']       = 'v3.2';
$config['facebook_auth_on_load']        =   TRUE;    