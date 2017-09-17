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
		if($this->uri->segment(3)!=null && $this->uri->segment(4)!=null){
			$data_ketinggian = array(
				"id" => "",
				"datetime" => date("Y-m-d H:i:s"),
				"ketinggian" => $this->uri->segment(3),
				"status" => $this->uri->segment(4)
				);
			$this->mod_device->simpan_data_ketinggian_air($data_ketinggian);
			echo "#Success^";
		}else{
			echo "#Anda tidak diperkenankan mengakses URL ini. Terima kasih^";		
		}
	}

	public function dataset(){
		$dataset = array(
			"last_data" => $this->mod_device->last_data()
			);
		header('Content-Type: application/json');
		echo json_encode(array("dataset"=>$dataset));
	}
	
}

