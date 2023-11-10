<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile extends CI_Controller {
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
        $data['infos']=$this->UserModel->getUserInfo($_SESSION['username']);
		$this->load->view('user/editprofile',$data);
	}
    public function updateAccount(){
        $phone=$this->input->post('phone',TRUE);
        $this->form_validation->set_rules('firstname','Firstname','required');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('phone','Phone Number','required|numeric');
        $this->form_validation->set_rules('birthdate','Birthdate','required');
        if($this->form_validation->run()==FALSE){
            $data['infos']=$this->UserModel->getUserInfo($_SESSION['username']);
            $this->load->view('user/editprofile',$data); 
        }
        else{
            $this->UserModel->updateUserInfo($_SESSION['username']);
            $this->load->view('user/accountupdated');
        }
    }
    public function updatePassword(){
        $this->form_validation->set_rules('password','Password',array(
			'required',
			array(
				'password_auth',
				function($pass){
					$this->load->database();
                    $this->db->select('password');
                    $this->db->from('userstb');
                    $this->db->where('username',$_SESSION['username']);
                    $query=$this->db->get();
                    if($query->num_rows()>0){
                        $result=$query->row_array();
                        if($result['password']==md5($pass)){
                            return TRUE;
                        }
                        else{
                            $this->form_validation->set_message('password_auth','Incorrect password!');
                            return FALSE;
                        }
                    }
                    else{
                        $this->form_validation->set_message('password_auth','Incorrect password!');
                        return FALSE;
                    }
				}
			)
		));
        $this->form_validation->set_rules('newpassword','New Password','required|min_length[8]');
        $this->form_validation->set_rules('confpassword','Confirm Password','required|min_length[8]|matches[newpassword]');
        if($this->form_validation->run()==FALSE){
            $data['infos']=$this->UserModel->getUserInfo($_SESSION['username']);
            $this->load->view('user/editprofile',$data);
        }
        else{
            $this->UserModel->setUserPassword($_SESSION['username']);
            $this->load->view('user/accountupdated');
        }
    }
    public function updateProfilePic(){
        $config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload("filename")) {
				$name_file = $_FILES['filename']['name'];
				$this->UserModel->updateUserPic($name_file,$_SESSION['username']);
                $_SESSION['profilepic']=$this->UserModel->getUserImage($_SESSION['username']);
                $this->load->view('user/accountupdated');
			}
			else {
                $data['infos']=$this->UserModel->getUserInfo($_SESSION['username']);
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('user/editprofile',$data,$error);
			}
    }
   
}