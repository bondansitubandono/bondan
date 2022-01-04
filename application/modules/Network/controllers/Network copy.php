<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Network extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_network'); 
	}
	private $primary_key = "fc_mail";
	private $secondary_key = "fv_member";
	private $kolom = array("fc_member","fv_member","fc_gender","fv_addr","fc_mail","fc_phone","fc_referral_id","fc_referral_from","fc_approved","fc_hold","fv_province","fv_city","fc_jenis");
	public function index($error = null){		
		is_logged();
		$data = array(
			'subtitle' => 'Member / Network',
			"active_member" => $this->M_network->getStatus_member("Active"),
			"inactive_member" => $this->M_network->getStatus_member("InActive"),
			"pending_member" => $this->M_network->getStatus_member("Pending"), 
			'error' => $error
		);
		loadView_member(array("v_view","v_form"),$data,1,1,1);
	} 
	public function Hapus(){
		$kode = $this->uri->segment(3);
		$data = array("fc_member" => $kode);
		$hapus = $this->M_network->hapus($data);  
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
		$update = $this->M_network->updateStatus($data,array("fc_member"=>$kode)); 
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
				$where = array("fc_approved" => "Y","fc_hold"=>"N","fc_referral_from"=> $this->session->userdata('fc_referral_id'));
				break;
			case 'InActive':
				$where = array("fc_approved" => "Y","fc_hold"=>"Y","fc_referral_from"=> $this->session->userdata('fc_referral_id'));
				break;
			case 'Pending':
				$where = array("fc_approved" => "N","fc_hold"=>"N","fc_referral_from"=> $this->session->userdata('fc_referral_id'));
				break; 
			default:
				$where = array("fc_approved" => "Y","fc_hold"=>"N","fc_referral_from"=> $this->session->userdata('fc_referral_id'));
				break;
		} 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $kolom[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir']; 
        $totalData = $this->M_network->allposts_count($tabel,$where); 
        $totalFiltered = $totalData;  
        if(empty($this->input->post('search')['value']))
        {   
					 
            $posts = $this->M_network->allposts($tabel,$limit,$start,$order,$dir,$where);
            $posts = $this->M_network->allposts($tabel,$limit,$start,$order,$dir,$where);
        }
        else {
            $search = $this->input->post('search')['value'];  
            $posts =  $this->M_network->posts_search($tabel,$this->primary_key,$this->secondary_key,$limit,$start,$search,$order,$dir,$where); 
            $totalFiltered = $this->M_network->posts_search_count($tabel,$this->primary_key,$this->secondary_key,$search,$where);
        } 
        $data = array();
        if(!empty($posts))
        {	$no = 1;
            foreach ($posts as $post)
            { 	
				 $query = "select * from tm_member WHERE fc_referral_from = '".$post->fc_referral_id."' ";
					$aksi    = $this->M_network->customeQuery($query);
						if(!empty($aksi)){
							foreach ($aksi->result() as $key) {
					
                $nestedData['no'] = $no++;
                $nestedData['nox'] = $key->fc_referral_id;	
                for ($i=0; $i < count($this->kolom) ; $i++) {
					
                	$hasil = $this->kolom[$i]; 
                	$nestedData[$this->kolom[$i]] = $key->$hasil;
				}  
			    $data[] = $nestedData; 
			} } 
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