<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mpagerj extends CI_Model {
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
}

?>