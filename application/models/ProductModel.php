<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductModel extends CI_Model{
    public function addProduct($imageUpload){
        $this->load->database();
        $data=array(
            'productimage'=>$imageUpload,
            'productname'=>$_POST["productname"],
            'productdescription'=>$_POST["description"],
            'productcost'=>$_POST["productcost"],
            'status'=>"available"
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
    public function getProducts($limit,$startingIndex){
        $this->load->database();
        $this->db->limit($limit,$startingIndex);
        $query=$this->db->get('producttb');
        $result=$query->result();
        return $result;
    }
    public function getImageFile($product_id){
        $this->load->database();
        $this->db->where('productid',$product_id);
        $query=$this->db->get('producttb');
        $result="";
        foreach($query->result() as $row){
            $result=$row->productimage;
        }
        return $result;
    }
    public function updateProduct($filename){
        $this->load->database();
        $data=array(
            'productimage'=>$filename,
            'productname'=>$_POST["productname"],
            'productdescription'=>$_POST["description"],
            'productcost'=>$_POST["productcost"],
            'status'=>$_POST["productstatus"]
        );
        $this->db->where('productid',$_POST['productid']);
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