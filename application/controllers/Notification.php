<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('NotificationModel');
        $this->load->model('UserModel');
    } 
	public function index()
	{ 
    $email=$this->UserModel->getUserEmail($_SESSION['username']); 
    $data['msg']=$this->NotificationModel->getUserNotifications($email);
	  $this->load->view('notification',$data);
	}
}