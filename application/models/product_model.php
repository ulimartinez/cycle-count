<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
	public function __construct() {
		parent::__construct();
	}

	public $_table = 'product';
	public $primary_key = 'Pid';

}
