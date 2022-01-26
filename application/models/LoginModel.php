<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	
	// Check email
	public function checkEmail($email)
	{
	
		$exe 		= $this->db->select('a.*, b.*, c.*')
							->join('role_users b', 'a.user_id 	= b.role_user_id')
							->join('level c', 'c.lev_id 		= b.role_lev_id')
							->get_where('users a', ['a.user_email' => $email, 'a.user_status' => '1']);

		return $exe;
	
	}


	// Active account
	public function acc($code, $email)
	{
	
		$where 					= array(
									'user_email' => $email,
									'user_token' => $code
								);

	
		$data['user_status'] 	= '1';

	
		$exe 					= $this->db->where($where);
		$exe 					= $this->db->update('users', $data);


	
		return $exe;

	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */