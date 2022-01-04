<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_home extends CI_Model{
	private $table = "t_referral";
	function tambah($data,$table =null){
        $table_data = "";
        if($table == null){
            $table_data = $this->table;
        }else{
            $table_data = $table;
        }  
        $this->db->insert($table_data,$data);
		return $this->db->affected_rows();
	}
}