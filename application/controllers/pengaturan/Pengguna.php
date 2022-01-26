<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {


	// Main function
	public function index()
	{
		if($this->session->userdata('data')['level'] == 'User')
		{
			redirect('users/menu','refresh');
		}
	
		$data['title'] 	= 'Setting Users';
		$data['level'] 	= $this->db->get('level')->result_array();

		$this->load->view('templates/content/pengaturan-pengguna', $data);

	}




	// Get Data
	public function getAllData()
	{
		$exe 	= $this->pengguna->getAllData()->result_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}




	// Get Data Detail
	public function getDetailData()
	{
		$id 	= $this->input->post('id');

		$exe 	= $this->pengguna->getDetailData($id)->row_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}





	// Action data
	public function add()
	{
		$exe 	= $this->pengguna->add();
	}

	public function update()
	{
		$exe 	= $this->pengguna->update();
	}

	public function delete()
	{
		$exe 	= $this->pengguna->delete();
	}





	// Load model
	function __construct()
	{

		parent::__construct();

		$this->load->model('pengaturan/penggunaModel', 'pengguna');
		$this->load->library('b_password');

	}


}

/* End of file Pengguna.php */
/* Location: ./application/controllers/pengaturan/Pengguna.php */