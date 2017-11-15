<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends MY_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('website_model');
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->database('default');

	}

	public function addWebsite($renderData = "") {
		if ($this->session->userdata('is_logged_in')) {
			$this->title = "iLink | Websites";
			$this->keywords = "iLink, cybershare, group, utep";
			$folder = 'template';
			$this->_render('pages/websites/addWebsite', $renderData, $folder);
		} else {
			$this->load->view('workspace/denied');
		}
	}

	public function addWebsiteFunction() {
		if (($this->session->userdata('is_logged_in'))) {
			$this->form_validation->set_rules('websiteUrl', 'Website Url', 'required|trim|min_length[4]xss_clean');
			$this->form_validation->set_rules('websiteType', 'Website Type', 'required|trim|min_length[0]|max_length[150]|xss_clean|callback_isValid');
			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
			} else {
				$newWebsite = array(
					'Wurl' => $this->input->post('websiteUrl'),
					'Wtype' => $this->input->post('websiteType'),
					'Musername_fk' => $this->session->userdata('username'),
				);
				$previousWebsite = $this->website_model->hasWebsite($newWebsite['Musername_fk'], $newWebsite['Wtype']);
				if ($previousWebsite != null){
					$this->website_model->update($previousWebsite->Wid, $newWebsite);
				}
				else
					$this->website_model->insert($newWebsite);

				echo "success";
			}
		} else {
			$this->title = "Access Denied";
			$this->load->view('template/denied');
		}
	}

	public function isValid($websiteType){
		$this->form_validation->set_message('isValid', 'You must select a valid website type');
		return (strcmp($websiteType, 'LinkedIn') == 0 || strcmp($websiteType, 'Personal Website') == 0 || strcmp($websiteType, 'Github') == 0 ) ? true : false;
	}
}
