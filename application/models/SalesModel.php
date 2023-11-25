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
}