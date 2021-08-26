<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$is_login	= $this->session->userdata('is_login');

		if ($is_login) {
			redirect(base_url());
			return;
		}
	}

	public function index()
	{
		if (!$_POST) {
			$input	= (object) $this->login->getDefaultValues();
		} else {
			$input	= (object) $this->input->post(null, true);
		}

		if (!$this->login->validate()) {
			$data['title']	= 'Welcome to Pools Admin Dashboard';
			$data['input']	= $input;

            $this->load->view('pages/auth/login', $data);
			return;
		}

		if ($this->login->run($input)) {
			$this->session->set_flashdata('success', 'Successfully logged in!');
			redirect(base_url('/administrator/dashboard'));
		} else {
			$this->session->set_flashdata('error', 'Wrong E-Mail or Password or your account is inactive!');
			redirect(base_url());
		}
	}


}

/* End of file Login.php */
