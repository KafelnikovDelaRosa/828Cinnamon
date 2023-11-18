<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OrderModel extends CI_Model{
    public function addOrderUser(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'orders'=>$_POST['order'],
            'cost'=>$_POST['cost'],
            'ordercreated'=>date('Y-m-d H:i:s l',$currentManilaTime),
            'paymentmode'=>$_POST["deliveryMethod"],
            'orderstatus'=>'pending'
        );
        $this->db->insert('ordertb',$data);
    }
    public function getOrderSum(){
        $this->load->database();
        return $this->db->count_all('ordertb');
    }
    public function sortOrders($category,$limit,$startingIndex){
        $this->load->database();
        $this->db->order_by($category,'ASC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function searchOrders($input,$limit,$startingIndex){
        $this->load->database();
        $this->db->group_start()
            ->like('firstname',$input,'both')
            ->or_like('lastname',$input,'both')
            ->or_like('email',$input,'both')
            ->or_like('phone',$input,'both')
            ->or_like('address',$input,'both')
            ->or_like('referenceno',$input,'both')
        ->group_end();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function filterStatusCount($status){
        $this->load->database();
        $this->db->where('orderstatus',$status);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function filterStatus($status,$limit,$startingIndex){
        $this->load->database();
        $this->db->where('orderstatus',$status);
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getOrderSumCompleted(){
        $this->load->database();
        $this->db->where('orderstatus','completed');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getOrdersLimit($limit,$startingIndex){
        $this->load->database();
        $this->db->order_by('orderid','DESC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function addOrder(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'firstname'=>$_POST["firstname"],
            'lastname'=>$_POST["lastname"],
            'email'=>$_POST["email"],
            'phone'=>$_POST["phone"],
            'address'=>$_POST["address"],
            'orders'=>$_POST["order"],
            'cost'=>$_POST["cost"],
            'ordercreated'=>date('Y-m-d H:i:s l',$currentManilaTime),
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
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'orderstatus'=>'cancelled',
            'ordercompleted'=>date('Y-m-d H:i:s l',$currentManilaTime)
        );
        $this->db->where('orderid',$orderid);
        $this->db->update('ordertb',$data);
    }
    public function completeOrder($orderid){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'orderstatus'=>'completed',
            'ordercompleted'=>date('Y-m-d H:i:s l',$currentManilaTime)
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
    public function getOrderById($id,$email){
        $this->load->database();
        $this->db->where('orderid',$id);
        $this->db->where('email',$email);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getOrderByDate($from,$to,$email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->where('orderdate >=',$from);
        $this->db->where('orderdate <=',$to);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
}