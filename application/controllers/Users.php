<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('UserModel');
    } 
	public function index()
	{ 
        $data['users']=$this->UserModel->getUsers();
		$this->load->view('admin/users',$data);
	}
    public function addUser(){
        $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[8]');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password-input','Password','required|min_length[8]');
        $this->form_validation->set_rules('confpassword-input','Confirm Password','required|min_length[8]|matches[password-input]');
        if($this->form_validation->run()==FALSE){
            $data['users']=$this->UserModel->getUsers();
            $this->load->view('admin/users',$data);
        }
        else{
            $this->UserModel->addUser();
            redirect('users','location');
        }
    }
    public function editUser(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('username','Username','required|min_length[8]|alpha_numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('role','Role','required');
        if($this->form_validation->run()==TRUE){
            $this->UserModel->updateUser();
            header('location:'.base_url('Users'));
        }
        else{
            $data['users']=$this->UserModel->getUsers();
            $this->load->view('users',$data);
        }
    }
    public function removeUser($username){
        $this->UserModel->removeUser($username);
        header('location:'.base_url('Users'));
    }
}