<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

	public function save($name, $email, $phone, $password, $level, $code)
	{
		// Check email
		$check 					= $this->db->get_where('users', ['user_email' => $email]);

		if($check->num_rows() > 0)
		{
	
			// Return False 
			return 0;
	
		}
		else
		{

			// Data users
			$data['user_name'] 		= $name;
			$data['user_email'] 	= $email;
			$data['user_phone'] 	= $phone;
			$data['user_password'] 	= $password;
			$data['user_token'] 	= $code;
			$data['user_status'] 	= 0;


			// Execute data users
			$exe 					= $this->db->insert('users', $data);

			$user_id 				= $this->db->insert_id();

			// Data role users
			$data2['role_user_id'] 	= $user_id;
			$data2['role_lev_id'] 	= $level;

			// Execute data role users
			$exe2 					= $this->db->insert('role_users', $data2);

			if($level == 2)
			{
				$data3['driv_user_id'] 	= $user_id;
				$data3['driv_status'] 	= 0;

				$exe3 					= $this->db->insert('driver', $data3);
			}

			return $exe2;

		}

	}

}

/* End of file RegisterModel.php */
/* Location: ./application/models/RegisterModel.php */