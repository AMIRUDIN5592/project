<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->model('mpage');
        $this->load->library('session');
        // $this->load->library('bcrypt');
       // $this->load->library('user_agent');
       // $this->load->library('simple_html_dom');
        // $s = $this->input->post('startyear');
        // $e = $this->input->post('endyear');
    }
	
	public function index()
	{
		// $data = 
		// var_dump($data);exit;
		$data['title'] = 'Beranda';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('index',$data);
	}
}
