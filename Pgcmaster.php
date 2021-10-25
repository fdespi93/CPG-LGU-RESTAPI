<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pgcmaster extends MY_Controller {

	public function __construct()
    {
	    parent::__construct();
	    header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, *");
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	    $method = $_SERVER['REQUEST_METHOD'];
	    if($method == "OPTIONS") {
	        die();
	    }

        $this->load->model("pgc_model");
        /*
        $check_auth_client = $this->pgc_model->check_auth_client();
		if($check_auth_client != true){
			die($this->output->get_output());
		}
		*/
    }

	// public function index()
	// {
	// 	$method = $_SERVER['REQUEST_METHOD'];
	// 	if($method != 'GET'){
	// 		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	// 	} else {
	// 		$check_auth_client = $this->pgc_model->check_auth_client();
	// 		if($check_auth_client == true){
	// 	        $response = $this->pgc_model->auth();
	// 	        if($response['status'] == 200){
	// 	        	$resp = $this->pgc_model->user_all_data();
	//     			// json_output(200,$resp);
	//     			json_output($response['status'],$resp);
	// 	        }
	// 		}
	// 	}
	// }
	public function sample()
	{
		// echo 'sample';
    	$this->data['lgulist'] = array('status' => 400,'message' => 'Bad request.');
		echo json_encode($this->data);
	}

	public function getLguDetail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET' || $this->uri->segment(3) == '' || $this->uri->segment(3) == null){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['lgu'] = $this->pgc_model->lgu_detail_data($id);
				echo json_encode($this->data);
			}
		}
	}

	public function getBrgyDetail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET' || $this->uri->segment(3) == '' || $this->uri->segment(3) == null){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['brgy'] = $this->pgc_model->brgy_detail_data($id);
				echo json_encode($this->data);
			}
		}
	}

	public function getLguList()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['lgulist'] = $this->pgc_model->lgu_list();
				echo json_encode($this->data);
			}
		}
	}

	public function getBrgyList()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'GET'){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['brgylist'] = $this->pgc_model->brgy_list();
				echo json_encode($this->data);
			}
		}
	}

	public function getLguByDistrict()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$distid = ($_GET['distid']) ? $_GET['distid'] : '';

		if($method != 'GET' || $distid == '' || is_numeric($distid) == FALSE){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['lgulist'] = $this->pgc_model->lgu_list($distid);
				echo json_encode($this->data);
			}
		}
	}

	public function getBrgyByLgu()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$lguid = ($_GET['lguid']) ? $_GET['lguid'] : '';

		if($method != 'GET' || $lguid == '' || is_numeric($lguid) == FALSE){
			echo json_encode(array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->pgc_model->check_auth_client();
			if($check_auth_client == true){
				$this->data['brgylist'] = $this->pgc_model->brgy_list($lguid);
				echo json_encode($this->data);
			}
		}
	}

}
