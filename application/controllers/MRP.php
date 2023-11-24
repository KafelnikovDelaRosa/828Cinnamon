<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRP extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
        $this->load->model('ProductModel');
        $this->load->model('InventoryModel');
        $this->load->model("RecipeModel");
        $this->load->model("BomModel");
    } 
	public function index()
	{ 
        $this->session->unset_userdata('givenRolls');
        $this->session->unset_userdata('givenDates');
        $this->session->unset_userdata('expectedSales');
        $this->session->unset_userdata('expectedCompliance');
        $data['has_order']=$this->OrderModel->getCurrentOrders();
		$this->load->view('admin/mrp',$data);
	}
    public function given(){
        $orders=$this->OrderModel->getCurrentOrders();
        $rolls=array();
        $totalRolls=0;
        $expectedSales=0;
        foreach($orders as $order){
            $order_jsondecoded=json_decode($order->orders,true);
            foreach($order_jsondecoded as $item){
                array_push($rolls,array(
                    'id'=>$item['id'],
                    'stock'=>$item['stock'],
                ));
            }
            $expectedSales+=$order->cost;
        }
        foreach($rolls as &$roll){
            $quantity=$this->ProductModel->getQuantity($roll['id']);
            $roll['stock']*=$quantity;
            $totalRolls+=$roll['stock'];
        }
        $data['total']=$totalRolls;
        $this->form_validation->set_rules('from','From date','required');
        $this->form_validation->set_rules('to','To date','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/mrpgiven',$data);
        }
        else{
            $this->session->set_userdata('givenRolls',$totalRolls);
            $this->session->set_userdata('expectedSales',$expectedSales);
            $this->session->set_userdata('givenDates',array($this->input->post('from'),$this->input->post('to')));
            redirect('mrp/expected','location');
        }
    }
    public function expected(){
        $this->form_validation->set_rules('compliance','Compliance','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/mrpexpected');
        }
        else{
            $this->session->set_userdata('expectedCompliance',$this->input->post('compliance'));
            redirect('mrp/requirements','location');
        }
    }
    public function requirements(){
        $data['inventories']=$this->InventoryModel->getRequiredInventory();
        $data['recipes']=$this->RecipeModel->getRecipe();
        $data['hasBOM']=$this->BomModel->currentBomCount();
        $this->form_validation->set_rules('materials','Materials','required');
        $this->form_validation->set_rules('total','Total','required');
        $this->load->view('admin/mrprequirements',$data);
    }
    public function createBOM(){
        $this->BomModel->createBOM();
        redirect('mrp/schedule','location');
    }
    public function schedule(){
        $data['orderScheds']=$this->OrderModel->getCurrentOrders();
        $data['materialScheds']=$this->BomModel->currentBomProcurement();
        $this->load->view('admin/mrpschedule',$data);
    }
    public function createMRP(){
        $data['title']='MRP';
        $data['message']='MRP successfully set for today!';
        $data['root_url']='mrp';
        $data['return']='Return to mrp';
        $this->load->view('admin/crudsuccess',$data);
    }
}