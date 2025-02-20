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
            'requirestock'=>$_POST['required_stocks'],
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
    public function filterLevelCount($level){
        $this->load->database();
        $this->db->where('itemlevel',$level);
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
    public function getRequiredInventory(){
        $this->load->database();
        $query=$this->db->get('inventorytb');
        $result=$query->result();
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
            'stock'=>$_POST['current_stocks'],
            'minstock'=>$_POST['stock_treshold'],
            'requirestock'=>$_POST['require_stocks'],
            'quantity'=>$_POST['quantity'],
            'unit'=>$_POST['unit'],
            'cost'=>$_POST['cost'],
            'itemlevel'=>($_POST['current_stocks'] <= $_POST['stock_treshold'])?'low':'high'
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
    public function restock(){
        $this->load->database();
        $item=json_decode($this->input->post('restockCertain'),true);
        $this->db->set('stock','stock + '.$item['required_stock'],FALSE);
        $this->db->set('itemlevel','high');
        $this->db->where('itemcode',$item['code']);
        $this->db->update('inventorytb');
    }
    public function takeStock(){
        $this->load->database();
        $item=json_decode($this->input->post('takestock'),true);
        $this->db->set('stock','stock - '.$item['required_stock'],FALSE);
        $this->db->where('itemcode',$item['code']);
        $this->db->update('inventorytb');
    }
    public function getInventoryLow(){
        $this->load->database();
        $this->db->where('itemlevel','low');
        $query=$this->db->get('inventorytb');
        $result=$query->result();
        return $result;
    }
}