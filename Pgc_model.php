<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pgc_model extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "accessrestapi";

    function __construct(){
        parent::__construct();
        //load our second db and put in $db2
        $this->db_pgc = $this->load->database('sys_pgc', TRUE);
    }

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        // return true; //// fdespi.05242020
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return array('status' => 401,'message' => 'Unauthorized.');
        }
    }

    public function lgu_detail_data($id)
    {
        return $this->db_pgc->from('MST_LGU')->where('lgu_code',$id)->get()->row();
    }

    public function brgy_detail_data($id)
    {
        return $this->db_pgc->from('MST_LGU_BRGY')->where('brgy_code',$id)->get()->row();
    }

    public function lgu_list($distid='')
    {
        if($distid!='')
            $this->db_pgc->where('district_code', $distid);

        $query = $this->db_pgc->get('MST_LGU');
        $results = $query->result();
        return $results;
    }

    public function brgy_list($lguid='')
    {
        if($lguid!='')
            $this->db_pgc->where('lgu_code', $lguid);

        $query = $this->db_pgc->get('MST_LGU_BRGY');
        $results = $query->result();
        return $results;
    }
}
