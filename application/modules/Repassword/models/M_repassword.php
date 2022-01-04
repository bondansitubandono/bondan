<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_Repassword extends CI_Model{
	private $table = "tm_member";
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
    function update($data,$where){
		$query = $this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}

}