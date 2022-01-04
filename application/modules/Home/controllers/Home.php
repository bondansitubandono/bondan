<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Home extends CI_Controller{
	function __construct(){
		parent::__construct(); 		
		$this->load->model('M_home');
	}
	public function index($error = null){		
	//	is_logged();
		$data = array(
			'subtitle' => 'Dashboard',
			'error' => $error
		);
		loadView("v_view",$data,0,1,1);
	}
	public function Simpan($data){ 
		$data = array(
			"fc_referral_id" => $this->input->post("ref_code"),
			"fd_join" => date("Y-m-d h:i:s"),
			"fc_hold" => "N"
			);   
		$proses = $this->M_home->tambah($data,"t_referral");
			if ($proses > 0 ) {
				$this->session->set_flashdata('status', 'Share Link berhasil');
				$this->session->set_flashdata('msg', 'referral Id anda telah terdaftar di antrian');
			
			
			}else{
				$this->session->set_flashdata('status', 'Share Link gagal');
				$this->session->set_flashdata('msg', 'referral Id anda telah terdaftar di antrian'); 
			
		
			}  
			redirect('Home');  
	}
 

}