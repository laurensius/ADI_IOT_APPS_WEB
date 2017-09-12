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
    
    
}
