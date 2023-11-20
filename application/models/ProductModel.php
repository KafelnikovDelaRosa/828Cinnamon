<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductModel extends CI_Model{
    public function addProduct($imageUpload){
        $this->load->database();
        $data=array(
            'image'=>$imageUpload,
            'name'=>$_POST["name"],
            'description'=>$_POST["description"],
            'quantity'=>$_POST["quantity"],
            'unit'=>$_POST['unit'],
            'cost'=>$_POST['cost'],
            'status'=>'available'
        ); 
        $this->db->insert('producttb',$data);
    }
    public function getProductSum(){
        $this->load->database();
        return $this->db->count_all('producttb');
    }
    public function getNoProducts(){
        $this->load->database();
        $result=$this->db->count_all_results('producttb');
        return $result;
    }
    public function getProducts(){
        $this->load->database();
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function getProductById($id){
        $this->load->database();
        $this->db->where('productid',$id);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function getProductsLimit($limit,$startingIndex){
        $this->load->database();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    } 
    public function sortProducts($category,$limit,$startingIndex){
        $this->load->database();
        $this->db->order_by($category,'ASC');
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function searchProducts($input,$limit,$startingIndex){
        $this->load->database();
        $this->db->group_start()
            ->like('productid',$input,'both')
            ->or_like('name',$input,'both')
        ->group_end();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function filterStatusCount($status){
        $this->load->database();
        $this->db->where('status',$status);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function filterStatus($status,$limit,$startingIndex){
        $this->load->database();
        $this->db->where('status',$status);
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function getQuantity($id){
        $this->load->database();
        $this->db->select('quantity');
        $this->db->where('productid',$id);
        $query=$this->db->get('producttb');
        $row=$query->row();
        $quantity=$row->quantity;
        return $quantity;
    }
    public function getImageFile($product_id){
        $this->load->database();
        $this->db->where('productid',$product_id);
        $query=$this->db->get('producttb');
        $result="";
        foreach($query->result() as $row){
            $result=$row->image;
        }
        return $result;
    }
    public function updateProduct($filename,$id){
        $this->load->database();
        $data=array(
            'image'=>$filename,
            'name'=>$_POST["name"],
            'description'=>$_POST["description"],
            'quantity'=>$_POST['quantity'],
            'unit'=>$_POST['unit'],
            'cost'=>$_POST['cost']
        );
        $this->db->where('productid',$id);
        $this->db->update('producttb',$data);
    }
    public function removeProduct($product_id){
        $this->load->database();
        $data=array(
            'productid'=>$product_id
        );
        $this->db->delete('producttb',$data);
    }
}