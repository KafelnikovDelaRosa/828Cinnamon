<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('OrderModel');
    } 
	public function index($page)
	{
    $data['status']='all';
    $data['category']='all';
    $data['cur_page']=$page;
    $data['per_page']=6;
    $data['total_entries']=$this->OrderModel->getOrderSum();
    $data['last_entries']=$data['per_page']*$page;
    $data['index']=$data['last_entries']-$data['per_page'];   
    $data['entries'] = $this->OrderModel->getOrdersLimit($data['per_page'],$data['index']);
		$this->load->view('admin/order',$data);
	}
  public function sortBy($category,$page){
    $data['category']=$category;
    $data['status']='all';
    $data['cur_page']=$page;
    $data['per_page']=6;
    $data['total_entries']=$this->OrderModel->getOrderSum();
    $data['last_entries']=$data['per_page']*$page;
    $data['index']=$data['last_entries']-$data['per_page'];   
    $data['entries'] = $this->OrderModel->sortOrders($category,$data['per_page'],$data['index']);
    $this->load->view('admin/order',$data);
  }
  public function search($term,$page){
    $data['category']='all';
    $data['status']='all';
    $data['cur_page']=$page;
    $data['per_page']=6;
    $data['last_entries']=$data['per_page']*$page;
    $data['index']=$data['last_entries']-$data['per_page'];   
    $data['entries'] = $this->OrderModel->searchOrders($term,$data['per_page'],$data['index']);
    $entry_length=count($data['entries']);
    $data['total_entries']=$entry_length;
    $this->load->view('admin/order',$data);
  }
  public function statusFilter($status,$page){
      $data['category']='all';
      $data['status']=$status;
      $data['cur_page']=$page;
      $data['per_page']=8;
      $data['total_entries']=count($this->OrderModel->filterStatusCount($status));
      $data['last_entries']=$data['per_page']*$page;  
      $data['index']=$data['last_entries']-$data['per_page']; 
      $data['entries'] = $this->OrderModel->filterStatus($status,$data['per_page'],$data['index']);
      $this->load->view('admin/order',$data);
  }
  public function cancelOrder($orderid){
    $this->OrderModel->cancelOrder($orderid);
    $data['title']='Orders';
    $data['message']="Order no $id cancelled!";
    $data['root_url']='order';
    $data['return']='Return to orders';
    $this->load->view('admin/crudsuccess',$data);
  }
  public function searchOrder(){
    $result=$this->input->post("receiptno");
    if(empty($result)){
      header('location:'.base_url('Orders'));
    }
    else{
      $data['orders']=$this->OrderModel->getOrderByReceipts($this->input->post("referenceno"));
      $this->load->view('order',$data);
    }
  }
  public function readReceipt($id){
    $data['orders']=$this->OrderModel->getReceipt($id);
    $this->load->view('admin/orderread',$data);
  }
  public function completeOrder($id){
    $this->OrderModel->completeOrder($id);
    $data['title']='Orders';
    $data['message']="Order no $id completed!";
    $data['root_url']='order';
    $data['return']='Return to orders';
    $this->load->view('admin/crudsuccess',$data);
  }
}