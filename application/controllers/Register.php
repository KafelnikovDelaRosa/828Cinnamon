<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    } 
	public function index()
	{
        $this->form_validation->set_rules('email','Email Address','required|valid_email'); 
        $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[6]');
        $this->form_validation->set_rules('password-input','Password','trim|required|min_length[8]');
        $this->form_validation->set_rules('confpassword-input','Confirm Password','trim|required|min_length[8]|matches[password-input]');
        if($this->form_validation->run()==FALSE){
            $data['usernames']=$this->UserModel->getUsernames();
            $data['emails']=$this->UserModel->getUserEmails();
            $this->load->view('user/register',$data);
        }
        else{
            $this->UserModel->addUser();
            $this->load->view('user/registersuccess');
        }
	} 
}

