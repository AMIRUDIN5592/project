<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpage extends MY_Controller {
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
		$this->load->view('page/index',$data);
	}
	function man_admin()
	{
		// echo "ada";exit;
		$data['title'] = 'Manajemen Admin';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/man_admin',$data);
	}
	function man_menu()
	{
		// echo "ada";exit;
		$data['title'] = 'Manajemen Menu';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/man_menu',$data);
	}
	function setor_kotak(){
		$data['title'] = 'Setor Kotak';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/setor_kotak',$data);
	}
	function list_kotak(){
		$data['title'] = 'List Kotak';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/list_kotak',$data);
	}
}
