<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');
	}

	public function editProfile($username, $renderData = "") {
		$is_admin = $this->session->userdata('is_admin');
		$is_user = $this->session->userdata('username') == $username;

		if ($this->session->userdata('is_logged_in') && ($is_admin || $is_user)) {
			$this->title = "Skeleton | Users";
			$folder = 'template';
			$this->data['user'] = $this->user_model->get_by('Uusername', $username);
			$this->_render('pages/profile/editProfile', $renderData, $folder);
		} else {
			$this->load->view('workspace/denied');
		}
	}

	public function editProfileFunction() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('firstName', 'First Name', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('is_admin', 'Is user Admin', 'trim|xss_clean');

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				$isAdmin = $this->input->post('is_admin') == 'true' ? 1 : 0;

				$updatedInfo = array(
					'Ufirstname'   => $this->input->post('firstName'),
					'Ulastname'    => $this->input->post('lastName'),
					'Uemail'       => $this->input->post('email'),
					'Uis_admin'    => $isAdmin,
					);
				$this->user_model->update($this->input->post('currentEmail'), $updatedInfo, true);
				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}

	public function setPassword($renderData = "") {
		if ($this->session->userdata('is_logged_in')) {
			$this->title = "Skeleton | Members";
			$folder = 'template';
			$this->_render('pages/profile/setPassword', $renderData, $folder);
		} else {
			$this->load->view('workspace/denied');
		}
	}

	public function setPasswordFunction() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('oldPassword', 'Old Password', 'required|trim|callback_passwordCheck');
			$this->form_validation->set_rules('password', 'Password Confirmation', 'required|trim|min_length[5]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|trim|min_length[5]|max_length[150]|xss_clean|matches[password]');

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				$newPassword = array('Upassword' => sha1($this->input->post('password')));
				$email = $this->session->userdata('email');

				$this->user_model->update($email, $newPassword, true);
				$this->user_model->update($email, array('Uresetpassword' => 0));
				$this->session->set_userdata('resetpassword', 0);

				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}

	public function resetPassword($renderData = "") {
		$this->title = "iLink | Members";
		$this->keywords = "iLink, cybershare, group, utep";
		$folder = 'template';
		$this->_render('pages/profile/resetPassword', $renderData, $folder);
	}

	public function resetPasswordFunction() {
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[5]|max_length[250]|xss_clean');

		if ($this->form_validation->run() == false) {
			echo validation_errors();
		} else {
			$email = $this->input->post('email');
			$emailExists = $this->user_model->get($email);
			if ($emailExists) {
				$newPassword = $this->generateRandomPassword();
				$update = array(
					'Mpassword'      => sha1($newPassword),
					'Mresetpassword' => 1,
					);
				$this->user_model->update($email, $update);

				$this->sendResetEmail($email, $newPassword);
			}
			echo "success";
		}
	}

	public function passwordCheck($password) {
		$email = $this->session->userdata('email');
		if ($this->user_model->checkPassword($email, sha1($password))) {
			return true;
		} else {
			$this->form_validation->set_message('passwordCheck', 'The Old Password field does not match your current password');

			return false;
		}
	}

	private function generateRandomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^*_+-=';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 15; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}

		return implode($pass); //turn the array into a string
	}

	private function sendResetEmail($email, $newPassword) {
		$subject = "iLink Password Reset";
		$message = 'Dear iLink Member here is your new password: ' . $newPassword;
		$headers = 'From: iLink <no-reply@iLink.com>';
		mail($email, $subject, $message, $headers);
	}
}
