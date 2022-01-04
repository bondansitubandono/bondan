<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_member extends CI_Model{
	private $table = "tm_member";
	function getStatus_member($status){
		switch ($status) {
			case 'Active':
				$query = $this->db->where(array("fc_approved"=>"Y","fc_hold"=>"N"))->get($this->table);
				break;
			case 'InActive':
				$query = $this->db->where(array("fc_approved"=>"Y","fc_hold"=>"Y"))->get($this->table);
				break;
			case 'Pending':
				$query = $this->db->where(array("fc_approved"=>"N","fc_hold"=>"N"))->get($this->table);
				break; 
		} 
		return $query->num_rows();
	}
	function updateStatus($data,$where){
		$this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}
	function hapus($where){
        $table_data = $this->table;
		$this->db->where($where);
		$this->db->delete($table_data);
		return $this->db->affected_rows();
    }
	//ini khusus untuk datatablenya
    function allposts_count($tabel,$where)
    {   
		$query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_level.fv_level")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_level","tm_level.fc_level=tm_member.fc_level",'left')
		->where($where)->get($tabel);
        return $query->num_rows();  
    } 
    function allposts($tabel,$limit,$start,$col,$dir,$where)
    {   
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_level.fv_level")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_level","tm_level.fc_level=tm_member.fc_level",'left')
		->where($where)->limit($limit,$start)->order_by($col,$dir)->get($tabel);
        if($query->num_rows()>0)
        { return $query->result();}
        else{return null;}
    }
    function posts_search($tabel,$field1,$field2,$limit,$start,$search,$col,$dir,$where)
    {
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_level.fv_level")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_level","tm_level.fc_level=tm_member.fc_level",'left')
		->where($where)
        ->group_start()
         ->like($field1,$search)
         ->or_like($field2,$search)
        ->group_end()
         ->limit($limit,$start)
         ->order_by($col,$dir)->get($tabel);
        if($query->num_rows()>0)
        { return $query->result(); }
        else { return null; }
    } 
    function posts_search_count($tabel,$field1,$field2,$search,$where)
    {   
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_level.fv_level")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_level","tm_level.fc_level=tm_member.fc_level",'left')
		->where($where)->group_start()->like($field1,$search)->or_like($field2,$search)->group_end()->get($tabel);
        
        return $query->num_rows();  }
}