<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SalesModel extends CI_Model{
    public function startSales(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'sale_created'=>date('Y-m-d l',$currentManilaTime),
            'expected_sales'=>$_SESSION['expectedSales'],
            'current_sales'=>0
        );
        $this->db->insert('salestb',$data);
    }
    public function getSalesByDate($date){
        $this->load->database();
        $this->db->like('sale_created',$date);
        $query=$this->db->get('salestb');
        $result=$query->result();
        return $result;
    }
    public function getSales(){
        $this->load->database();
        $query=$this->db->get('salestb');
        $result=$query->result();
        return $result;
    }
    public function updateSalesOnDate($order,$date){
        $this->load->database();
        foreach($order as $info){
            $this->db->set('current_sales','current_sales + '.$info->cost,FALSE);
            $this->db->like('sale_created',$date);
            $this->db->update('salestb');
        }
    }
}