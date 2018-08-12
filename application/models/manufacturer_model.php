<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function saveManufactureData($data){
    	$this->db->select("MANUFACTURER_NAME");
    	$this->db->from("tbl_manufacturer");
    	$this->db->where("MANUFACTURER_NAME", $data['m_name']);
    	$q = $this->db->get();
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "code" => 201), true);
    	}else{
    		$qry = $this->db->insert("tbl_manufacturer", array("MANUFACTURER_NAME" => $data['m_name'], "ADDED_DATE" => $data['added_date']));
	    	if($qry){
	    		return json_encode(array("status" => "success", "code" => 200), true);
	    	}else{
	    		return json_encode(array("status" => "failed"), true);
	    	}	
    	}
    }

    public function getManufactureData(){
    	$this->db->select("*");
    	$this->db->from("tbl_manufacturer");
    	$q = $this->db->get();
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "data" => $q->result_array()), true);
    	}else{
    		return json_encode(array("status" => "success", "data" => ""), true);
    	}
    }

    public function getModelsData(){
    	$q = $this->db->query("SELECT MODEL_NAME, COLOR, MANUFACTURING_YEAR, REG_NUMBER, NOTE, tbl_models.MODEL_ID, MANUFACTURER_NAME, IMAGE1, IMAGE2, tbl_models.ADDED_DATE FROM tbl_manufacturer JOIN tbl_models on tbl_manufacturer.MANUFACTURER_ID = tbl_models.MANUFACTURER_ID JOIN `tbl_model_images` on tbl_models.MODEL_ID = tbl_model_images.MODEL_ID order by tbl_models.MODEL_ID DESC");
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "data" => $q->result_array()), true);
    	}else{
    		return json_encode(array("status" => "success", "data" => ""), true);
    	}
    }

    public function getInventoryDetailsById($data){
    	$q = $this->db->query("SELECT MODEL_NAME, COLOR, MANUFACTURING_YEAR, REG_NUMBER, NOTE, tbl_models.MODEL_ID, MANUFACTURER_NAME, IMAGE1, IMAGE2, tbl_models.ADDED_DATE FROM tbl_manufacturer JOIN tbl_models on tbl_manufacturer.MANUFACTURER_ID = tbl_models.MANUFACTURER_ID JOIN `tbl_model_images` on tbl_models.MODEL_ID = tbl_model_images.MODEL_ID where tbl_models.MANUFACTURER_ID=".$data);
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "data" => $q->result_array()), true);
    	}else{
    		return json_encode(array("status" => "success", "data" => ""), true);
    	}
    }

    public function getInventoryData(){
    	$q = $this->db->query("SELECT MODEL_NAME, MANUFACTURER_NAME, count(*) as model_count, tbl_models.MODEL_ID, tbl_manufacturer.MANUFACTURER_ID FROM tbl_manufacturer JOIN tbl_models on tbl_manufacturer.MANUFACTURER_ID = tbl_models.MANUFACTURER_ID group by tbl_models.MANUFACTURER_ID");
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "data" => $q->result_array()), true);
    	}else{
    		return json_encode(array("status" => "success", "data" => ""), true);
    	}
    }

    public function saveModelData($data){
    	$this->db->select("MODEL_NAME");
    	$this->db->from("tbl_models");
    	$this->db->where('MODEL_NAME', $data['model_name']);
    	$q = $this->db->get();
    	if($q->num_rows() > 0){
    		return json_encode(array("status" => "success", "code" => 201), true);
    	}else{
    		$insertData = array("MODEL_NAME" => $data['model_name'], "ADDED_DATE" => $data['added_date'], "COLOR" => $data['model_color'], "MANUFACTURING_YEAR" => $data['mfg_year'], "REG_NUMBER" => $data['reg_no'], 	"NOTE" => $data['model_note'], "MANUFACTURER_ID" => $data['manufacturer_id']);
	    	$qry = $this->db->insert("tbl_models", $insertData);
	    	if($qry){
	    		$insertImages = array("MODEL_ID" => $this->db->insert_id(), "IMAGE1" => $data['file1'], "IMAGE2" => $data['file2']);
	    		$qry2 = $this->db->insert("tbl_model_images", $insertImages);
	    		if($qry2){
	    			return json_encode(array("status" => "success", "code" => 200), true);
	    		}else{
	    			return json_encode(array("status" => "failed"), true);
	    		}
	    	}
    	}	
    }

    public function soldModels($modelId){
    	$this->db->where("MODEL_ID", $modelId);
    	$qry = $this->db->delete("tbl_models");
    	if($qry){
    		return json_encode(array("status" => "success"), true);
    	}else{
    		return json_encode(array("status" => "failed"), true);
    	}
    }
}