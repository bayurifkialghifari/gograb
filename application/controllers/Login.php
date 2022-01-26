<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	// Main function
	public function index()
	{

		if($this->session->userdata('status') == true)
		{
			redirect('users/home','refresh');
		}

		// Data for view
		$data['title'] 		= 'Login';
		

		// Load view
		$this->load->view('templates/content/login', $data);
		
	}


	// Check Login
	public function checkLogin()
	{

		// Get Data
		$email 				= $this->input->post('email');
		$password 			= $this->input->post('password');

		// Check email
		$exe 				= $this->login->checkEmail($email);
		
		if($exe->num_rows() > 0)
		{
			$data 			= $exe->row_array();

			$checkPassword 	= $this->b_password->verify($password, $data['user_password']);

			// Password true
			if($checkPassword == true)
			{
				$session_data = array
				(
					'status' => true,
					'data'	 => array
							(
								'id' 		=> $data['user_id'],
								'nama' 		=> $data['user_name'],
								'email' 	=> $data['user_email'], 
								'level' 	=> $data['lev_nama'],
							)
				);

				$this->session->set_userdata($session_data);

				echo json_encode(1);
			}
			// Password false
			else
			{
				echo json_encode(0);
			}
		}
		else
		{
			echo json_encode(2);
		}
	}


	// Active the email
	public function acc()
	{
		$code	  		= $this->input->get('code');
		$email 			= $this->input->get('email');

		$acc 			= $this->login->acc($code, $email);

		echo "<script>alert('Your account is already active !!')</script>";

		redirect('login','refresh');
	}


	// Logout function
	public function logout()
	{
		$session = array('status','data');
		
		$this->session->unset_userdata($session);

		redirect('login','refresh');
	}


	// Load Model and Library
	function __construct()
	{

		parent::__construct();

		$this->load->model('loginModel', 'login');
		$this->load->library('b_password');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */