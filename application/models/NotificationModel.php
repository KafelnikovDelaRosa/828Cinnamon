<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NotificationModel extends CI_Model{
    public function addUserNotification($email,$id){
        $this->load->database();
        $referenceid=uniqid();
        date_default_timezone_set('Asia/Manila');
        $data=array(
            'receiver'=>$email,
            'subject'=>'For Order ID '.'#'.$id.' Compliance',
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
    public function notifyUser($email,$orderid){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'receiver'=>$email,
            'subject'=>'Order no '.$orderid.' status',
            'sender'=>'828 Cinnamon Rolls',
            'message'=>'Your order no '.$orderid.' has started you can check your orderhistory to confirm it',
            'date'=>date('Y-m-d H:i l',$currentManilaTime),
            'readstatus'=>0,
        );
        $this->db->insert('notificationtb',$data);
    }
    public function notifyProductReady($email,$orderid){
        $this->load->database();
        date_default_timezone_set('Asia/Manila');
        $currentManilaTime=time();
        $data=array(
            'receiver'=>$email,
            'subject'=>'Pickup of Order no '.$orderid.' status',
            'sender'=>'828 Cinnamon Rolls',
            'message'=>'Your order no '.$orderid.' is ready for pickup. Kindly visit and message us on our official 828 Cinnamon fb page for further transactions.'.' Here is their link: https://www.facebook.com/828cinnaroll',
            'date'=>date('Y-m-d H:i l',$currentManilaTime),
            'readstatus'=>0
        );
        $this->db->insert('notificationtb',$data);
    }
}