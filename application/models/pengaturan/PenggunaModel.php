<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model {

	public function getAllData()
	{
		$exe 		= $this->db->select('a.*, b.*, c.*')
								->from('role_users a')
								->join('users b', 'a.role_user_id 	= b.user_id')
								->join('level c', 'a.role_lev_id 	= c.lev_id')
								->get();

		return $exe;
	}


	public function getDetailData($id)
	{
		$exe 		= $this->db->select('a.*, b.*, c.*')
								->from('role_users a')
								->join('users b', 'a.role_user_id 	= b.user_id')
								->join('level c', 'a.role_lev_id 	= c.lev_id')
								->where('b.user_id', $id)
								->get();

		return $exe;	
	}

	public function add()
	{
		$level 						= $this->input->post('level');


		$data['user_name'] 			= $this->input->post('nama');
		$data['user_phone'] 		= $this->input->post('phone');
		$data['user_password'] 		= $this->b_password->create_hash($this->input->post('password'));
		$data['user_email'] 		= $this->input->post('email');
		$data['user_token'] 		= '-';
		$data['user_status'] 		= 1;


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

/* End of file PenggunaModel.php */
/* Location: ./application/models/pengaturan/PenggunaModel.php */