<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('InventoryModel');
    } 
	public function index()
	{ 
        $data['inventory'] = $this->InventoryModel->getInventory();
		$this->load->view('inventory',$data);
	}
    public function addInventory(){
        $this->form_validation->set_rules('name','Item Name','required');
        $this->form_validation->set_rules('quantity','Item Quantity','required');
        $this->form_validation->set_rules('unit','Item Unit','required');
        $this->form_validation->set_rules('price','Item Price','required');
        if($this->form_validation->run()==FALSE){
            $data['inventory']=$this->InventoryModel->getInventory();
            $this->load->view('inventory',$data);
        }
        else{
            $this->InventoryModel->addItem();
            header('location:'.base_url('Inventory'));
        }
    }
    public function removeInventory($itemid){
        $this->InventoryModel->removeItem($itemid);
        header('location:'.base_url('Inventory'));
    }
    public function editItem(){
        $this->form_validation->set_rules('name','Item Name','required');
        $this->form_validation->set_rules('quantity','Item Quantity','required');
        $this->form_validation->set_rules('unit','Item Unit','required');
        $this->form_validation->set_rules('price','Item Price','required');
        if($this->form_validation->run()==FALSE){
            $data['inventory']=$this->InventoryModel->getInventory();
            $this->load->view('inventory',$data);
        }
        else{
            $this->InventoryModel->updateInventory();
            header('location:'.base_url('Inventory'));
        }
    }
}