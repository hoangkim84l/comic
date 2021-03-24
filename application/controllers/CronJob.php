<?php
Class CronJob extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('chapter_model');
    }
    
    /**
     * Description: Tự động lưu upload chap
     * Function: index()
     * @author: Di
     * @params: none
     * @return: 
     */
    function index()
    {
        echo "vô đây";
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "teamcafesua@gmail.com";
        $to = "teamcafesua@gmail.com";
        $subject = "Checking PHP mail";
        $message = "PHP mail works just fine";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "The email message was sent.";
        // $input = array();
        // $input['where'] = array('status' => 0);
        // $input['order'] = array('id',  'asc');    
        // $data_auto_update = $this->chapter_model->get_list($input);
        // $i = 0;
        // foreach($data_auto_update as $id_auto){
        //     $data = array(
        //         'status' => '1',
        //     );
        //     $this->chapter_model->update($id_auto->id, $data);
        //     if($i == 1 ){
        //         break;
        //     }
        //     $i++;
        // }
    }   
}