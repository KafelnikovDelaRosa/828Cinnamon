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
    } 
	public function index()
	{ 
        $this->session->unset_userdata('givenRolls');
        $this->session->unset_userdata('givenDates');
        $this->session->unset_userdata('expectedSales');
        $this->session->unset_userdata('compliance');
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
                    'cost'=>$item['price'],
                ));
            }
        }
        foreach($rolls as &$roll){
            $quantity=$this->ProductModel->getQuantity($roll['id']);
            $roll['stock']*=$quantity;
            $totalRolls+=$roll['stock'];
            $expectedSales+=$roll['cost'];
        }
        $data['total']=$totalRolls;
        $this->form_validation->set_rules('from','From date','required');
        $this->form_validation->set_rules('to','To date','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/mrpgiven',$data);
        }
        else{
            $this->session->set_userdata('givenRolls',$this->input->post('total'));
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
            redirect('mrp/requirements');
        }
    }
    public function requirements(){
        $this->load->view('admin/mrprequirements');
    }
}