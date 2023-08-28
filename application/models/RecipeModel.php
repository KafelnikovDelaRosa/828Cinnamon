<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RecipeModel extends CI_Model{
    public function getRecipe(){
        $this->load->database();
        $query=$this->db->get('recipetb');
        $result=$query->result();
        return $result;
    }
}