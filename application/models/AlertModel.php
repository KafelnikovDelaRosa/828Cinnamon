<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AlertModel extends CI_Model{
    public function createAlert(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'itemlist'=>$this->input->post('restock'),
            'created_on'=>date('Y-m-d l',$currentManilaTime)
        );
        $this->db->insert('restocktb',$data);
    }
    public function mrpAlerts(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $this->db->like('created_on',date('Y-m-d',$currentManilaTime));
        $query=$this->db->get('restocktb');
        $result=$query->result();
        return $result;
    }
    public function getAllAlerts(){
        $this->load->database();
        $query=$this->db->get('restocktb');
        $result=$query->result();
        return $result;
    }
    public function getAlertByDate($date){
        $this->load->database();
        $this->db->like('created_on',$date);
        $query=$this->db->get('restocktb');
        $result=$query->result();
        return $result;
    }
    public function updateStatusComplete($date){
        $this->load->database();
        $data=array(
            'itemlist'=>$this->input->post('restocks')
        );
        $this->db->like('created_on',$date);
        $this->db->update('restocktb',$data);
    }
}