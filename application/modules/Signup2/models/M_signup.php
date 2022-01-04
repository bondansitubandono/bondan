<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_signup extends CI_Model{
	private $table = "tm_member";
	private $table2 = "t_referral";
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
    function update($data2,$where2){
		$query2 = $this->db->update($this->table2,$data2,$where2);
		return $this->db->affected_rows();
    }
    function customeQuery($query){
		return $this->db->query($query); 
	}

}