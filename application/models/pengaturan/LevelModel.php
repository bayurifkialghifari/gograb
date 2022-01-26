<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LevelModel extends CI_Model {

	public function getAllData()
	{
		$exe 	= $this->db->get('level');

		return $exe;
	}

	public function getDetailData($id)
	{
		$exe 	= $this->db->get_where('level', ['lev_id' => $id]);

		return $exe;	
	}

	public function add()
	{
		$data['lev_nama'] 		= $this->input->post('nama');
		$data['lev_deskripsi'] 	= $this->input->post('deskripsi');

		$exe 					= $this->db->insert('level', $data);

		return $exe;
	}

	public function update()
	{
		$id 					= $this->input->post('id');
		$data['lev_nama'] 		= $this->input->post('nama');
		$data['lev_deskripsi'] 	= $this->input->post('deskripsi');

		$exe 					= $this->db->where('lev_id', $id);
		$exe 					= $this->db->update('level', $data);

		return $exe;	
	}

	public function delete()
	{
		$id 					= $this->input->post('id');

		$exe 					= $this->db->where('lev_id', $id);
		$exe 					= $this->db->delete('level');

		return $exe;
	}

}

/* End of file LevelModel.php */
/* Location: ./application/models/pengaturan/LevelModel.php */