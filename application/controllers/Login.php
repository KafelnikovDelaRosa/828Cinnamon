<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('UserModel');
    }
    public function index(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()==TRUE){
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$this->load->database();
			$this->db->select('username, role, password');
			$this->db->from('userstb');
			$this->db->where('username',$username);
			$query=$this->db->get();
			if($query->num_rows()>0){
				$user=$query->row_array();
				$this->loginHandler($username,$password,$user);
			}
			else{
				$this->session->set_flashdata('login_err','Invalid username or password');
				$this->load->view('auth/login');
			}
		}
		else{
			$this->session->set_flashdata('login_err');
			$this->load->view('auth/login');
		}
	}
	public function loginHandler($usr,$pass,$auth){
		if($auth['role']=='admin'&& $auth['username']==$usr && $auth['password']==$pass){
			$this->session->set_userdata('useradmin',$usr);	
			redirect('dashboard','location');
		}
		if($auth['role']=='user' && $auth['username']==$usr && $auth['password']==$pass){
			$avatar=$this->UserModel->getUserImage($usr);
			$this->session->set_userdata('username',$usr);
			$this->session->set_userdata('profilepic',$avatar);
			redirect('landing','location');
		}
	}
}
