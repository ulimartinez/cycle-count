<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('default');
    }

    public function index($renderData = "") {
        $this->title = "iLink | Members";
        $this->keywords = "iLink, Cybershare, Group, UTEP";
        $folder = 'template';
        $products = $this->product_model->get_all();
        $this->data['products'] = $products;

        $this->_render('pages/product/productsListing', $renderData, $folder);
    }
}
