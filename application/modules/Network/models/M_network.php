<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_network extends CI_Model{
	private $table = "tm_member";
	function getStatus_member($status){
		switch ($status) {
			case 'Active':
//				$query = $this->db->where(array("fc_approved"=>"Y","fc_hold"=>"N","fc_referral_from"=> $this->session->userdata('fc_referral_id')))->get($this->table);
$e= $this->uri->segment(4);
$query = "SELECT * FROM(
	SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
	, t1.fc_referral_from, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
	, t1.fc_referral_id AS path
	FROM tm_member AS t1 
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
	,t2.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
	,t3.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
	,t4.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
	,t5.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
	,t6.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
	,t7.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
	JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
	,t8.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
	JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
	JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
	,t9.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
	JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
	JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
	JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	UNION ALL
	SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
	,t10.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
	t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
	, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
	FROM tm_member AS t1
	JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
	JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
	JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
	JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
	JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
	JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
	JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
	JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
	JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
	JOIN tm_province AS p ON p.fc_province =t1.fc_province
	JOIN tm_city AS c ON c.fc_city =t1.fc_city
	WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
	) as no WHERE no.level ='".$e."'";
	$query = $this->db->query($query);
   

break;
			case 'InActive':
				$query = $this->db->where(array("fc_approved"=>"Y","fc_hold"=>"Y","fc_referral_from"=> $this->session->userdata('fc_referral_id')))->get($this->table);
				break;
			case 'Pending':
				$query = $this->db->where(array("fc_approved"=>"N","fc_hold"=>"N","fc_referral_from"=> $this->session->userdata('fc_referral_id')))->get($this->table);
				break; 
		} 
		return $query->num_rows();
	}
	function customeQuery($query){
		return $this->db->query($query); 
	}
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
		$query = " SELECT  * FROM (
			SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
			, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, t1.fc_referral_id AS path
			FROM tm_member AS t1 
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
			,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
			,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
			,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
			,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
			,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
			,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
			,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
			,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
			,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			) as no WHERE level ='".$this->uri->segment(4)."'  ";
			$query = $this->db->query($query);
       
        return $query->num_rows();  
    } 
	function allposts_count4($tabel,$where,$app,$hold)
    {   
		$query = " SELECT  * FROM (
			SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
			, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, t1.fc_referral_id AS path
			FROM tm_member AS t1 
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
			,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
			,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
			,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
			,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
			,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
			,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
			,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
			,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
			,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			) as no WHERE level ='".$this->uri->segment(4)."' AND fc_approved ='".$app."' AND fc_hold='".$hold."' ";
			$query = $this->db->query($query);
       
        return $query->num_rows();  
    } 
	
	function allposts_count3($tabel,$where)
    {   
		$query = "SELECT * FROM(
		SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
		, t1.fc_referral_from, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, t1.fc_referral_id AS path
		FROM tm_member AS t1 
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
		,t2.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
		,t3.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
		,t4.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
		,t5.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
		,t6.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
		,t7.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
		,t8.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
		,t9.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
		,t10.fc_referral_from, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
		JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		) as no WHERE level ='".$this->uri->segment(4)."'";
		$query = $this->db->query($query);
       
        return $query->num_rows();  
    } 
    function allposts2($limit,$start,$order,$dir,$where )
    {
        $query = " SELECT  * FROM (
		SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
		, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, t1.fc_referral_id AS path
		FROM tm_member AS t1 
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
		,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
		,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
		,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
		,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
		,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
		,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
		,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
		,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
		UNION ALL
		SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
		,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
		t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
		, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
		FROM tm_member AS t1
		JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
		JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
		JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
		JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
		JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
		JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
		JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
		JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
		JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
		JOIN tm_province AS p ON p.fc_province =t1.fc_province
		JOIN tm_city AS c ON c.fc_city =t1.fc_city
		WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."' 
		) as no  WHERE level ='".$this->uri->segment(4)."'  Limit ".$start.",".$limit."  ";
		$query = $this->db->query($query);
        if($query->num_rows()>0)
        { return $query->result();}
        else{return null;}
    }

    
	function posts_search($tabel,$field1,$field2,$limit,$start,$search,$col,$dir,$where)
    {
		$query = " SELECT  * FROM (
			SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
			, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, t1.fc_referral_id AS path
			FROM tm_member AS t1 
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
			,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
			,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
			,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
			,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
			,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
			,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
			,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
			,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
			,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			
			) as no WHERE level='".$this->uri->segment(4)."'  AND ( fv_member like '%".$search."%' OR fv_city like '%".$search."%' OR fv_province like '%".$search."%' )  ";
			$query = $this->db->query($query);
			if($query->num_rows()>0)
			{ return $query->result();}
			else{return null;}
		}
	
		

    function posts_search_count($tabel,$field1,$field2,$search,$where)
    {   
		$query = " SELECT  * FROM (
			SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
			, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, t1.fc_referral_id AS path
			FROM tm_member AS t1 
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
			,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
			,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
			,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
			,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
			,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
			,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
			,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
			,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			UNION ALL
			SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
			,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
			JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
			JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
			JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
			JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
			JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
			JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
			JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
			JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='".$this->session->userdata('fc_referral_id')."'
			
			) as no WHERE level='".$this->uri->segment(4)."'  AND '".$field1."' like '%".$search."%' OR '".$field2."' like '%".$search."%' ";
						$query = $this->db->query($query);
        return $query->num_rows();  }

}
