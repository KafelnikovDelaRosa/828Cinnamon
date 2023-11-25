<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ScheduleModel extends CI_Model{
    public function createSchedule(){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'created_at'=>date('Y-m-d H:i l',$currentManilaTime),
            'procedure_list'=>$this->input->post('schedules')
        );
        $this->db->insert('scheduletb',$data);
    }
    public function getSchedulesByDate($date){
        $this->load->database();
        $this->db->like('created_at',$date);
        $query=$this->db->get('scheduletb');
        $result=$query->result();
        return $result;
    }
}