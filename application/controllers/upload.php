<?php

class Upload extends MY_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database('default');
	}

	public function createDir($dirName) {
		if (!file_exists($dirName))
			if (!mkdir($dirName, 0777, true))
				die('Failed to create folder: ' . $dirName);
	}

	public function setConfiguration($uploadDir, $allowedTypes, $fileName = "") {

		if ($fileName)
			$config['file_name'] = $fileName;

		$config['allowed_types'] = $allowedTypes;
		$config['overwrite'] = 'TRUE';
		$config['file_ext_tolower'] = 'TRUE';
		$config['upload_path'] = $uploadDir;

		return $config;
	}

	public function radioButtonValidation($radioValue) {
		$this->form_validation->set_message('radioButtonValidation', 'You must select a featured photo');
		return $radioValue != 'undefined';
	}
}
