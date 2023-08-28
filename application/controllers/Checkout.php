<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	private $role="";
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('UserModel');
    } 
    public function index(){
      $customDataJson=$this->input->post("items");
      $this->session->set_userdata('order',json_decode($customDataJson));
      $data['user']=(isset($_SESSION['username']))?$this->UserModel->getUserInfo($_SESSION['username']):"";
      $this->load->view('checkout',$data);
	}
  public function placeOrderUser(){
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('phone','Phone Number','required|numeric');
      $this->form_validation->set_rules('address','Address','required');
      if($this->form_validation->run()==FALSE){
        $data['user']=$this->UserModel->getUserInfo($_SESSION['username']);
        $this->load->view('checkout',$data);
      }
      else{
        $this->OrderModel->addOrderUser();
        $this->load->view('ordersuccess');
        $this->session->unset_userdata('order');
      }
    }
  public function placeOrder(){
    $this->form_validation->set_rules('firstname','Firstname','required');
    $this->form_validation->set_rules('lastname','Lastname','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('phone','Phone Number','required|numeric');
    $this->form_validation->set_rules('address','Address','required');
    if($this->form_validation->run()==FALSE){
      $data['user']=$this->UserModel->getUserInfo($_SESSION['username']);
      $this->load->view('checkout',$data);
    }
    else{
      $this->OrderModel->addOrder();
      $this->load->view('ordersuccess');
      $this->session->unset_userdata('order');
    }
  }
}
