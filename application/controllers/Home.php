<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("manufacturer_model");
        $POST = json_decode(file_get_contents('php://input'));
    }

	public function index(){
		$this->load->view('index');
	}

	public function main_page(){//load main area
		$this->load->view('main');
	}

	public function manufacturer(){//load manufacture page
		$this->load->view('manufacturer');
	}

	public function car_models(){//load car models page
		$this->load->view('car_models');
	}

	public function view_inventory(){//load view inventory page
		$this->load->view('view_inventory');
	}

	public function save_manufacturer(){//save manufacturer data
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->manufacturer_model->saveManufactureData($data);
	}

	public function get_manufacturer(){//get manufacturer data
		echo $this->manufacturer_model->getManufactureData();
	}

	public function get_models(){//get car models data
		echo $this->manufacturer_model->getModelsData();
	}

	public function get_inventory_details(){//get all inventory data
		echo $this->manufacturer_model->getInventoryData();
	}

	public function get_inventory_details_by_id(){//get all inventory data
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->manufacturer_model->getInventoryDetailsById($data['m_id']);
	}

	public function sold_model(){
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->manufacturer_model->soldModels($data['model_id']);
	}

	public function save_models(){//save models with images data
		//print_r($_FILES);
		$imgs = $_FILES;
		//print_r($_POST);
		for( $i=1 ; $i <= count($imgs) ; $i++ ) {
			  //Get the temp file path
			  $tmpFilePath = $_FILES['file'.$i]['tmp_name'];
			  if ($tmpFilePath != ""){
			    $newFilePath = "./uploads/" . $_FILES['file'.$i]['name'];
			    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			    	$_POST['file'.$i] = $_FILES['file'.$i]['name'];
			    	
			    }
			  }
		}
		echo $this->manufacturer_model->saveModelData($_POST);
	}

}
