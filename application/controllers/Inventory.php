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
	public function index($page)
	{ 
        $data['level']='all';
        $data['category']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['total_entries']=$this->InventoryModel->getNoItems();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['inventory'] = $this->InventoryModel->getInventory($data['per_page'],$data['index']);
		$this->load->view('admin/inventory',$data);
	}
    public function search($term,$page){
        $data['category']='all';
        $data['level']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['inventory'] = $this->InventoryModel->searchEntry($term,$data['per_page'],$data['index']);
        $entry_length=count($data['inventory']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/inventory',$data);
    }
    public function sortBy($category,$page){
        $data['category']=$category;
        $data['level']='all';
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['total_entries']=$this->InventoryModel->getNoItems();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['inventory'] = $this->InventoryModel->sortInventory($category,$data['per_page'],$data['index']);
		$this->load->view('admin/inventory',$data);
    }
    public function levelFilter($level,$page){
        $data['category']='all';
        $data['level']=$level;
        $data['cur_page']=$page;
        $data['per_page']=8;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['inventory'] = $this->InventoryModel->filterLevel($level,$data['per_page'],$data['index']);
        $entry_length=count($data['inventory']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/inventory',$data);
    }
    public function addInventory(){
        $this->form_validation->set_rules('name','Item Name','required');
        $this->form_validation->set_rules('quantity','Item Quantity','required');
        $this->form_validation->set_rules('unit','Item Unit','required');
        $this->form_validation->set_rules('price','Item Price','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/inventoryadd');
        }
        else{
            $this->InventoryModel->addItem();
            $this->load->view('admin/inventoryaddsuccess');
        }
    }
    public function removeInventory($itemid){
        $this->InventoryModel->removeItem($itemid);
        $this->load->view('admin/inventoryremovesuccess');
    }
    public function editItem($itemid){
        $this->form_validation->set_rules('name','Item Name','required');
        $this->form_validation->set_rules('quantity','Item Quantity','required');
        $this->form_validation->set_rules('unit','Item Unit','required');
        $this->form_validation->set_rules('price','Item Price','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/inventoryedit',$data);
        }
        else{
            $this->InventoryModel->updateInventory();
            $this->load->view('admin/inventoryeditsuccess');
        }
    }
}