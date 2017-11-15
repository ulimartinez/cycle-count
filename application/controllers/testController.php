<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestController extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('car_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');
	}
	
	public function testMethod($renderData=""){	
		$this->title = "Skeleton | Home";
		$this->keywords = "skeleton, code igniter";
		$folder = 'template';
		$this->_render('pages/createCar', $renderData, $folder);
	}

	public function createCarFunction() {
		if (($this->session->userdata('is_logged_in')) && ($this->session->userdata('is_admin') == 1)) {
			$this->form_validation->set_rules('make', 'Car Make', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('model', 'Model', 'required|trim|min_length[2]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[2]|max_length[150]|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
			} else {
				$newCar = array(
					'Cmake'   => $this->input->post('make'),
					'Cmodel'    => $this->input->post('model'),
					'Cyear'    => $this->input->post('year'),
					);
				$this->car_model->insert($newCar);
				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}
}