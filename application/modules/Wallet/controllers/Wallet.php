<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Wallet extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_model'); 
	}
	private $primary_key = "fc_mail";
	private $secondary_key = "fv_member";
	private $kolom = array("fc_member","fv_member","fc_gender","fv_addr","fc_mail","fc_phone","fc_referral_id","fc_referral_from","fc_approved","fc_hold","fv_province","fv_city","fc_jenis","fn_saldo","fn_request","fn_total","fd_request","fc_proses","fv_bank");
	public function index($error = null){		
		is_logged_admin();
		$data = array(
			'subtitle' => 'Admin / e-Wallet',
			"active_member" => $this->M_model->getStatus_member("Active"),
			"inactive_member" => $this->M_model->getStatus_member("InActive"),
			"pending_member" => $this->M_model->getStatus_member("Pending"), 
			'error' => $error
		);
		loadView_admin(array("v_view","v_form"),$data,1,1,1);
	} 
	public function History(){
		$fc_member = $this->uri->segment(3);
		$data = $this->M_model->history($fc_member);
		echo json_encode($data);
	}
	public function TopUp(){
		$data = array(
			"fc_member" => $this->input->post("mem_kode"),
			"fn_topup"  => $this->input->post("mem_topup"),
			"fn_total"  => $this->input->post("mem_netto")
		);
		$exec = $this->M_model->topup($data);
		if($exec){
			echo "Berhasil";
		}else{
			echo "Gagal";
		}
	}
	public function data(){ 
		$tabel = "tm_member";
		$where = null;
		$status = $this->uri->segment(3);
		switch ($status) {
			case 'Active':
				$where = array("fc_approved" => "Y","fc_hold"=>"N","fc_level"=>"2");
				break;
			case 'InActive':
				$where = array("fc_approved" => "Y","fc_hold"=>"Y");
				break;
			case 'Pending':
				$where = array("fc_approved" => "N","fc_hold"=>"N");
				break; 
			default:
				$where = array("fc_approved" => "Y","fc_hold"=>"N");
				break;
		} 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $kolom[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir']; 
        $totalData = $this->M_model->allposts_count($tabel,$where); 
        $totalFiltered = $totalData;  
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_model->allposts($tabel,$limit,$start,$order,$dir,$where);
        }
        else {
            $search = $this->input->post('search')['value'];  
            $posts =  $this->M_model->posts_search($tabel,$this->primary_key,$this->secondary_key,$limit,$start,$search,$order,$dir,$where); 
            $totalFiltered = $this->M_model->posts_search_count($tabel,$this->primary_key,$this->secondary_key,$search,$where);
        } 
        $data = array();
        if(!empty($posts))
        {	$no = 1;
            foreach ($posts as $post)
            { 	
                $nestedData['no'] = $no++;
                for ($i=0; $i < count($this->kolom) ; $i++) {
                	$hasil = $this->kolom[$i]; 
                	$nestedData[$this->kolom[$i]] = $post->$hasil;
                }  
                $data[] = $nestedData; 
            }
        } 
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    ); 
        echo json_encode($json_data); 
	} 
}