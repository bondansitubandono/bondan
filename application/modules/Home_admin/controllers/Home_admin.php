<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Home_admin extends CI_Controller{
	function __construct(){
		parent::__construct(); 
	}
	public function index($error = null){		
		is_logged_admin();
		$data = array(
			'subtitle' => 'Dashboard',
			'error' => $error
		);
		loadView_admin("v_view",$data,0,1,1);
	} 

}