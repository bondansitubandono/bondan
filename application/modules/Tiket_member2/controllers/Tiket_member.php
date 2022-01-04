<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Tiket_member extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_model'); 
	}
	private $primary_key = "fc_mail";
	private $secondary_key = "fv_member";
	private $kolom = array("fc_member","fv_member","fc_gender","fv_addr","fc_mail","fc_phone","fc_referral_id","fc_referral_from","fc_approved","fc_hold","fv_province","fv_city","fc_jenis","fn_saldo","fn_request","fn_total","fd_request","fc_proses","fv_bank");
	public function index($error = null){		
		is_logged();
		$data = array(
			'subtitle' => 'Admin / Tiket',
			"active_member" => $this->M_model->getStatus_member("Active"),
			"inactive_member" => $this->M_model->getStatus_member("InActive"),
			"pending_member" => $this->M_model->getStatus_member("Pending"), 
			'error' => $error
		);
		loadView_member(array("v_view","v_form"),$data,1,1,1);
	} 
	public function Hapus(){
		$kode = $this->uri->segment(3);
		$data = array("fc_member" => $kode);
		$hapus = $this->M_model->hapus($data);  
		if ($hapus > 0) {
			echo "Berhasil menghapus data";
		}else{
			echo "Gagal menghapus data";
		}
	} 
	public function Update_Status(){
		$kode = $this->uri->segment(3);
		$jenis = $this->uri->segment(4);
		$data = null;
		switch ($jenis) {
			case 1: 
				$data = array("fc_approved"=>"Y");
				break;
			case 2: 
				$data = array("fc_hold"=>"Y");
				break;
			case 3: 
				$data = array("fc_hold"=>"N");
				break;
		}
		$update = $this->M_model->updateStatus($data,array("fc_member"=>$kode)); 
		if ($update > 0) {
			echo "Berhasil Mengubah data";
		}else{
			echo "Gagal Mengubah data";
		}

	}
	public function data(){ 
		$tabel = "tm_member";
		$where = null;
		$status = $this->uri->segment(3);
		switch ($status) {
			case 'Active':
				$where = array("fc_approved" => "Y","fc_hold"=>"N");
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