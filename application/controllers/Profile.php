<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	// Main function
	public function index()
	{
		$data['title'] 	= 'Profile';

		$this->load->view('templates/content/profile-data', $data);

	}


}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */