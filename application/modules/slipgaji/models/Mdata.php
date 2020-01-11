<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdata extends CI_Model {
     // private $db2;
     
     public function __construct()
     {
      parent::__construct();
	  // $this->load->model('mbmkg');
             // $this->db2 = $this->load->database('billingvma',TRUE);
     }

    function get_data_slip(){
		$q = $this->db->query("select * from tbslipgaji order by date_format(periode,'%m-%Y') Desc");
		return $q->result();
	}
}

?>