<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        if(isset($_SESSION['username'])){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('profilepic');
            redirect(base_url(),'location');
        }
        if(isset($_SESSION['useradmin'])){
            $this->session->unset_userdata('useradmin');
            redirect(base_url(),'location');
        }
    }
}