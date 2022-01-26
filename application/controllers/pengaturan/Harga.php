<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller {


	// Main function
	public function index()
	{
		if($this->session->userdata('data')['level'] == 'User')
		{
			redirect('users/menu','refresh');
		}
	
		$data['title'] 	= 'Setting Harga';

		$this->load->view('templates/content/pengaturan-harga', $data);

	}




	// Get Data
	public function getAllData()
	{
		$exe 	= $this->harga->getAllData()->result_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}




	// Get Data Detail
	public function getDetailData()
	{
		$id 	= $this->input->post('id');

		$exe 	= $this->harga->getDetailData($id)->row_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}





	// Action data
	public function update()
	{
		$exe 	= $this->harga->update();
	}





	// Load model
	function __construct()
	{

		parent::__construct();

		$this->load->model('pengaturan/hargaModel', 'harga');

	}


}

/* End of file Harga.php */
/* Location: ./application/controllers/pengaturan/Harga.php */
