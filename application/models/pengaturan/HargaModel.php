<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HargaModel extends CI_Model {

	public function getAllData()
	{
		$exe 	= $this->db->get('tarif');

		return $exe;
	}

	public function getDetailData($id)
	{
		$exe 	= $this->db->get_where('tarif', ['tari_id' => $id]);

		return $exe;	
	}

	public function update()
	{
		$id 						= $this->input->post('id');
		$data['tari_nama'] 			= $this->input->post('nama');
		$data['tari_keterangan'] 	= $this->input->post('deskripsi');
		$data['tari_harga'] 		= (int)$this->input->post('harga') / 1000;

		$exe 					= $this->db->where('tari_id', $id);
		$exe 					= $this->db->update('tarif', $data);

		return $exe;	
	}
}

/* End of file HargaModel.php */
/* Location: ./application/models/pengaturan/HargaModel.php */