<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model{
    public function addUser(){
        $this->load->database();
        $data=array(
            'email'=>$_POST['email'],
            'username'=>$_POST['username'],
            'password'=>md5($_POST['password-input']),
            'role'=>'user'
        );
        $this->db->insert('userstb',$data);
    }
    public function removeUser($id){
        $this->load->database();
        $data=array(
            'id'=>$id
        );
        $this->db->delete('userstb',$data);
    }
    public function getUsers($limit,$startingIndex){
        $this->load->database();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function sortUsers($category,$limit,$startingIndex){
        $this->load->database();
        $this->db->order_by($category,'ASC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function searchUsers($input,$limit,$startingIndex){
        $this->load->database();
        $this->db->group_start()
            ->like('id',$input,'both')
            ->or_like('email',$input,'both')
            ->or_like('phone',$input,'both')
            ->or_like('firstname',$input,'both')
            ->or_like('lastname',$input,'both')
            ->or_like('username',$input,'both')
        ->group_end();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function filterRoleCount($role){
        $this->load->database();
        $this->db->where('role',$role);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function filterRole($role,$limit,$startingIndex){
        $this->load->database();
        $this->db->where('role',$role);
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function updateUserInfo($username){
        $this->load->database();
        $data=array(
            'firstname'=>$_POST['firstname'],
            'lastname'=>$_POST['lastname'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'birthday'=>$_POST['birthdate']
        );
        $this->db->where('username',$username);
        $this->db->update('userstb',$data);
    }
    public function setUserPassword($username){
        $this->load->database();
        $data=array(
            'password'=>md5($_POST['newpassword'])
        );
        $this->db->where('username',$username);
        $this->db->update('userstb',$data);
    }
    public function getUsernames(){
        $this->load->database();
        $this->db->select('username');
        $query=$this->db->get('userstb');
        $result=array();
        foreach($query->result() as $row){
            array_push($result,$row->username);
        }
        return $result;
    }
    public function getUserEmails(){
        $this->load->database();
        $this->db->select('email');
        $query=$this->db->get('userstb');
        $result=array();
        foreach($query->result() as $row){
            array_push($result,$row->email);
        }
        return $result;
    }
    public function getUserSum(){
        $this->load->database();
        return $this->db->count_all('userstb');
    }
    public function getUserEmail($username){
        $this->load->database();
        $this->db->select('email');
        $this->db->where("username",$username);
        $query=$this->db->get('userstb');
        $result=" ";
        foreach($query->result() as $row){
            $result=$row->email;
        }
        return $result;
    }
    public function updateUserRole($id){
        $this->load->database();
        $data=array(
            'role'=>$_POST['role'],
        );
        $this->db->where('id',$id);
        $this->db->update('userstb',$data);
    }
    public function getRole($username){
        $this->load->database();
        $this->db->select('role');
        $this->db->where("username",$username);
        $query=$this->db->get('userstb');
        $result=" ";
        foreach($query->result() as $row){
            $result=$row->role;
        }
        return $result;
    }
    public function getUserImage($username){
        $this->load->database();
        $this->db->select('picture');
        $this->db->where("username",$username);
        $query=$this->db->get('userstb');
        $result=" ";
        foreach($query->result() as $row){
            $result=$row->picture;
        }
        return $result;
    }
    public function getUserById($id){
        $this->load->database();
        $this->db->where('id',$id);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function getUserInfo($username){
        $this->load->database();
        $this->db->where('username',$username);
        $query=$this->db->get('userstb');
        $result=$query->result();
        return $result;
    }
    public function updateUserPic($file,$username){
        $this->load->database();
        $data=array(
            'picture'=>$file
        );
        $this->db->where('username',$username);
        $this->db->update('userstb',$data);
    }
    public function setFirstName($username){
       $this->load->database();
       $data=array(
            'firstname'=>$_POST['firstname']
       );
       $this->db->where('username',$username);
       $this->db->update('userstb',$data); 
    }
    public function setLastName($username){
       $this->load->database();
       $data=array(
            'lastname'=>$_POST['lastname']
       );
       $this->db->where('username',$username);
       $this->db->update('userstb',$data);
    }
    public function setEmail($username){
       $this->load->database();
       $data=array(
            'email'=>$_POST['email']
       );
       $this->db->where('username',$username);
       $this->db->update('userstb',$data);
    }
    public function setPhoneNumber($username){
       $this->load->database();
       $data=array(
            'phone'=>$_POST['phone']
       );
       $this->db->where('username',$username);
       $this->db->update('userstb',$data);
    }
    public function setBirthDate($username){
       $this->load->database();
       $data=array(
            'birthday'=>$_POST['birthdate']
       );
       $this->db->where('username',$username);
       $this->db->update('userstb',$data);
    }
    public function updateUser(){
        $this->load->database();
        $data=array(
            'firstname'=>$_POST["firstname"],
            'lastname'=>$_POST["lastname"],
            'username'=>$_POST["username"],
            'email'=>$_POST["email"],
            'phone'=>$_POST["phone"],
            'birthday'=>$_POST["birthday"],
            'role'=>$_POST["role"]
        );
        $this->db->where('username',$_POST['username']);
        $this->db->update('userstb',$data);
    }
}