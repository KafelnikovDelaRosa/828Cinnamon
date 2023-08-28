<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('UserModel');
        $this->load->model('InventoryModel');
        $this->load->model('ProductModel');
    } 
	public function index()
	{
	    $data['items']=$this->InventoryModel->getNoItems();
        $data['orders']=$this->OrderModel->getOrderSum();
        $data['users']=$this->UserModel->getUserSum();
        $data['products']=$this->ProductModel->getProductSum();
        $data['sales']=$this->OrderModel->getOrderSumCompleted();
		$this->load->view('dashboard',$data);
	}
}