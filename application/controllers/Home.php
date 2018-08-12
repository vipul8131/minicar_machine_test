<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("manufacturer_model");
        $POST = json_decode(file_get_contents('php://input'));
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function main_page(){
		$this->load->view('main');
	}

	public function manufacturer(){
		$this->load->view('manufacturer');
	}

	public function car_models(){
		$this->load->view('car_models');
	}

	public function save_manufacturer(){
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->manufacturer_model->saveManufactureData($data);
	}

	public function get_manufacturer(){
		echo $this->manufacturer_model->getManufactureData();
	}

	public function get_models(){
		echo $this->manufacturer_model->getModelsData();
	}

	public function save_models(){
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
