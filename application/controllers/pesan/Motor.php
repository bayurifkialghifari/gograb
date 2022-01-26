<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motor extends CI_Controller {


	// Main function
	public function index()
	{
		if($this->session->userdata('data')['level'] != 'User')
		{
			redirect('dashboard','refresh');
		}

		$model 			= $this->load->model('pengaturan/hargaModel', 'hargaModel');
	
      	$data['harga']  = $this->hargaModel->getAllData()->row_array()['tari_harga'];
		$data['title'] 	= 'ORDER BIKE';

		$this->load->view('templates/content/motor', $data);

	}




	
	


	// Order bike
	public function order()
	{

		$customerId 	= $this->input->post('user_id');
		$driverId 		= $this->input->post('driv_id');
		$from 			= $this->input->post('from');
        $to 			= $this->input->post('to');
        $price 			= $this->input->post('price');
        $jarak 			= $this->input->post('jarak');
        $lama 			= $this->input->post('lama');

        $exe 			= $this->motor->order($customerId, $driverId, $from, $to, $price, $jarak, $lama);

        echo json_encode($exe);
	}



	// Order Batal
	public function orderBatal()
	{
		$customerId 	= $this->input->post('user_id');
		$driverId 		= $this->input->post('driv_id');
		$from 			= $this->input->post('from');
        $to 			= $this->input->post('to');
        $price 			= $this->input->post('price');
        $jarak 			= $this->input->post('jarak');
        $lama 			= $this->input->post('lama');

        $exe 			= $this->motor->orderBatal($customerId, $driverId, $from, $to, $price, $jarak, $lama);

        echo json_encode($exe);	
	}



	// Get Detail Customer
	public function getDetailCustomer()
	{

		$customerId 	= $this->input->post('id');

		$exe 			= $this->motor->getDetailCustomer($customerId)->row_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}



	// Get Detail Driver
	public function getDetailDriver()
	{

		$driverId 		= $this->input->post('id');

		$exe 			= $this->motor->getDetailCustomer($driverId)->row_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}



	// Load model
	function __construct()
	{

		parent::__construct();

		$this->load->model('pesan/motorModel', 'motor');

	}


}

/* End of file Motor.php */
/* Location: ./application/controllers/pesan/Motor.php */