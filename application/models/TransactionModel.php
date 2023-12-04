<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TransactionModel extends CI_Model{
    public function restockLoss(){
        $this->load->database();
        $item=json_decode($this->input->post('restockCertain'),true);
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'transaction_created'=>date('Y-m-d H:i l',$currentManilaTime),
            'transaction_name'=>$item['required_stock'].'X '.$item['name'].' '.$item['quantity'].$item['unit'],
            'gain'=>0,
            'loss'=>$item['total'],
        );
        $this->db->insert('transactiontb',$data);
    }
    public function orderGain($order){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        foreach($order as $info){
            $data=array(
                'transaction_created'=>date('Y-m-d H:i l',$currentManilaTime),
                'transaction_name'=>'Order No. '.$info->orderid,
                'gain'=>$info->cost,
                'loss'=>0
            );
            $this->db->insert('transactiontb',$data);
        }
    }
    public function getTransactions(){
        $this->load->database();
        $query=$this->db->get('transactiontb');
        $result=$query->result();
        return $result;
    }
}