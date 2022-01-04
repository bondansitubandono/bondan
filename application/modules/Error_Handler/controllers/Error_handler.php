<?php defined('BASEPATH') or exit('maaf akses anda kami tutup');
class Error_handler extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index(){ 
		$this->load->view('v_view');
	}
}