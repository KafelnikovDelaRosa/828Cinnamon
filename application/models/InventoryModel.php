<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InventoryModel extends CI_Model{
    public function addItem(){
       $this->load->database();
       $itemNameInput=$_POST["name"];
       $itemCode="";
       $minQuantity=0;
       $itemStatus="";
       $this->db->where('name',$itemNameInput);
       $query=$this->db->get('recipetb');
       $result=$query->result();
       foreach($result as $row){
            $itemCode=$row->code;
            $minQuantity=$row->quantity;
       }
       if($_POST["quantity"]>$minQuantity){
            $itemStatus="high";
       }
       else{
            $itemStatus="low";
       }
       $data=array(
            'itemname'=>$itemNameInput,
            'itemcode'=>$itemCode,
            'minquantity'=>$minQuantity,
            'quantity'=>$_POST["quantity"],
            'unit'=>$_POST["unit"],
            'cost'=>$_POST["price"],
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
    public function updateInventory(){
        $this->load->database();
        $itemCode=$_POST["code"];
        $minQuantity=0;
        $itemStatus="";
        $this->db->where("code",$itemCode);
        $query=$this->db->get('recipetb');
        $result=$query->result();
        foreach($result as $row){
            $itemCode=$row->code;
            $minQuantity=$row->quantity;
        }
        if($_POST["quantity"]>$minQuantity){
                $itemStatus="high";
        }
        else{
                $itemStatus="low";
        }
        $data=array(
            'itemname'=>$_POST["name"],
            'quantity'=>$_POST["quantity"],
            'unit'=>$_POST["unit"],
            'cost'=>$_POST["price"],
            'itemlevel'=>$itemStatus
        );
        $this->db->where('itemcode',$itemCode);
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