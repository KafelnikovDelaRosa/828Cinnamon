<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
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
    $data['orders']=$this->OrderModel->getOrders();
	  $this->load->view('order',$data);
	}
    public function cancelOrder($orderid){
      $this->OrderModel->cancelOrder($orderid);
      header('location:'.base_url("Orders"));
    }
    public function searchOrder(){
      $result=$this->input->post("receiptno");
      if(empty($result)){
        header('location:'.base_url('Orders'));
      }
      else{
        $data['orders']=$this->OrderModel->getOrderByReceipts($this->input->post("referenceno"));
        $this->load->view('order',$data);
      }
    }
    public function completeOrder($orderid){
      $this->OrderModel->completeOrder($orderid);
      header('location:'.base_url("Orders"));
    }
}