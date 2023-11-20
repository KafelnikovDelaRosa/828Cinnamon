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
      $this->load->view('user/orderhistory',$data);
	}
    public function searchById($id){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $data['orders']=$this->OrderModel->getOrderById($id,$email);
      $this->load->view('user/orderhistory',$data);
    }
    public function searchByDate($from,$to){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $data['orders']=$this->OrderModel->getOrderByDate($from,$to,$email);
      $this->load->view('user/orderhistory',$data);
    }
    public function payOrder($id){
      $email=$this->UserModel->getUserEmail($_SESSION['username']);
      $this->OrderModel->generateReferenceNo($id);
      $this->NotificationModel->addUserNotification($email,$receipt);
      $data['title']='Orders';
      $data['message']="Reference no generated!";
      $data['root_url']='orders';
      $data['return']='Check notifications';
      $this->load->view('admin/crudsuccess',$data);
    }
    public function cancelOrder($id){
      $this->OrderModel->cancelOrder($receipt);
      $data['title']='Orders';
      $data['message']="Order no $id cancelled!";
      $data['root_url']='orders';
      $data['return']='Return to orders';
      $this->load->view('admin/crudsuccess',$data);
    }
}