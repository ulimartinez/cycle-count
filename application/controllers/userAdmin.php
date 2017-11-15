<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAdmin extends MY_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');
	}

	public function createUser($renderData = "") {
		if ($this->session->userdata('is_logged_in')) {
			$this->title = "Skeleton | Admin";
			$this->keywords = "some, keywords";
			$folder = 'template';
			$this->_render('pages/userAdmin/createUser', $renderData, $folder);
		} else {
			$this->load->view('workspace/denied');
		}
	}

	public function createUserFunction() {
		if (($this->session->userdata('is_logged_in')) && ($this->session->userdata('is_admin') == 1)) {
			$this->form_validation->set_rules('firstName', 'First Name', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('is_admin', 'Is user Admin', 'trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
			} else {
				$newUser = array(
					'Ufirstname'   => $this->input->post('firstName'),
					'Ulastname'    => $this->input->post('lastName'),
					'Uusername'    => $this->getUsername($this->input->post('email')),
					'Uemail'       => $this->input->post('email'),
					'Upassword'    => sha1($this->getUsername($this->input->post('email'))), //default password is their username
					'Uis_admin'    => ($this->input->post('is_admin') == 'true' ? 1 : 0),
				);
				$this->user_model->insert($newUser);
				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}

	public function deleteUsers() {
		$usersToDelete = $this->input->post('usersToDelete');

		if (($this->session->userdata('is_logged_in')) && ($this->session->userdata('is_admin') == 1)) {
			$this->form_validation->set_message('required', 'You must select a user to delete');
			$this->form_validation->set_rules('usersToDelete', 'Members to delete', 'required|trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
			} else {
				$usersToDelete = explode(",", $usersToDelete);

				foreach ($usersToDelete as $user) {
					$this->user_model->delete($user);
				}
				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}

	public function editUsers($renderData = "") {
		if ($this->session->userdata('is_logged_in')) {
			$this->title = "Skeleton | Admin";
			$folder = 'template';
			$this->data['users'] = $this->user_model->get_all();
			$this->_render('pages/userAdmin/editUsers', $renderData, $folder);
		} else {
			$this->load->view('workspace/denied');
		}
	}

	public function getUsername($email) {
		$username = explode("@", $email);
		return $username[0];
	}
}


