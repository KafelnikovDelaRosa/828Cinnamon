<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OrderModel extends CI_Model{
    public function addOrderUser(){
        $this->load->database();
        $receiptid=uniqid();
        $receiptid=substr($receiptid,0,9);
        date_default_timezone_set('Asia/Manila');
        $data=array(
            'receiptno'=>$receiptid,
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'orders'=>$_POST['order'],
            'cost'=>$_POST['cost'],
            'orderdate'=>date('Y-m-d'),
            'ordertime'=>date('H:i'),
            'paymentmode'=>$_POST["deliveryMethod"],
            'orderstatus'=>'pending'
        );
        $this->db->insert('ordertb',$data);
    }
    public function getOrderSum(){
        $this->load->database();
        return $this->db->count_all('ordertb');
    }
    public function getOrderSumCompleted(){
        $this->load->database();
        $this->db->where('orderstatus','completed');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function addOrder(){
       $this->load->database();
       $receiptid=uniqid();
       $receiptid=substr($receiptid,0,9);
       date_default_timezone_set('Asia/Manila');
       $data=array(
            'receiptno'=>$receiptid,
            'firstname'=>$_POST["firstname"],
            'lastname'=>$_POST["lastname"],
            'email'=>$_POST["email"],
            'phone'=>$_POST["phone"],
            'address'=>$_POST["address"],
            'orders'=>$_POST["order"],
            'cost'=>$_POST["cost"],
            'orderdate'=>date('Y-m-d'),
            'ordertime'=>date('H:i'),
            'paymentmode'=>$_POST["deliveryMethod"],
            'orderstatus'=>'pending'
       ); 
       $this->db->insert('ordertb',$data);
    }
    public function generateReferenceNo($receiptid){
       $this->load->database();
       $referenceno=uniqid();
       $data=array(
            'referenceno'=>$referenceno
       );
       $this->db->where('receiptno',$receiptid);
       $this->db->update('ordertb',$data);
    }
    public function getOrderByReceipts($receiptid){
        $this->load->database();
        $this->db->where('receiptno',$receiptid);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function cancelOrder($orderid){
        $this->load->database();
        $data=array(
            'orderstatus'=>'cancelled'
        );
        $this->db->where('orderid',$orderid);
        $this->db->update('ordertb',$data);
    }
    public function completeOrder($orderid){
        $this->load->database();
        $data=array(
            'orderstatus'=>'completed'
        );
        $this->db->where('orderid',$orderid);
        $this->db->update('ordertb',$data);
    }
    public function getOrders(){
        $this->load->database();
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getUserOrder($email){
        $this->load->database();
        $this->db->where('email',$email);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getUserOrderByPending($email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->where('orderstatus','pending');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getUserOrderByCompleted($email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->where('orderstatus','completed');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;

    }
    public function getUserOrderByCancelled($email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->where('orderstatus','cancelled');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
}