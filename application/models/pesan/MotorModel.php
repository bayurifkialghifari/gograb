<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MotorModel extends CI_Model {

	public function getDetailCustomer($id)
	{
		$exe 		= $this->db->get_where('users', ['user_id' => $id]);

		return $exe;
	}

	public function order($customerId, $driverId, $from, $to, $price, $jarak, $lama)
	{
		$data['tran_user_id'] 	= $customerId;
		$data['tran_driv_id'] 	= $driverId;
		$data['tran_asal'] 		= $from;
		$data['tran_tujuan'] 	= $to;
		$data['tran_jarak'] 	= $jarak;
		$data['tran_harga'] 	= $price;
		$data['tran_status'] 	= 'Dijalan';

		$exe 					= $this->db->insert('transaksi', $data);

		return $data;
	}

	public function orderBatal($customerId, $driverId, $from, $to, $price, $jarak, $lama)
	{
		$data['tran_user_id'] 	= $customerId;
		$data['tran_driv_id'] 	= $driverId;
		$data['tran_asal'] 		= $from;
		$data['tran_tujuan'] 	= $to;
		$data['tran_jarak'] 	= $jarak;
		$data['tran_harga'] 	= $price;
		$data['tran_status'] 	= 'Batal';

		$exe 					= $this->db->insert('transaksi', $data);

		return $data;	
	}

}

/* End of file MotorModel.php */
/* Location: ./application/models/MotorModel.php */