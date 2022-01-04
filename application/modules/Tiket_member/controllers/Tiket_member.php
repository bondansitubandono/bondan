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
	private $level = array("level1","level2","level3","level4","level5","level6","level7","level8","level9","level10");
	
	public function index($error = null){		
		is_logged();
		$query = "select * from tm_member WHERE fc_referral_id = '". $this->session->userdata('fc_referral_id')."' ";
		$aksi    = $this->M_model->customeQuery($query);
			if(!empty($aksi)){
				foreach ($aksi->result() as $key) {
		
	$fc_member = $key->fc_member;
	$fc_referral_id = $key->fc_referral_id;
	$fv_member = $key->fv_member;
	$fc_mail = $key->fc_mail;
	$fv_addr = $key->fv_addr;
	$fc_wa = $key->fc_phone; } }
		$data = array(
			'subtitle' => 'Admin / Tiket',
			"omzet" => rupiah($this->M_model->omzet()), 
			"fc_member" => $fc_member,
			"fc_referral_id" => $fc_referral_id,
			"fv_member" => $fv_member,
			"fv_addr" => $fv_addr,
			"fc_mail" => $fc_mail,
			"fc_wa" => $fc_wa,
			'error' => $error
		);
		loadView_member(array("v_view","v_form","v_modal"),$data,1,1,1);
	} 
	public function History(){
		$fc_member = $this->uri->segment(3);
		$data = $this->M_model->history($fc_member);
		echo json_encode($data);
	}
	public function Omzet(){
		$fc_member = $this->uri->segment(3);
		$data = $this->M_model->omzet($fc_member);
		echo json_encode($data);
	}
	public function Cekkode(){
		$tabel ="tm_member";
		$where=null;
		$no1 ='1';
		$no2 ='2';
		$no3 ='3';
		$no4 ='4';
		$no5 ='5';
		$no6 ='6';
		$no7 ='7';
		$no8 ='8';
		$no9 ='9';
		$no10 ='10';
		$query="SELECT * FROM tm_member a JOIN tm_ticket b ON b.fc_member=a.fc_member WHERE a.fc_referral_id='". $this->session->userdata('fc_referral_id')."'";
		$aksi    = $this->M_model->customeQuery($query);
		if(!empty($aksi)){
			foreach ($aksi->result() as $key) {
				$saldo=$key->fn_saldo;
				$request=$key->fn_request;
			} }
$totalData1 = $this->M_model->allposts_count4($tabel,$where,$no1);
		$totalData2 = $this->M_model->allposts_count4($tabel,$where,$no2);
		$totalData3 = $this->M_model->allposts_count4($tabel,$where,$no3);
		$totalData4 = $this->M_model->allposts_count4($tabel,$where,$no4);
		$totalData5 = $this->M_model->allposts_count4($tabel,$where,$no5);
		$totalData6 = $this->M_model->allposts_count4($tabel,$where,$no6);
		$totalData7 = $this->M_model->allposts_count4($tabel,$where,$no7);
		$totalData8 = $this->M_model->allposts_count4($tabel,$where,$no8);
		$totalData9 = $this->M_model->allposts_count4($tabel,$where,$no9);
		$totalData10 = $this->M_model->allposts_count4($tabel,$where,$no10);
		$no11=($totalData1+$totalData2+$totalData3+$totalData4+$totalData5+$totalData6+$totalData7+$totalData8+$totalData9+$totalData10);
        $json_data = array(                 
			"request"          => 	$request, 
			"saldo"          => 	$saldo,
			"no1"            => 	$totalData1,
			"no2"            => 	$totalData2,
			"no3"            => 	$totalData3,
			"no4"            => 	$totalData4,
			"no5"            => 	$totalData5,
			"no6"            => 	$totalData6,
			"no7"            => 	$totalData7,
			"no8"            => 	$totalData8,
			"no9"            => 	$totalData9,
			"no10"            => 	$totalData10,
			"no11"            => $no11
			
                    ); 
        echo json_encode($json_data); 
		
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
	public function Request(){
		$data = array(
			"fc_member" => $this->input->post("mem_kode2"),
			"fn_request"  => $this->input->post("mem_request2"),
		);
		$exec = $this->M_model->request($data);
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
            $posts = $this->M_model->allposts2($tabel,$limit,$start,$order,$dir,$where);
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
				for ($i=0; $i < count($this->level) ; $i++) {
					
                	$hasil2 = $this->level[$i]; 
                	$nestedData[$this->level[$i]] = $post->$hasil2;
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
	public function data2(){ 
		$tabel = "tm_member";
		$where = null;
		$status = $this->uri->segment(3);
		
		$where = array( "level" => $status); 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $kolom[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir']; 
        $totalData = $this->M_model->allposts_count($tabel,$where); 
        $totalFiltered = $totalData;  
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_model->allposts2($tabel,$limit,$start,$order,$dir,$where);
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
				for ($i=0; $i < count($this->level) ; $i++) {
					
                	$hasil2 = $this->level[$i]; 
                	$nestedData[$this->level[$i]] = $post->$hasil2;
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