<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index($renderData=""){	
		$this->title = "Skeleton | Home";
		$this->keywords = "skeleton, code igniter";
		$folder = 'template';
		$this->_render('pages/home', $renderData, $folder);
	}
}