<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderHistory extends CI_Controller {
	private $role="";
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('UserModel');
        $this->load->model('NotificationModel');
    } 
    public function index(){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $data['orders']=$this->OrderModel->getUserOrder($email);
      $this->load->view('orderhistory',$data);
	}
    public function searchById($id){
      $data['orders']=$this->OrderModel->getOrderById($id);
      $this->load->view('orderhistory',$data);
    }
    public function payOrder(){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $receipt=$this->input->post("receipt");
      $this->OrderModel->generateReferenceNo($receipt);
      $this->NotificationModel->addUserNotification($email,$receipt);
      $this->load->view('payed');
    }
    public function cancelOrder(){
      $receipt=$this->input->post("receipt");
      $this->OrderModel->cancelOrder($receipt);
      redirect('orders/cancel','location');
      header('location:'.base_url("OrderHistory/cancelled"));
    }
}