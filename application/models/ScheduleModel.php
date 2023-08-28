<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ScheduleModel extends CI_Model{
    public function createSchedule(){
        $this->load->database();
    }
}