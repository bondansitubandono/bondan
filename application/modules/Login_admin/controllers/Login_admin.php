<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Login_admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	public function index($error = null){		
		is_logged_admin();
		$data = array(
			'subtitle' => 'Login Administrator',
			'Message' => $error
		);
		loadView_admin("v_view",$data,0,0,0);
	}

	public function auth(){
		$userid = $this->input->post('userid');
		$pass 	= $this->input->post('password');
		$login  = $this->m_login->login($userid,$pass); 
		if ($login == 1) {
			$row = $this->m_login->getData($userid,$pass);			
			$data_user = array(
				'logged'		=> true,
				'fc_id' 		=> $row->fc_id,
				'fc_userid'  	=> $row->fc_userid, 
				'fv_username'  	=> $row->fv_username,
				'fc_level' 		=> $row->fc_level 
			); 
			$this->session->set_userdata($data_user);
			$this->session->set_flashdata('status', 'Berhasil Login');
			$this->session->set_flashdata('msg',"Selamat datang ".$data_user['fv_member']);  
		}else{
			$this->session->set_flashdata('status', 'Gagal Login');
			$this->session->set_flashdata('msg',"Periksa login anda"); 
		} 
		$this->index($hasil);
	}

	public function logout(){
		$this->session->unset_userdata('fc_id');
		redirect(site_url()."Login_admin");
	}

}