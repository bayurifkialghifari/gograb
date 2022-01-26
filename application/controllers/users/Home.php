<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	// Main function
	public function index()
	{
		if($this->session->userdata('data')['level'] != 'User')
		{
			redirect('dashboard','refresh');
		}
	
		// Data for view
		$data['title'] 		= 'Home';


		// Load view
		$this->load->view('templates/content/main-page', $data);
	
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/users/Home.php */