<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OrderModel extends CI_Model{
    public function updateOrderStatus(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'orderstatus'=>'started'
        );
        $this->db->like('ordercreated',date('Y-m-d',$currentManilaTime));
        $this->db->update('ordertb',$data);
    }
    public function addOrderUser(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $orderJson=$_POST['order'];
        $orderArray=json_decode($orderJson,true);
        $currentManilaTime=time();
        $data=array(
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'orders'=>$_POST['order'],
            'cost'=>$_POST['cost'],
            'ordercreated'=>date('Y-m-d H:i l',$currentManilaTime),
            'orderdue'=>date('Y-m-d l',strtotime($_POST['date'])),
            'paymentmode'=>$_POST["deliveryMethod"],
            'orderstatus'=>'pending'
        );
        $this->db->insert('ordertb',$data);
        $this->db->where('orderdate_group',$_POST['date']);
        $query=$this->db->get('orderlogtb');
        $result=$query->num_rows();
        $numofBox=0;
        foreach($orderArray as $order){
            $numofBox+=$order['stock'];
        }
        if($result==0){
            $data=array(
                'orderdate_group'=>$_POST['date'],
                'numofbox'=>$numofBox
            );
            $this->db->insert('orderlogtb',$data);
        }
        else{
            $this->db->set('numofbox','numofBox + '.$numofBox,FALSE);
            $this->db->where('orderdate_group',$_POST['date']);
            $this->db->update('orderlogtb');
        }
    }
    public function getScheduleSlot(){
        $this->load->database();
        $query=$this->db->get('orderlogtb');
        $result=$query->result();
        return $result;
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
        $this->db->order_by('orderid');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('ordertb',);
        $result=$query->result();
        return $result;
    }
    public function getOrderIdEmail(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $this->db->select('orderid');
        $this->db->select('email');
        $this->db->like('ordercreated',date('Y-m-d',$currentManilaTime));
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
    public function generateReferenceNo($id){
        $this->load->database();
        $referenceno=uniqid();
        $data=array(
            'referenceno'=>$referenceno
        );
        $this->db->where('orderid',$id);
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
            'ordercancelled'=>date('Y-m-d H:i:s l',$currentManilaTime)
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
    public function getCurrentOrders(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $this->db->like('ordercreated',date('Y-m-d',$currentManilaTime));
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getReceipt($id){
        $this->load->database();
        $this->db->where('orderid',$id);
        $query=$this->db->get('ordertb');
        $result=$query->result_array();
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
    public function getMrpOrdersByDate($date){
        $this->load->database();
        $this->db->like('ordercreated',$date);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getOrderByDate($from,$to,$email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->where('ordercreated >=',$from);
        $this->db->where('ordercreated <=',$to);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getMrpOrderEmailByDate($date){
        $this->load->database();
        $this->db->like('ordercreated',$date);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function readyMrpOrderStatusByDate($date){
        $this->load->database();
        $data=array(
            'orderstatus'=>'ready'
        );
        $this->db->like('ordercreated',$date);
        $this->db->update('ordertb',$data);
    }
    public function getTransactionOrderById($id){
        $this->load->database();
        $this->db->where('orderid',$id);
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
    public function getOrderTracks(){
        $this->load->database();
        $this->db->where('orderstatus','started');
        $this->db->or_where('orderstatus','ready');
        $query=$this->db->get('ordertb');
        $result=$query->result();
        return $result;
    }
}