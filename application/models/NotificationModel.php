<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NotificationModel extends CI_Model{
    public function addUserNotification($email,$receipt){
        $this->load->database();
        $referenceid=uniqid();
        date_default_timezone_set('Asia/Manila');
        $data=array(
            'receiver'=>$email,
            'subject'=>'For Order Receipt ID '.'#'.$receipt.' Compliance',
            'sender'=>'828 Cinnamon Rolls',
            'message'=>'Your reference number is #'.$referenceid." "."take a screenshot of this number as well as the receipt to be sent to 828 Cinnamon Roll fb page to complete further transactions ."." Here is their link:"."https://www.facebook.com/828cinnaroll",
            'date'=>date('Y-m-d'),
            'readstatus'=>0,
        );
        $this->db->insert('notificationtb',$data);
    }
    public function getUserNotifications($email){
        $this->load->database();
        $this->db->where('receiver',$email);
        $query=$this->db->get('notificationtb');
        $result=$query->result();
        return $result;
    }
}