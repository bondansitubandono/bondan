<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		
        $this->load->helper('captcha');

	}
	public function index($error = null){	
		
        $this->load->helper('captcha');
	//	$datas['title'] = 'Form Captcha';
        $cap = $this->buat_captcha();
        $datas['cap_img'] = $cap['image'];
		$this->session->set_userdata('kode_captcha', $cap['word']);	
		is_logged();
		$data = array(
			'subtitle' => 'Login Page',
			'cap_img' => $cap['image'],
			'Message' => $error
		);
		loadView("v_view",$data,0,0,0);
		
		//$this->load->view('captcha', $datas);
	
	}
	public function buat_captcha(){
        $vals = array(
            'img_path' => 'captcha/',
            'img_url' => base_url().'captcha/',
//            'font_path' => './font/timesbd.ttf',
            'font_path' => FCPATH . 'captcha/font/5.ttf',
            'font_size' => '50',
            'img_width' => '100',
            'img_height' => 30,
//            'img_width' => '150',
//            'img_height' => 30,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        return $cap;
    }
	public function auth(){
		$userid = $this->input->post('userid');
		$pass 	= $this->input->post('password');
		$kd_captcha 	= $this->input->post('kd_captcha');
		$login  = $this->m_login->login($userid,$pass); 
		if ($login == 1 ) {
			$row = $this->m_login->getData($userid,$pass);			
			$data_user = array(
				'logged'	=> true,
				'fc_member' 	=> $row->fc_member,
				'fv_member'  	=> $row->fv_member,
				'fc_mail' 		=> $row->$userid,
				'fc_level' 		=> $row->fc_level, 
				'fc_referral_id'=> $row->fc_referral_id 
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
		$this->session->unset_userdata('fc_member');
		redirect(site_url());
	}

}