 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_device');
	}

	public function index(){
		echo "Anda tidak diperkenankan mengakses URL ini. Terima kasih";
	}

	public function post_data(){
		if($this->uri->segment(3)!=null && $this->uri->segment(4)!=null && $this->uri->segment(5)!=null){
			$data_ketinggian = array(
				"id" => "",
				"datetime" => date("Y-m-d H:i:s"),
				"ketinggian" => $this->uri->segment(3),
				"volume" => number_format((float)3.14 * (9 * 9) * $this->uri->segment(3), 2, '.', ''),
				"status" => $this->uri->segment(4),
				"notif" => $this->uri->segment(5)
				);
			$this->mod_device->simpan_data_ketinggian_air($data_ketinggian);
			$data_report = array(
				"id" => "",
				"date" => date("Y-m-d"),
				"ketinggian" => $this->uri->segment(3),
				"volume" => number_format((float)3.14 * (9 * 9) * $this->uri->segment(3), 2, '.', ''),
				"status" => $this->uri->segment(4)
				);
			$chk = $this->morning_report_checker();
			$jam = date("H");
			if($chk < 1 && $jam >= 8){
				$this->mod_device->simpan_morning_report($data_report);
			}
			echo "#Success^";
		}else{
			echo "#Anda tidak diperkenankan mengakses URL ini. Terima kasih^";		
		}
	}

	public function morning_report_checker(){
		$jumlah = $this->mod_device->morning_report_checker();
		foreach ($jumlah as $jml) 
		$return = $jml->jumlah;
		return $return;
	}

	public function dataset(){
		$dataset = array(
			"last_data" => $this->mod_device->last_data(),
			"today_log" => $this->mod_device->today_log(),
			"morning_report_current_month" => $this->mod_device->morning_report_current_month()
			);
		header('Content-Type: application/json');
		echo json_encode(array("dataset"=>$dataset));
	}

	public function custom_morning_report(){
		$dataset = array(
			"custom_morning_report" => $this->mod_device->custom_morning_report($this->uri->segment(3),$this->uri->segment(4))
			);
		header('Content-Type: application/json');
		echo json_encode(array("report"=>$dataset));
	}
	
}

