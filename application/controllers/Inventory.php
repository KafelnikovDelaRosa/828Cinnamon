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
        $data['per_page']=6;
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
        $data['per_page']=6;
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
        $data['per_page']=6;
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
        $data['per_page']=6;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['inventory'] = $this->InventoryModel->filterLevel($level,$data['per_page'],$data['index']);
        $entry_length=count($data['inventory']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/inventory',$data);
    }
    public function addInventory(){
        $this->form_validation->set_rules('code','Material Code','required');
        $this->form_validation->set_rules('name','Material Name','required');
        $this->form_validation->set_rules('current_stocks','Current Stocks',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Current stocks cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            )
        ));
        $this->form_validation->set_rules('stock_treshold','Required Stocks',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Required stocks cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            ),
            array(
                'isHigherThanCurrent',
                function($requiredStock){
                    $currentStock=$this->input->post('current_stocks');
                    if($requiredStock>$currentStock){
                        $this->form_validation->set_message('isHigherThanCurrent','Required stocks cannot be higher than current stocks');
                        return FALSE;
                    }
                    return TRUE;
                }
            )
        ));
        $this->form_validation->set_rules('quantity','Material Quantity',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Quantity cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            )
        ));
        $this->form_validation->set_rules('unit','Material Unit','required');
        $this->form_validation->set_rules('cost','Material Price',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Cost cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            )
        ));
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
        $this->form_validation->set_rules('code','Material Code','required');
        $this->form_validation->set_rules('name','Material Name','required');
        $this->form_validation->set_rules('quantity','Material Quantity',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Quantity cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            )
        ));
        $this->form_validation->set_rules('unit','Material Unit','required');
        $this->form_validation->set_rules('cost','Material Price',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Cost cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            )
        ));
        if($this->form_validation->run()==FALSE){
            $data['inventory']=$this->InventoryModel->getItem($itemid);
            $this->load->view('admin/inventoryedit',$data);
        }
        else{
            $this->InventoryModel->updateInventory($itemid);
            $this->load->view('admin/inventoryeditsuccess');
        }
    }
}