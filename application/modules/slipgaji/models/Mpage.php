<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mpage extends CI_Model {
     // private $db2;
     
     public function __construct()
     {
      parent::__construct();
	  // $this->load->model('mbmkg');
             // $this->db2 = $this->load->database('billingvma',TRUE);
     }

    function get_data(){
		return "hello bro";
	}
	function get_data_index(){
		$q=$this->db->query("SELECT periode,SUM(`totalgajineto`) AS gaji_neto_all,
(SELECT SUM(`totalgajineto`)FROM `tbslipgaji` WHERE nik = '123') AS total_all_gaji,
(SELECT SUM(`totpotongan`)FROM `tbslipgaji` WHERE nik = '123') AS total_all_potongan
 FROM `tbslipgaji` WHERE MONTH(CURDATE()) = LEFT(periode,2) AND RIGHT(periode,4) = YEAR(CURDATE()) GROUP BY `periode`");
		return $q->result();
	}
}

?>