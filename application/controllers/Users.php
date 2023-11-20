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
	public function index($page)
	{ 
        $data['role']='all';
        $data['category']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['total_entries']=$this->UserModel->getUserSum();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->UserModel->getUsers($data['per_page'],$data['index']);
		$this->load->view('admin/users',$data);
	}
    public function sortBy($category,$page){
        $data['category']=$category;
        $data['role']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['total_entries']=$this->UserModel->getUserSum();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->UserModel->sortUsers($category,$data['per_page'],$data['index']);
		$this->load->view('admin/users',$data);
    }
    public function search($term,$page){
        $data['category']='all';
        $data['role']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->UserModel->searchUsers($term,$data['per_page'],$data['index']);
        $entry_length=count($data['entries']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/users',$data);
    }
    public function roleFilter($role,$page){
        $data['category']='all';
        $data['role']=$role;
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['total_entries']=count($this->UserModel->filterRoleCount($role));
        $data['last_entries']=$data['per_page']*$page;  
        $data['index']=$data['last_entries']-$data['per_page']; 
        $data['entries'] = $this->UserModel->filterRole($role,$data['per_page'],$data['index']);
		$this->load->view('admin/users',$data);
    }
    public function editUser($id){
        $this->form_validation->set_rules('role','Role','required');
        if($this->form_validation->run()==FALSE){
            $data['user']=$this->UserModel->getUserById($id);
            $this->load->view('admin/usersedit',$data);
        }
        else{
            $this->UserModel->updateUserRole($id);
            $data['title']='Users';
            $data['message']='User role updated!';
            $data['root_url']='users';
            $data['return']='Return to users';
            $this->load->view('admin/crudsuccess',$data);
        }
    }
    public function removeUser($id){
        $this->UserModel->removeUser($id);
        $data['title']='Users';
        $data['message']='User entry deleted!';
        $data['root_url']='users';
        $data['return']='Return to users';
        $this->load->view('admin/crudsuccess',$data);
    }
}