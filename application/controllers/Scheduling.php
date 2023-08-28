<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Scheduling extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('BomModel');
        $this->load->model('ScheduleModel');
    }
    public function index(){
        $this->load->view('schedule');
    }
}