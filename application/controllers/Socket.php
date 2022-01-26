<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socket extends CI_Controller {


	public function pesan()
	{
		/**
		 * APP_KEY Pusher liblary
		 * 
		 * 
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * key = "711b19f530583c9309c4"
		 * secret = "17e4f3883c8bd2a7afc9"
		 * cluster = "ap1"
		 *
		 *
		 *
		 **/
		require_once APPPATH . 'libraries/pusher/autoload.php';

		$options 						= array(
			'cluster' 	=> 'ap1',
			'useTLS' 	=> true
		);

		$pusher 						= new Pusher\Pusher(
			'711b19f530583c9309c4',
			'17e4f3883c8bd2a7afc9',
			'1010754',
			$options
		);



		$customerId 	= $this->input->post('user_id');
		$status 		= $this->input->post('status');
		// $driverId 		= $this->input->post('driv_id');
		$from 			= $this->input->post('from');
        $to 			= $this->input->post('to');
        $price 			= $this->input->post('price');
        $jarak 			= $this->input->post('jarak');
        $lama 			= $this->input->post('lama');

		// Triger websocket
		$data['message'] 				= 'success';
		$data['status'] 				= $status;
		$data['from'] 					= $from;
		$data['to'] 					= $to;
		$data['price'] 					= $price;
		$data['jarak'] 					= $jarak;
		$data['customerId'] 			= $customerId;

		$pusher->trigger('motor', 'pesanan-datang', $data);

		echo json_encode(1);
	}

	public function jalan()
	{
		/**
		 * APP_KEY Pusher liblary
		 * 
		 * 
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * key = "711b19f530583c9309c4"
		 * secret = "17e4f3883c8bd2a7afc9"
		 * cluster = "ap1"
		 *
		 *
		 *
		 **/
		require_once APPPATH . 'libraries/pusher/autoload.php';

		$options 						= array(
			'cluster' 	=> 'ap1',
			'useTLS' 	=> true
		);

		$pusher 						= new Pusher\Pusher(
			'711b19f530583c9309c4',
			'17e4f3883c8bd2a7afc9',
			'1010754',
			$options
		);



		$customerId 	= $this->input->post('user_id');
		$status 		= $this->input->post('status');
		$driver 		= $this->input->post('driv_id');

		// Triger websocket
		$data['message'] 				= 'success';
		$data['status'] 				= $status;
		$data['customerId'] 			= $customerId;
		$data['driver'] 				= $driver;

		$pusher->trigger('motor', 'jalan', $data);

		echo json_encode(1);
	}

	public function batalPesanan()
	{
		/**
		 * APP_KEY Pusher liblary
		 * 
		 * 
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * app_id = "1010754"
		 * key = "711b19f530583c9309c4"
		 * secret = "17e4f3883c8bd2a7afc9"
		 * cluster = "ap1"
		 *
		 *
		 *
		 **/
		require_once APPPATH . 'libraries/pusher/autoload.php';

		$options 						= array(
			'cluster' 	=> 'ap1',
			'useTLS' 	=> true
		);

		$pusher 						= new Pusher\Pusher(
			'711b19f530583c9309c4',
			'17e4f3883c8bd2a7afc9',
			'1010754',
			$options
		);



		$id 			= $this->input->post('user_id');
		$status 		= $this->input->post('status');
		// Triger websocket
		$data['message'] 				= 'success';
		$data['status'] 				= $status;
		$data['id'] 					= $id;

		$pusher->trigger('motor', 'batal', $data);

		echo json_encode(1);
	}


}

/* End of file Motor.php */
/* Location: ./application/controllers/pesan/Soclet.php */