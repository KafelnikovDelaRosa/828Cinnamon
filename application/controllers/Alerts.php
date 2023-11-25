<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alerts extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('AlertModel');
    }
    public function index(){
        $data['alerts']=$this->AlertModel->getAllAlerts();
        $this->load->view('admin/alerts',$data);
    }
}