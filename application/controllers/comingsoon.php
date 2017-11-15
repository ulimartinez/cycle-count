<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comingsoon extends CI_Controller {
	
	public function index(){	
		$this->load->view('pages/coming_soon');
	}
}