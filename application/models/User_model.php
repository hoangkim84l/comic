<?php
Class User_model extends MY_Model
{
	var $table = 'users';
	public function remember_me($email, $password)
	{
		$where = array('email' => $email , 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        return $user;
	}
}

