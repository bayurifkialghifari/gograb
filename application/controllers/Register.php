<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	// Main function
	public function index()
	{
		
		if($this->session->userdata('status') == true)
		{
			redirect('users/home','refresh');
		}

		// Data for view
		$data['title'] 		= 'Register';


		// Load view
		$this->load->view('templates/content/register', $data);

	}



	// Save data function
	public function save()
	{

		// Get data
		$name 		= $this->input->post('name');
		$email 		= $this->input->post('email');
		$phone 		= $this->input->post('phone');
		$password 	= $this->input->post('password');
		$level 		= $this->input->post('level');
		$code 		= generateFont();


		// Encypt pssword
		$password 	= $this->b_password->create_hash($password);		
		

		// Execute Data
		$exe 				= $this->register->save($name, $email, $phone, $password, $level, $code);

		if($exe != 0)
		{

			// Setting for sending E-mail
			$config     = array(
	            'protocol'  => 'smtp',
	            'smtp_host' => 'ssl://smtp.gmail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'gwp01070@gmail.com',
	            'smtp_pass' => '@Cimahi123',
	            'wordwrap' 	=> TRUE

	        );

	        $this->load->library('email', $config);
	        
	        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
	        $this->email->set_header('Content-type', 'text/html');
	        $this->email->set_newline("\r\n");
	        $this->email->from('gograb.com', 'GO-GRAB OFFICIAL');
	        $this->email->to($email);
	        $this->email->subject('Activate Your Account');

	        // Data to email vinfo 
	        $data['url'] 					= base_url() . 'login/acc?code=' . $code . '&email=' . $email;

	        // Load view for message email
	        $view                           = $this->load->view('email/vinfo', $data, TRUE);

	        $this->email->message($view);

	        // Send email
	        if (!$this->email->send()) 
	        {
	            show_error($this->email->print_debugger());

	            exit;
	        }

	        // Return true
	        echo json_encode(1);

		}
		else
		{

			// Return false
	        echo json_encode(0);

		}

	}



	// Load Model and Library
	function __construct()
	{

		parent::__construct();

		$this->load->model('registerModel', 'register');
		$this->load->library('b_password');

	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */