<?php defined('BASEPATH') OR exit('Maaf akses anda kami tutup');
error_reporting(0);
class Signup extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_signup');
		
        $this->load->helper('captcha');
	}
	public function index($error = null){	
        $this->load->helper('captcha');
		$cap = $this->buat_captcha();
		$datas['cap_img'] = $cap['image'];
		$this->session->set_userdata('kode_captcha', $cap['word']);	
			//is_logged();
		$data = array(
			'subtitle' => 'Register',
			'error' => $error,
			'cap_img' => $cap['image']
		); 
		loadView("v_view",$data,0,0); 
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
	
	public function getCity(){
		$data = "<option value=''>Pilih</option>";
		foreach (getCity($this->uri->segment(3)) as $key => $value) {
			$data .= "<option value='".$key."'>".$value."</option>";
		}
		echo $data;
	}
	public function cekKode(){
        date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d");
		$query = $this->db->query("SELECT * FROM t_referral WHERE fd_join= '$date' ");
		foreach ($query->result() as $host) {
			$tmp = $host->fc_referral_id;
		}
        $json_data = array(                 
                    "no"            => $tmp
                    ); 
        echo json_encode($json_data); 
		
	}

	public function Simpan($data){ 
		$data_mail = array(
			"fv_member" => $this->input->post("mem_name"),
			"fc_gender" => $this->input->post("mem_gender"),
			"fc_province" => $this->input->post("mem_provinsi"),
			"fv_province" => $this->input->post("label_provinsi"),
			"fc_city" => $this->input->post("mem_kab"),
			"fv_city" => $this->input->post("label_kota"),
			"fv_addr" => $this->input->post("mem_addr"),
			"fc_username" => $this->input->post("mem_username"),
			"fc_password" =>$this->input->post("mem_password"),
			"fc_mail" => $this->input->post("mem_mail"),
			"fc_phone" => $this->input->post("mem_wa"),
			"fc_level" => 2,
			"fc_referral_from" => $this->input->post("ref_code"),
			"fc_bank" => $this->input->post("mem_bank"),
			"fv_bank" => $this->input->post("label_bank"),
			"fc_norek" => $this->input->post("mem_no_rekening"),
			"fv_name_rek" => $this->input->post("mem_nama_rekening")  
		);
		$config = Array(  
		'protocol' => 'smtp',  
		'smtp_host' => getSetup("SMTP_HOST"),  
		'smtp_port' => 465,  
		'smtp_user' => getSetup("SMTP_MAIL"),   
		'smtp_pass' => getSetup("SMTP_PASS"),   
		'mailtype' => 'html',   
		'charset' => 'iso-8859-1'  
		);  
		   $this->load->library('email', $config);  
		   $this->email->set_newline("\r\n");  
		   $this->email->from(getSetup("SMTP_MAIL"), 'CSP Network');   
		   $this->email->to($this->input->post("mem_mail"));   
		   $this->email->subject('Verifikasi email CSP Network');   
		   $this->email->message($this->data_mail($data_mail));  
		   if (!$this->email->send()) {   
					$this->session->set_flashdata('status', 'Pendaftaran gagal');
					$this->session->set_flashdata('msg', 'Email tidak terdaftar '.getSetup("SMTP_MAIL"));   
		   }else{
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
					"fc_refferal_id" => random_string('alnum', 10),
					"fc_bank" => $this->input->post("mem_bank"),
					"fc_norek" => $this->input->post("mem_no_rekening"),
					"fv_name_rek" => $this->input->post("mem_nama_rekening"),
					"fc_approved" => "Y",
					"fc_hold" => "N",
					"fc_password" => encryptPass($this->input->post("mem_password")),
					"fd_join" => date("Y-m-d h:i:s")
				);   
				
		$kd_captcha 	= $this->input->post('kode_captcha');
				$proses = $this->M_signup->tambah($data,"tm_member");
				if ($proses > 0 && $kd_captcha == $this->session->userdata('kode_captcha')) {
					$this->session->set_flashdata('status', 'Pendaftaran berhasil');
					$this->session->set_flashdata('msg', 'silahkan check email untuk melakukan verifikasi.');
				}else{
					$this->session->set_flashdata('status', 'Pendaftaran gagal');
					$this->session->set_flashdata('msg', 'silahkan check inputan anda'); 
				}  
		   }  
		   if($this->input->post("status") == "member"){
				redirect('Signup');
		   } else if($this->input->post("status") == "admin"){
				redirect('Member');  
		   } 
	}

	public function data_mail($data = null){
		$content = "";
		if($data != null){
			$content='<!doctype html>
			<html>
			  <head>
				<meta name="viewport" content="width=device-width" />
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<title></title>
				<style>
				  /* -------------------------------------
					  GLOBAL RESETS
				  ------------------------------------- */
				  
				  /*All the styling goes here*/
				  
				  img {
					border: none;
					-ms-interpolation-mode: bicubic;
					max-width: 100%; 
				  }
			
				  body {
					background-color: #f6f6f6;
					font-family: sans-serif;
					-webkit-font-smoothing: antialiased;
					font-size: 14px;
					line-height: 1.4;
					margin: 0;
					padding: 0;
					-ms-text-size-adjust: 100%;
					-webkit-text-size-adjust: 100%; 
				  }
			
				  table {
					border-collapse: separate;
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					width: 100%; }
					table td {
					  font-family: sans-serif;
					  font-size: 14px;
					  vertical-align: top; 
				  }
			
				  /* -------------------------------------
					  BODY & CONTAINER
				  ------------------------------------- */
			
				  .body {
					background-color: #f6f6f6;
					width: 100%; 
				  }
			
				  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
				  .container {
					display: block;
					margin: 0 auto !important;
					/* makes it centered */
					max-width: 580px;
					padding: 10px;
					width: 580px; 
				  }
			
				  /* This should also be a block element, so that it will fill 100% of the .container */
				  .content {
					box-sizing: border-box;
					display: block;
					margin: 0 auto;
					max-width: 580px;
					padding: 10px; 
				  }
			
				  /* -------------------------------------
					  HEADER, FOOTER, MAIN
				  ------------------------------------- */
				  .main {
					background: #ffffff;
					border-radius: 3px;
					width: 100%; 
				  }
			
				  .wrapper {
					box-sizing: border-box;
					padding: 20px; 
				  }
			
				  .content-block {
					padding-bottom: 10px;
					padding-top: 10px;
				  }
			
				  .footer {
					clear: both;
					margin-top: 10px;
					text-align: center;
					width: 100%; 
				  }
					.footer td,
					.footer p,
					.footer span,
					.footer a {
					  color: #999999;
					  font-size: 12px;
					  text-align: center; 
				  }
			
				  /* -------------------------------------
					  TYPOGRAPHY
				  ------------------------------------- */
				  h1,
				  h2,
				  h3,
				  h4 {
					color: #000000;
					font-family: sans-serif;
					font-weight: 400;
					line-height: 1.4;
					margin: 0;
					margin-bottom: 30px; 
				  }
			
				  h1 {
					font-size: 35px;
					font-weight: 300;
					text-align: center;
					text-transform: capitalize; 
				  }
			
				  p,
				  ul,
				  ol {
					font-family: sans-serif;
					font-size: 14px;
					font-weight: normal;
					margin: 0;
					margin-bottom: 15px; 
				  }
					p li,
					ul li,
					ol li {
					  list-style-position: inside;
					  margin-left: 5px; 
				  }
			
				  a {
					color: #3498db;
					text-decoration: underline; 
				  }
			
				  /* -------------------------------------
					  BUTTONS
				  ------------------------------------- */
				  .btn {
					box-sizing: border-box;
					width: 100%; }
					.btn > tbody > tr > td {
					  padding-bottom: 15px; }
					.btn table {
					  width: auto; 
				  }
					.btn table td {
					  background-color: #ffffff; 
					  text-align: left; 
				  }
					.btn a {
					  background-color: #ffffff;
					  border: solid 1px #3498db;
					  border-radius: 5px;
					  box-sizing: border-box;
					  color: #3498db;
					  cursor: pointer;
					  display: inline-block;
					  font-size: 14px;
					  font-weight: bold;
					  margin: 0;
					  padding: 12px 25px;
					  text-decoration: none;
					  text-transform: capitalize; 
				  }
			
				  /* .btn-primary table td {
					background-color: #3498db; 
				  } */
			
				  .btn-primary a {
					background-color: #3498db;
					border-color: #3498db;
					color: #ffffff; 
				  }
			
				  /* -------------------------------------
					  OTHER STYLES THAT MIGHT BE USEFUL
				  ------------------------------------- */
				  .last {
					margin-bottom: 0; 
				  }
			
				  .first {
					margin-top: 0; 
				  }
			
				  .align-center {
					text-align: center; 
				  }
			
				  .align-right {
					text-align: right; 
				  }
			
				  .align-left {
					text-align: left; 
				  }
			
				  .clear {
					clear: both; 
				  }
			
				  .mt0 {
					margin-top: 0; 
				  }
			
				  .mb0 {
					margin-bottom: 0; 
				  }
			
				  .preheader {
					color: transparent;
					display: none;
					height: 0;
					max-height: 0;
					max-width: 0;
					opacity: 0;
					overflow: hidden;
					mso-hide: all;
					visibility: hidden;
					width: 0; 
				  }
			
				  .powered-by a {
					text-decoration: none; 
				  }
			
				  hr {
					border: 0;
					border-bottom: 1px solid #f6f6f6;
					margin: 20px 0; 
				  }
			
				  /* -------------------------------------
					  RESPONSIVE AND MOBILE FRIENDLY STYLES
				  ------------------------------------- */
				  @media only screen and (max-width: 620px) {
					table[class=body] h1 {
					  font-size: 28px !important;
					  margin-bottom: 10px !important; 
					}
					table[class=body] p,
					table[class=body] ul,
					table[class=body] ol,
					table[class=body] td,
					table[class=body] span,
					table[class=body] a {
					  font-size: 16px !important; 
					}
					table[class=body] .wrapper,
					table[class=body] .article {
					  padding: 10px !important; 
					}
					table[class=body] .content {
					  padding: 0 !important; 
					}
					table[class=body] .container {
					  padding: 0 !important;
					  width: 100% !important; 
					}
					table[class=body] .main {
					  border-left-width: 0 !important;
					  border-radius: 0 !important;
					  border-right-width: 0 !important; 
					}
					table[class=body] .btn table {
					  width: 100% !important; 
					}
					table[class=body] .btn a {
					  width: 100% !important; 
					}
					table[class=body] .img-responsive {
					  height: auto !important;
					  max-width: 100% !important;
					  width: auto !important; 
					}
				  }
			
				  /* -------------------------------------
					  PRESERVE THESE STYLES IN THE HEAD
				  ------------------------------------- */
				  @media all {
					.ExternalClass {
					  width: 100%; 
					}
					.ExternalClass,
					.ExternalClass p,
					.ExternalClass span,
					.ExternalClass font,
					.ExternalClass td,
					.ExternalClass div {
					  line-height: 100%; 
					}
					.apple-link a {
					  color: inherit !important;
					  font-family: inherit !important;
					  font-size: inherit !important;
					  font-weight: inherit !important;
					  line-height: inherit !important;
					  text-decoration: none !important; 
					}
					#MessageViewBody a {
					  color: inherit;
					  text-decoration: none;
					  font-size: inherit;
					  font-family: inherit;
					  font-weight: inherit;
					  line-height: inherit;
					} 
					.btn-primary a:hover {
					  background-color: #34495e !important;
					  border-color: #34495e !important; 
					} 
				  }
			
				</style>
			  </head>
			  <body class="">
				<span class="preheader">Data registrasi anda telah berhasil kami terima</span>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
				  <tr>
					<td>&nbsp;</td>
					<td class="container">
					  <div class="content">
			
						<!-- START CENTERED WHITE CONTAINER -->
						<table role="presentation" class="main">
			
						  <!-- START MAIN CONTENT AREA -->
						  <tr>
							<td class="wrapper">
							  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
								<tr>
								  <td>
									<p>Dear <span style="color: red;">'.strtoupper($data['fv_member']).'</span></p>
									<p>Pendaftaran member anda berhasil.Berikut kami lampirkan user & password untuk login anda:</p>
									<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
									  <tbody>
										<tr>
										  <td align="left">
											<table role="presentation" border="0" cellpadding="10" cellspacing="0">
											  <tbody>
												  <tr><td style="text-align: right;">Kode.Sponsor</td><td>:</td><td>'.strtoupper($data['fc_referral_from']).'</td></tr>
												  <tr><td style="text-align: right;">Nama</td><td>:</td><td>'.strtoupper($data['fv_member']).'</td></tr> 
												  <tr><td style="text-align: right;">Alamat Lengkap</td><td>:</td><td>'.$data['fv_addr'].'-'.$data['fv_city'].' '.$data['fv_province'].' </td></tr>
												  <tr><td style="text-align: right;">Bank</td><td>:</td><td>'.$data['fv_bank'].'</td></tr>  
												  <tr><td style="text-align: right;">Nama Rekening</td><td>:</td><td>'.$data['fv_name_rek'].'</td></tr>
												  <tr><td style="text-align: right;">Nomor Rekening</td><td>:</td><td>'.$data['fc_norek'].'</td></tr>
												  <tr><td style="text-align: right;">Telp</td><td>:</td><td>'.$data['fc_phone'].'</td></tr>
												  <tr><td style="text-align: right;">Password</td><td>:</td><td>'.$data['fc_password'].'</td></tr>
												  <tr><td style="text-align: right;">Username</td><td>:</td><td>'.$data['fc_username'].'</td></tr>
												<tr><td></td><td></td>
												  <td> <a href="'.site_url().'Login" target="_blank">Klik disini untuk login</a> </td>
												</tr>
											  </tbody>
											</table>
										  </td>
										</tr>
									  </tbody>
									</table>
									<p style="text-align: left;">Simpan identitas anda dengan baik jangan sampai berpindah tangan kepada orang-orang yang tidak bertanggung jawab.</p>
									<p style="text-align: center;">Salam Profit bersama CSP "COMMUNITY SHARE PROFIT".</p>
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
			
						<!-- END MAIN CONTENT AREA -->
						</table>
						<!-- END CENTERED WHITE CONTAINER -->
			
						<!-- START FOOTER -->
						<div class="footer">
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
							<tr>
							  <td class="content-block">
								<span class="apple-link">@2020. CSP "COMMUNITY SHARE PROFIT" Team</span> 
							  </td>
							</tr> 
						  </table>
						</div>
						<!-- END FOOTER -->
			
					  </div>
					</td>
					<td>&nbsp;</td>
				  </tr>
				</table>
			  </body>
			</html>';
		}
		
		return $content;
	}


}