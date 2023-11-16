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
	public function index($page)
	{ 
        $data['status']='all';
        $data['category']='all';
        $data['cur_page']=$page;
        $data['per_page']=3;
        $data['total_entries']=$this->ProductModel->getNoProducts();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ProductModel->getProductsLimit($data['per_page'],$data['index']);
		$this->load->view('admin/products',$data);
	}
    public function sortBy($category,$page){
        $data['category']=$category;
        $data['status']='all';
        $data['cur_page']=$page;
        $data['per_page']=3;
        $data['total_entries']=$this->ProductModel->getNoProducts();
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ProductModel->sortProducts($category,$data['per_page'],$data['index']);
		$this->load->view('admin/products',$data);
    }
    public function search($term,$page){
        $data['category']='all';
        $data['status']='all';
        $data['cur_page']=$page;
        $data['per_page']=3;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ProductModel->searchProducts($term,$data['per_page'],$data['index']);
        $entry_length=count($data['entries']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/products',$data);
    }
    public function statusFilter($status,$page){
        $data['category']='all';
        $data['status']=$status;
        $data['cur_page']=$page;
        $data['per_page']=3;
        $data['last_entries']=$data['per_page']*$page;
        $data['index']=$data['last_entries']-$data['per_page'];   
        $data['entries'] = $this->ProductModel->filterStatus($status,$data['per_page'],$data['index']);
        $entry_length=count($data['entries']);
        $data['total_entries']=$entry_length;
		$this->load->view('admin/products',$data);
    }
    public function removeProduct($product_id){
        $this->ProductModel->removeProduct($product_id);
        $data['title']='Products';
        $data['message']='Product entry deleted!';
        $data['root_url']='products';
        $data['return']='Return to products';
        $this->load->view('admin/crudsuccess',$data);
    }
    public function addProduct(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->form_validation->set_rules('name','Product Name','required');
        $this->form_validation->set_rules('description','Product Description','required');
        $this->form_validation->set_rules('quantity','Product Quantity',array(
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
            ),
        ));
        $this->form_validation->set_rules('cost','Product Cost',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Product cost cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            ),
        ));
        
        $this->load->library('upload',$config);
        if($this->form_validation->run()==TRUE&&$this->upload->do_upload("filename")){
            $name_file=$_FILES['filename']['name'];
            $this->ProductModel->addProduct($name_file);
            $data['title']='Products';
            $data['message']='Product entry added!';
            $data['root_url']='products';
            $data['return']='Return to products';
            $this->load->view('admin/crudsuccess',$data);
        }
        else{
            $data['file_err']=$this->upload->display_errors();
            $this->load->view('admin/productsadd',$data['file_err']);
        }
    }
    public function editProduct($id){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->form_validation->set_rules('name','Product Name','required');
        $this->form_validation->set_rules('description','Product Description','required');
        $this->form_validation->set_rules('quantity','Product Quantity',array(
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
            ),
        ));
        $this->form_validation->set_rules('cost','Product Cost',array(
            'required',
            array(
                'isZero',
                function($count){
                    if($count==0){
                        $this->form_validation->set_message('isZero','Product cost cannot be zero');
                        return FALSE; 
                    }
                    return TRUE;
                }
            ),
        ));
        $this->load->library('upload',$config);
        if(!empty($_FILES['filename']['name'])){
            if($this->form_validation->run()==TRUE&&$this->upload->do_upload("filename")){
                $name_file=$_FILES['filename']['name'];
                $this->ProductModel->updateProduct($name_file);
                $data['title']='Products';
                $data['message']='Product entry updated!';
                $data['root_url']='products';
                $data['return']='Return to products';
                $this->load->view('admin/crudsuccess',$data);
            }
            else{
                $data['product']=$this->ProductModel->getProductById($id);
                $data['file_err']=$this->upload->display_errors();
                $this->load->view('admin/productsedit',$data);
            }
        }
        else{
            if($this->form_validation->run()==TRUE){
                $name_file=$this->ProductModel->getImageFile($id);
                $this->ProductModel->updateProduct($name_file,$id);
                $data['title']='Products';
                $data['message']='Product entry updated!';
                $data['root_url']='products';
                $data['return']='Return to products';
                $this->load->view('admin/crudsuccess',$data);
            }
            else{
                $data['product']=$this->ProductModel->getProductById($id);
                $data['file_err']=$this->upload->display_errors();
                $this->load->view('admin/productsedit',$data);
            }
        }
    } 
}