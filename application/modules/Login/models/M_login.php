<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_login extends CI_Model{
	function login($user,$pass){  
		$query_select = "SELECT * FROM tm_member
		where
		fc_username ='$user'
		AND fc_password = '".encryptPass($pass)."'
		and fc_approved='Y' and fc_hold='N';";
		$query = $this->db->query($query_select);
		return $query->num_rows();
	}
	function getData($user,$pass){
		$query_select = "SELECT * 
		FROM tm_member 
		where
		fc_username ='".$user."'
		AND fc_password = '".encryptPass($pass)."'
		and fc_approved='Y' and fc_hold='N';";
		$query = $this->db->query($query_select);
		return $query->row();
	}
}