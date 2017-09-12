<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonitoringKetinggian extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mod_device');
        
    }

    public function index(){
        $this->load->view("adi/header");
        $this->load->view("adi/body_monitoring");
        $this->load->view("adi/footer");    
    }
}