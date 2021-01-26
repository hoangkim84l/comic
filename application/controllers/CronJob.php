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
        $input = array();
        $input['where'] = array('status' => 0);
        $input['order'] = array('id',  'asc');    
        $data_auto_update = $this->chapter_model->get_list($input);
        $i = 0;
        foreach($data_auto_update as $id_auto){
            $data = array(
                'status' => '1',
            );
            $this->chapter_model->update($id_auto->id, $data);
            if($i == 1 ){
                break;
            }
            $i++;
        }
    }   
}