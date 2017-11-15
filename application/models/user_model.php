<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
	public function __construct() {
		parent::__construct();
	}

	public $_table = 'user';
	public $primary_key = 'Uemail';

	public function login($email, $password) {
		$this->db->where('Uemail', $email);
		$this->db->where('Upassword', $password);
		$query = $this->db->get('user');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			$this->session->set_flashdata('incorrect_user', 'Invalid email/password combination'); //Used for error reporting
		}
	}

	public function checkPassword($email, $password) {
		$this->db->where('Uemail', $email);
		$this->db->where('Upassword', $password);
		$query = $this->db->get('user');

		return $query->num_rows() == 1 ? true : false;
	}
}
