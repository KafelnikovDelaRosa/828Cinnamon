<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BomModel extends CI_Model{
    public function createBOM(){
        $this->load->database();
        $materials=json_decode($this->input->post("materials"));
        $bomNo=$this->db->count_all_results('bomtb');
        $bomCode=$this->input->post("bomcode").$bomNo+1;
        $cost=$this->input->post("cost");
        $code=array();
        $quantity=array();
        //populate the arrays with the updated quantity
        for($i=0;$i<14;$i++){
            array_push($code,$materials->code[$i]);
            array_push($quantity,$materials->quantity[$i]);
        }
        //update inventory quantity
        for($i=0;$i<14;$i++){
            $data=array(
                'quantity'=>$quantity[$i]
            );
            $this->db->where('itemcode',$code[$i]);
            $this->db->update('inventorytb',$data);
        }
        //make the bill of materials
        $data=array(
            'code'=>$bomCode,
            'materials'=>json_encode($materials),
            'cost'=>$cost
        );
        $this->db->insert('bomtb',$data);
    }
    public function getBOM(){
        $this->load->database();
        $query=$this->db->get('bomtb');
        $result=$query->result();
        return $result;
    }
}