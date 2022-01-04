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
	private $level = array("level1","level2","level3","level4","level5","level6","level7","level8","level9","level10");
	public function index($error = null){
		$this->load->helper('captcha');
		$cap = $this->buat_captcha();
		$datas['cap_img'] = $cap['image'];
		$this->session->set_userdata('kode_captcha', $cap['word']);	
		is_logged();
		$data = array(
			'subtitle' => 'Member / Network',
			"active_member" => $this->M_network->allposts_count("tm_member",$where),
			"inactive_member" => $this->M_network->getStatus_member("InActive"),
			"pending_member" => $this->M_network->getStatus_member("Pending"), 
			'error' => $error,
			'cap_img' => $cap['image']
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
	public function Cekkode(){
		$tabel ="tm_member";
		$where=null;
		$app ='Y';
		$hold ='N';
		$app2 ='Y';
		$hold2 ='Y';
		$app3 ='N';
		$hold3 ='N';
        $totalData1 = $this->M_network->allposts_count4($tabel,$where,$app,$hold);
        $totalData2 = $this->M_network->allposts_count4($tabel,$where,$app2,$hold2);
        $totalData3 = $this->M_network->allposts_count4($tabel,$where,$app3,$hold3);
        $json_data = array(                 
			"no"            => 	$totalData1,
			"no2"            => 	$totalData2,
			"no3"            => 	$totalData3
                    ); 
        echo json_encode($json_data); 
		
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
	public function getCity(){
		$data = "<option value=''>Pilih</option>";
		foreach (getCity($this->uri->segment(3)) as $key => $value) {
			$data .= "<option value='".$key."'>".$value."</option>";
		}
		echo $data;
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
					 
            $posts = $this->M_network->allposts2($limit,$start,$order,$dir,$where);
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
				 	
                $nestedData['no'] = $no++;
                $nestedData['nox'] =  $this->uri->segment(4);	
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
        $totalData = $this->M_network->allposts_count($tabel,$where); 
        $totalFiltered = $totalData;  
        if(empty($this->input->post('search')['value']))
        {   
					 
            $posts = $this->M_network->allposts2($limit,$start,$order,$dir,$where);
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
				 	
                $nestedData['no'] = $no++;
                $nestedData['nox'] = $post->fc_referral_id;	
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
	
	public function Simpan($data){ 
				$data = array(
					"fv_member" => $this->input->post("mem_name"),
					"fc_gender" => $this->input->post("mem_gender"),
					"fc_province" => $this->input->post("mem_provinsi"),
					"fc_city" => $this->input->post("mem_kab"),
					"fv_addr" => $this->input->post("mem_addr"),
					"fc_mail" => $this->input->post("mem_mail"),
					"fc_username" => $this->input->post("mem_username"),
					"fc_phone" => $this->input->post("mem_wa"),
					"fc_level" => 2,
					"fc_referral_from" => $this->input->post("ref_code"),
					"fc_referral_id" => random_string('alnum', 10),
					"fc_bank" => $this->input->post("mem_bank"),
					"fc_norek" => $this->input->post("mem_no_rekening"),
					"fv_name_rek" => $this->input->post("mem_nama_rekening"),
					"fc_approved" => "Y",
					"fc_hold" => "N",
					"fc_password" => encryptPass($this->input->post("mem_password")),
					"fd_join" => date("Y-m-d h:i:s")
				);   
				$query = "select COUNT(*) as no from tm_member WHERE fv_member = '".$this->input->post("mem_name")."' OR fc_mail = '".$this->input->post("mem_mail")."' OR fc_phone = '".$this->input->post("mem_wa")."' OR( fc_bank = '".$this->input->post("mem_bank")."' AND  fc_norek = '".$this->input->post("mem_no_rekening")."' ) ";
				$aksi    = $this->M_network->customeQuery($query);
						foreach ($aksi->result() as $key) {
							$no=$key->no;}
							if($no<='50'){ 
			
		$kd_captcha 	= $this->input->post('kode_captcha');
				$proses = $this->M_network->tambah($data,"tm_member");
				if ($proses > 0 && $kd_captcha == $this->session->userdata('kode_captcha')) {
					$this->session->set_flashdata('status', 'Pendaftaran berhasil');
					$this->session->set_flashdata('msg', 'silahkan check email untuk melakukan verifikasi.');
				}else{
					$this->session->set_flashdata('status', 'Pendaftaran gagal');
					$this->session->set_flashdata('msg', 'silahkan check inputan anda'); 
				}  
			} else{
				$this->session->set_flashdata('status', 'Pendaftaran gagal');
				$this->session->set_flashdata('msg', 'nama dan nomer rekening sudah melebihi kuota maksimal'); 
			} 
		   if($this->input->post("status") == "member"){
				redirect('Network');
		   } else if($this->input->post("status") == "admin"){
				redirect('Network');  
		   } 
	}
 
}