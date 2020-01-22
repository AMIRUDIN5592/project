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
		$q = $this->db->query("select * from tbslipgaji order by concat(right(periode,4),'-',left(periode,2)) Desc");
		return $q->result();
	}
	function get_data_karyawan(){
		$q = $this->db->query("SELECT COUNT(nik) AS jml_karyawan,periode,SUM(`totalgajineto`) AS total_gaji_n FROM tbslipgaji GROUP BY concat(right(periode,4),'-',left(periode,2)) desc");
		return $q->result();
	}
	function get_data_detail_slip($id){
		$q = $this->db->query("select * from tbslipgaji where id='$id' order by concat(right(periode,4),'-',left(periode,2)) Desc");
		return $q->result();
	}
	
}

?>