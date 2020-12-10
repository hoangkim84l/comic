<?php
Class User_model extends MY_Model
{
	var $table = 'users';
	
	function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id';
    }
	public function remember_me($email, $password)
	{
		$where = array('email' => $email , 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        return $user;
	}
	/*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('oauth_provider'=>$userData['oauth_provider'], 'oauth_uid'=>$userData['oauth_uid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('id' => $prevResult['id']));
                
                //get user ID
                $userID = $prevResult['id'];
            }else{
                //insert user data
                $userData['created']  = date("Y-m-d H:i:s");
                $userData['modified'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName, $userData);
                
                //get user ID
                $userID = $this->db->insert_id();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
    /**
     * Login with Goole check isexits
     *
    */
    public function is_already_register($id){
        $this->db->where('oauth_uid', $id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    /**
     * check if user exits => update
    */
    public function update_user_data($data, $id){
        $this->db->where('oauth_uid', $id);
        $this->db->update('users', $data);
    }
    /**
     * If user not exits => insert
    */
    public function insert_user_data($data){
        $this->db->insert('users', $data);
    }
}

