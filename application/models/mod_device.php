<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_device extends CI_Model{
    
    function simpan_data_ketinggian_air($data_ketinggian_air){
        $this->db->insert("t_ketinggian_air",$data_ketinggian_air);
    }

    
    function last_data(){
        $query = $this->db->query("Select * from t_ketinggian_air order by id desc limit 5");
        return $query->result();
    }

	function today_log(){
        $query = $this->db->query("Select * from t_ketinggian_air where datetime like '". date("Y-m-d") ."%' order by id desc");
        return $query->result();
    }

    function morning_report_current_month(){
        $query = $this->db->query("Select * from t_morning_report where date like '". date("Y-m") ."%' order by id asc");
        return $query->result();
    }


    
    
}
