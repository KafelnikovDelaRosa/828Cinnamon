<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InventoryModel extends CI_Model{
    public function addItem(){
        $this->load->database();
        $itemStatus=($_POST['current_stocks']>$_POST['stock_treshold'])?'High':'Low';  
        $data=array(
            'itemcode'=>$_POST['code'],
            'itemname'=>$_POST['name'],
            'stock'=>$_POST['current_stocks'],
            'minstock'=>$_POST['stock_treshold'],
            'quantity'=>$_POST['quantity'],
            'unit'=>$_POST["unit"],
            'cost'=>$_POST["cost"],
            'itemlevel'=>$itemStatus
        ); 
        $this->db->insert('inventorytb',$data);
    }
    public function searchEntry($input,$limit,$startingIndex){
        $this->load->database();
        $this->db->group_start()
            ->like('itemid',$input,'both')
            ->or_like('itemcode',$input,'both')
            ->or_like('itemname',$input,'both')
        ->group_end();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('inventorytb');
        $result=$query->result();
        return $result;
    }
    public function sortInventory($category,$limit,$startingIndex){
        $this->load->database();
        $this->db->order_by($category,'ASC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('inventorytb');
        $result=$query->result();
        return $result;
    }
    public function filterLevel($level,$limit,$startingIndex){
        $this->load->database();
        $this->db->where('itemlevel',$level);
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('inventorytb');
        $result=$query->result();
        return $result;
    }
    public function getNoItems(){
        $this->load->database();
        $result=$this->db->count_all_results('inventorytb');
        return $result;
    }
    public function getInventory($limit,$startingIndex){
        $this->load->database();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('inventorytb');
        $result=$query->result();
        return $result;
    }
    public function getItem($id){
        $this->load->database();
        $this->db->where('itemid',$id);
        $query=$this->db->get('inventorytb');
        $result=$query->result(); 
        return $result;
    }
    public function updateInventory($id){
        $this->load->database();
        $data=array(
            'itemcode'=>$_POST['code'],
            'itemname'=>$_POST['name'],
            'quantity'=>$_POST['quantity'],
            'unit'=>$_POST["unit"],
            'cost'=>$_POST["cost"]
        );
        $this->db->where('itemid',$id);
        $this->db->update('inventorytb',$data);
    }
    public function removeItem($itemid){
        $this->load->database();
        $data=array(
            'itemid'=>$itemid,
        );
        $this->db->delete('inventorytb',$data);
    }
}