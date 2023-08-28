<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {
    function __construct(){
        parent::__construct();
        // Load url helper
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('OrderModel');
        $this->load->model('InventoryModel');
    } 
	public function index()
	{
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = '202010106@feudiliman.edu.ph';
        $config['smtp_pass'] = 'arstotzkanian2341';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        // Compose the email
        $this->email->from('202010106@feudiliman.edu.ph', $_POST["name"]);
        $this->email->to($_POST["email"]);
        $this->email->subject('Test Email');
        $this->email->message('This is a test email message.');

        // Send the email
        if ($this->email->send()) {
            echo 'Email sent successfully.';
            header('location:'.base_url('Landing'));
        } else {
            echo 'Email sending failed. Error: ' . $this->email->print_debugger();
        }
	}
}