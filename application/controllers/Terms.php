<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
    } 
	public function index()
	{
	  $this->load->view('terms');
	}
    
}