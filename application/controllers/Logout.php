<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        header('location:'.base_url('Landing'));
        session_destroy();
    }
}