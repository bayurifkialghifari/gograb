<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {


	// Main function
	public function index()
	{
		if($this->session->userdata('data')['level'] == 'User')
		{
			redirect('users/menu','refresh');
		}
	
		$data['title'] 	= 'Setting Level';

		$this->load->view('templates/content/pengaturan-level', $data);

	}




	// Get Data
	public function getAllData()
	{
		$exe 	= $this->level->getAllData()->result_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}




	// Get Data Detail
	public function getDetailData()
	{
		$id 	= $this->input->post('id');

		$exe 	= $this->level->getDetailData($id)->row_array();

		$this->output->set_content_type('application/json')->set_output(json_encode($exe));
	}





	// Action data
	public function add()
	{
		$exe 	= $this->level->add();
	}

	public function update()
	{
		$exe 	= $this->level->update();
	}

	public function delete()
	{
		$exe 	= $this->level->delete();
	}





	// Load model
	function __construct()
	{

		parent::__construct();

		$this->load->model('pengaturan/levelModel', 'level');

	}


}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */