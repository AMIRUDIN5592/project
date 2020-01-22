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
	function login(){
		$this->load->view('login');
	}
	public function action_login() {
        $user      = $this->security->xss_clean($this->input->post('username'));
        $password      = md5($this->security->xss_clean($this->input->post('password')));
        $q = $this->db->query("SELECT * FROM tbuser WHERE username = '".$user."' AND password = '".$password."'");
        // $q = $this->db->query("SELECT a.*,a.id,a.username,a.nama,a.tingkat,a.id_prov,a.id_kab,a.level,b.group_id,idgateway FROM t_admin a INNER JOIN ref_user_group b ON a.id=b.user_id LEFT JOIN tbgateway c ON b.group_id = c.group_id WHERE a.username = '".$user."'");
        // var_dump($q);exit;
        $j_cek  = $q->num_rows();
        $d_cek  = $q->row();
        //echo $this->db->last_query();
        
        if($j_cek == 1) {
            $data = array(
                    'adminid' => $d_cek->id,
                    'adminuser' => $d_cek->username,
                    'adminlevel' => $d_cek->level,
                    'adminvalid' => true
                    );
            $this->session->set_userdata($data);
           // redirect('index.php/admin');\
           $level = $this->session->userdata('adminlevel');
            
                redirect('beranda');
            
            
            
        } else {    
                $this->session->set_flashdata('alert', 'gagal_login');
            redirect('cpage/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $sess_data = '';
        $this->session->set_userdata($sess_data);
        redirect(site_url('login'));
    }
	public function index()
	{
		if ($this->session->userdata('adminlevel') == '') {
            $this->session->set_flashdata('alert', 'gagal_login_first');
            redirect('slipgaji/Cpage/login');
        }
		// $data = 
		// var_dump($data);exit;
		$data['title'] = 'Beranda';
		$data['data'] =$this->mpage->get_data_index();
		
		$this->load->view('page/index',$data);
	}
	function man_admin()
	{
		// echo "ada";exit;
		$data['title'] = 'Manajemen Admin';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/man_admin',$data);
	}
	function man_menu(){
		$data['title'] = 'Manajemen Menu';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/man_menu',$data);
	}
	function list_slip_karyawan(){
		$data['title'] = 'Slip Karyawan';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/slip_karyawan',$data);
	}
	function list_slip_perorangan(){
		$data['title'] = 'Slip Perorangan';
		$data['data'] =$this->mpage->get_data();
		$this->load->view('page/slip_perorangan',$data);
	}
}
