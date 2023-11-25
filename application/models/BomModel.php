<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BomModel extends CI_Model{
    public function createBOM(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'materials'=>$this->input->post('materials'),
            'cost'=>$this->input->post('total'),
            'bomcreated'=>date('Y-m-d',$currentManilaTime)
        );
        $this->db->insert('bomtb',$data);
    }
    public function getBOM(){
        $this->load->database();
        $query=$this->db->get('bomtb');
        $result=$query->result();
        return $result;
    }
    public function currentBomCount(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $date=date('Y-m-d',$currentManilaTime);
        $this->db->where('bomcreated',$date);
        $query=$this->db->get('bomtb');
        $count=$query->num_rows();
        return $count;
    }
    public function currentBomProcurement(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $date=date('Y-m-d',$currentManilaTime);
        $this->db->select('materials');
        $this->db->where('bomcreated',$date);
        $query=$this->db->get('bomtb');
        $result=$query->result();
        return $result;
    }
    public function getBomByDate($date){
        $this->load->database();
        $this->db->like('bomcreated');
        $query=$this->db->get('bomtb');
        $result=$query->result();
        return $result;
    }
}