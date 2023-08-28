<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BOM extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('InventoryModel');
        $this->load->model('RecipeModel');
        $this->load->model('BomModel');
    }
    public function index(){
        $data['bom']=$this->BomModel->getBOM();
        $data['recipes']=$this->RecipeModel->getRecipe();
        $data['items']=$this->InventoryModel->getInventory();
        $this->load->view('bom',$data);
    }
    public function addBom(){
        $this->BomModel->createBOM();
        header('location:'.base_url("BOM"));
    }
}