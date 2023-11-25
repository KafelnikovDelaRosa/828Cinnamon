<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MRPModel extends CI_Model{
    public function createMRP(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'mrp_created'=>date('Y-m-d H:i l',$currentManilaTime),
            'mrp_due'=>$_SESSION['expectedCompliance'],
            'starting_deployment'=>$_SESSION['givenDates'][0],
            'ending_deployment'=>$_SESSION['givenDates'][1],
            'required_rolls'=>$_SESSION['givenRolls']
        );
        $this->db->insert('mrptb',$data);
    }
    public function getMRP(){
        $this->load->database();
        $query=$this->db->get('mrptb');
        $result=$query->result();
        return $result;
    }
    public function getMrpByDate($date){
        $this->load->database();
        $this->db->like('mrp_created',$date);
        $query=$this->db->get('mrptb');
        $result=$query->result();
        return $result;
    }
}