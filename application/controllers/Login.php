<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	private $role="";
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('UserModel');
    } 
    public function index(){
		$this->form_validation->set_rules('username','Username',array('required',
		array(
			'username_found',
			function($user){
				$this->load->database();
				$this->db->where("BINARY username='$user'",null,false);
				$query=$this->db->get('userstb');
				if($query->num_rows()>0){
					$this->session->set_userdata('username',$user);
					return TRUE;
				}
				else{
					$this->form_validation->set_message('username_found', "Username does not exist!");
					return FALSE;
				}
			}
		)
		));
		if($this->form_validation->run()==FALSE){
			$this->load->view('login');
		}
		else{
			header('location:'.base_url('Login/userAuth'));
		}	
	}
	public function userAuth(){
		$this->form_validation->set_rules('password','Password',array(
			'required',
			array(
				'password_auth',
				function($pass){
					$result=0;
					$this->load->database();
					$isAdmin=($_SESSION['username']=="admin")?$pass:md5($pass);
					$this->db->where("BINARY username='" . $_SESSION['username'] . "'", null, false);
					$this->db->where('password',$isAdmin);
					$result=$this->db->count_all_results('userstb');
					if($result>0){
						$this->role=$this->UserModel->getRole($_SESSION['username']);
						$this->session->set_userdata('profilepic',$this->UserModel->getUserImage($_SESSION['username']));
						return TRUE;
					}	
					else{
						$this->form_validation->set_message('password_auth',"Incorrect Password!");
						return FALSE;
					}
				}
			)
		));
		if($this->form_validation->run()==TRUE && $this->role=="user"){
			header('location:'.base_url('Landing'));
		}
		else if($this->form_validation->run()==TRUE && $this->role=="admin"){
			header('location:'.base_url('Dashboard'));
		}
		else{
			$this->load->view('login');
		}
	}	
}
