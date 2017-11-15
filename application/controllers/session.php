<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[2]|max_length[150]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$user_info = $this->user_model->login($email, $password);
			if ($user_info) {
				$data = array(
					'username' => $user_info->Uusername,
					'is_logged_in' => TRUE,
					'email' => $user_info->Uemail,
					'firstName' => $user_info->Ufirstname,
					'lastName' => $user_info->Ulastname,
					'is_admin' => $user_info->Uis_admin,
					'resetPassword' => $user_info->Uresetpassword,
					);
				$this->session->set_userdata($data);
				echo "success";
			} else {
				echo "Invalid email/password combination";
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('Location: ' . base_url());
	}
}
