<?php
class M_Pembayaran extends CI_Model 
{
	public function get_pembayaran($table){
		return $this->db->get($table);
	}
	function save_data($table,$data){
		return $this->db->insert($table, $data);
	}
	function get_edit($id){
        $query = $this->db->where('id',$id)->get('pembayaran')->row();
        return $query;
    }
	function updated_data($id,$table,$data){
		return $this->db->where('id', $id)
			->update($table, $data);
	}
	public function deleted_pembayaran($id,$table){
		return $this->db->where('id',$id)->delete($table);
	}
}

