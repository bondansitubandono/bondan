<?php 
if(!defined('BASEPATH')) exit('Maaf akses anda kami tutup.');
class M_model extends CI_Model{
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

	function omzet(){
		$hasil = "";
		$data = $this->db->query("select sum(fn_total) as total from t_history_ticket where DATE_FORMAT(fd_transaksi,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')
		");
		foreach ($data->result() as $row) {
			$hasil = $row->total;
		}
		return $hasil;
	}

	function topup($data){
		$exec = $this->db->query("update tm_ticket set fn_saldo=fn_saldo+".$data['fn_topup'].",fn_request=0,fn_total=0,fc_proses='Y' where fc_member='".$data['fc_member']."'");
		if($exec){
			$this->db->query("insert into t_message set fc_member='".$data['fc_member']."',fc_jenis='TOPUP',fv_message='TopUp ".$data['fn_topup']." ticket senilai ".$data['fn_total']."',fd_message=NOW()");
			$this->db->query("insert into t_history_ticket set fc_member='".$data['fc_member']."',fd_transaksi=NOW(),fn_topup='".$data['fn_topup']."',fn_total=".decimal($data['fn_total']));
			return true;
		}else{
			return false;
		}
	}
	function history($kode){
		$query = $this->db->where(array("fc_member"=>$kode,"fc_jenis"=>"TOPUP"))->get("t_message");
		if($query->num_rows()>0)
        { return $query->result();}
        else{return false;}
	}
	//ini khusus untuk datatablenya
    function allposts_count($tabel,$where)
    {   
		$query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_ticket.fn_saldo,tm_ticket.fn_request,tm_ticket.fn_total,tm_ticket.fd_request,tm_ticket.fc_proses,tm_bank.fv_bank")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_ticket","tm_ticket.fc_member=tm_member.fc_member","left")
		->join("tm_bank","tm_bank.fc_bank=tm_member.fc_bank")
		->where($where)->get($tabel);
        return $query->num_rows();  
    } 
    function allposts($tabel,$limit,$start,$col,$dir,$where)
    {   
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_ticket.fn_saldo,tm_ticket.fn_request,tm_ticket.fn_total,tm_ticket.fd_request,tm_ticket.fc_proses,tm_bank.fv_bank")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_ticket","tm_ticket.fc_member=tm_member.fc_member","left")
		->join("tm_bank","tm_bank.fc_bank=tm_member.fc_bank")
		->where($where)->limit($limit,$start)->order_by($col,$dir)->get($tabel);
        if($query->num_rows()>0)
        { return $query->result();}
        else{return null;}
    }
    function posts_search($tabel,$field1,$field2,$limit,$start,$search,$col,$dir,$where)
    {
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_ticket.fn_saldo,tm_ticket.fn_request,tm_ticket.fn_total,tm_ticket.fd_request,tm_ticket.fc_proses,tm_bank.fv_bank")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_ticket","tm_ticket.fc_member=tm_member.fc_member","left")
		->join("tm_bank","tm_bank.fc_bank=tm_member.fc_bank")
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
        $query = $this->db->select("tm_member.*,tm_province.fv_province,tm_city.fv_city,fc_jenis,tm_ticket.fn_saldo,tm_ticket.fn_request,tm_ticket.fn_total,tm_ticket.fd_request,tm_ticket.fc_proses,tm_bank.fv_bank")
		->join("tm_province","tm_province.fc_province=tm_member.fc_province",'left')
		->join("tm_city","tm_city.fc_city=tm_member.fc_city",'left')
		->join("tm_ticket","tm_ticket.fc_member=tm_member.fc_member","left")
		->join("tm_bank","tm_bank.fc_bank=tm_member.fc_bank")
		->where($where)->group_start()->like($field1,$search)->or_like($field2,$search)->group_end()->get($tabel);
        
        return $query->num_rows();  }
}