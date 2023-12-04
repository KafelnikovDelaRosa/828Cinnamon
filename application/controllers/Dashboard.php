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
        $this->load->model('SalesModel');
        $this->load->model('TransactionModel');
        $this->load->model('AlertModel');
    } 
	public function index()
	{
        $data['items']=$this->InventoryModel->getInventoryLow();
        $data['currentOrders']=$this->OrderModel->getCurrentOrders();
        $data['customerStatus']=$this->OrderModel->getOrderTracks();
        $data['users']=$this->UserModel->getUserSum();
        $data['products']=$this->ProductModel->getProductSum();
        $data['transactions']=$this->TransactionModel->getTransactions();
        $data['sales']=$this->SalesModel->getSales();
		$this->load->view('admin/dashboard',$data);
	}
}