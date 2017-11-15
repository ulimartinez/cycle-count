<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* File: user.php (controller)
 * Author: Luis Garnica
 * View Dependant: dashboard
 * Description: Validates and handles user login, validation and management.
 *  */
     
class Error extends CI_Controller {
    
    function index(){
	$this->load->view('pages/404');
    }
            
}