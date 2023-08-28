<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ProductModel');
    } 
	public function index()
	{ 
        $data['products']=$this->ProductModel->getProducts();
		$this->load->view('products',$data);
	}
    public function removeProduct($product_id){
        $this->ProductModel->removeProduct($product_id);
        header('location:'.base_url('Products'));
    }
    public function addProduct(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->form_validation->set_rules('productname','Product Name','required');
        $this->form_validation->set_rules('description','Product Description','required');
        $this->form_validation->set_rules('productcost','Product Cost','required|numeric');
        $this->load->library('upload',$config);
        if($this->form_validation->run()==TRUE&&$this->upload->do_upload("filename")){
            $name_file=$_FILES['filename']['name'];
            $this->ProductModel->addProduct($name_file);
            header('location:'.base_url('Products'));
        }
        else{
            $data['products']=$this->ProductModel->getProducts();
            $data['file_err']=$this->upload->display_errors();
            $this->load->view('products',$data);
        }
    }
    public function editProduct(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->form_validation->set_rules('productname','Product Name','required');
        $this->form_validation->set_rules('description','Product Description','required');
        $this->form_validation->set_rules('productcost','Product Cost','required|numeric');
        $this->form_validation->set_rules('productstatus','Product Cost','required');
        $this->load->library('upload',$config);
        if(!empty($_FILES['filename']['name'])){
            if($this->form_validation->run()==TRUE&&$this->upload->do_upload("filename")){
                $name_file=$_FILES['filename']['name'];
                $this->ProductModel->updateProduct($name_file);
                header('location:'.base_url('Products'));
            }
            else{
                $data['products']=$this->ProductModel->getProducts();
                $data['file_err']=$this->upload->display_errors();
                $this->load->view('products',$data);
            }
        }
        else{
            if($this->form_validation->run()==TRUE){
                $name_file=$this->ProductModel->getImageFile($this->input->post("productid"));
                $this->ProductModel->updateProduct($name_file);
                header('location:'.base_url('Products'));
            }
            else{
                $data['products']=$this->ProductModel->getProducts();
                $data['file_err']=$this->upload->display_errors();
                $this->load->view('products',$data);
            }
        }
    } 
}