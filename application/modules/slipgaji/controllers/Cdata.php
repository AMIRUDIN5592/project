<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdata extends MY_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->model('mdata');
        $this->load->library('session');
        // $this->load->library('bcrypt');
       // $this->load->library('user_agent');
       // $this->load->library('simple_html_dom');
        // $s = $this->input->post('startyear');
        // $e = $this->input->post('endyear');
    }
	function list_data_slip(){
		// echo "ada";exit;
		$data =$this->mdata->get_data_slip();
		echo json_encode($data);
	}
}
