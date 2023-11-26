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
        $this->load->model('RecipeModel');
        $this->load->model('BomModel');
        $this->load->model('MRPModel');
        $this->load->model('ScheduleModel');
        $this->load->model('NotificationModel');
        $this->load->model('TransactionModel');
        $this->load->model('SalesModel');
        $this->load->model('AlertModel');
    } 
	public function index()
	{ 
        $this->session->unset_userdata('givenRolls');
        $this->session->unset_userdata('givenDates');
        $this->session->unset_userdata('expectedSales');
        $this->session->unset_userdata('expectedCompliance');
        $data['has_order']=$this->OrderModel->getCurrentOrders();
        $data['mrp']=$this->MRPModel->getMRP();
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
        if(!empty($this->input->post('restock'))){
            $this->AlertModel->createAlert();
            $this->BomModel->createBOM();
        }
        else{
            $this->BomModel->createBOM(); 
        }
        redirect('mrp/schedule','location');
    }
    public function schedule(){
        $data['orderScheds']=$this->OrderModel->getCurrentOrders();
        $data['materialScheds']=$this->BomModel->currentBomProcurement();
        $data['restockScheds']=$this->AlertModel->mrpAlerts();
        $this->load->view('admin/mrpschedule',$data);
    }
    public function createMRP(){
        $orderIdEmail=$this->OrderModel->getOrderIdEmail();
        $this->OrderModel->updateOrderStatus();
        $this->MRPModel->createMRP();
        $this->SalesModel->startSales();
        $this->ScheduleModel->createSchedule();
        foreach($orderIdEmail as $entry){
            $this->NotificationModel->notifyUser($entry->email,$entry->orderid);
        }
        $data['title']='MRP';
        $data['message']='MRP successfully set for today!';
        $data['root_url']='mrp';
        $data['return']='Return to mrp';
        $this->load->view('admin/crudsuccess',$data);
    }
    public function viewMRP($date){
        $data['date']=$date;
        $data['mrp']=$this->MRPModel->getMrpByDate($date);
        $data['sales']=$this->SalesModel->getSalesByDate($date);
        $data['recipes']=$this->RecipeModel->getRecipe();
        $data['inventories']=$this->InventoryModel->getRequiredInventory();
        $data['bomessentials']=$this->BomModel->getBomByDate($date);
        $data['restockScheds']=$this->AlertModel->getAlertByDate($date);
        $data['schedules']=$this->ScheduleModel->getSchedulesByDate($date);
        $data['orderScheds']=$this->OrderModel->getMrpOrdersByDate($date);
        $this->load->view('admin/mrpview',$data);
    }
    public function restock($date){
        $this->TransactionModel->restockLoss();
        $this->InventoryModel->restock();
        $this->AlertModel->updateStatusComplete($date);
        redirect('mrp/view/date/'.$date,'location');
    }
    public function bomComplete($date){
        $this->InventoryModel->takeStock();
        $this->BomModel->updateBom($date);
        redirect('mrp/view/date/'.$date,'location');   
    }
    public function completeProduction($date){
        $this->ScheduleModel->updateStatus($date);
        redirect('mrp/view/date/'.$date,'location'); 
    }
    public function notifyReady($date){
        $orderIdEmails=$this->OrderModel->getMrpOrderEmailByDate($date);
        foreach($orderIdEmails as $entry){
            $this->NotificationModel->notifyProductReady($entry->email,$entry->orderid);
        }
        $this->OrderModel->readyMrpOrderStatusByDate($date);
        $this->ScheduleModel->updateStatusLast($date);
        redirect('mrp/view/date/'.$date,'location');
    }
    public function completeOrder($id,$date){
        $orderById=$this->OrderModel->getTransactionOrderById($id);
        $this->TransactionModel->orderGain($orderById);
        $this->SalesModel->updateSalesOnDate($orderById,$date);
        $this->OrderModel->completeOrder($id);
        redirect('mrp/view/date/'.$date,'location');
    }
}