<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ProductModel');
    } 
	public function index()
	{
	    if(isset($_SESSION["username"])){
	        if($_SESSION["username"]=="admin"){
	            header('location:'.base_url("Dashboard"));
	        }
	        else{
	            $data['products']=$this->ProductModel->getProducts();
	            $this->load->view('landing',$data);
	        }
	    }
	    else{
	       $data['products']=$this->ProductModel->getProducts(); 
		   $this->load->view('landing',$data);   
	    }
	}
}