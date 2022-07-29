<?php
class M_Transaksi extends CI_Model 
{
	public function insert_transaksi($table, $data){
		return $this->db->insert($table, $data);
	}
	public function get_transaksi($table){
        return $this->db->join('pembayaran','pembayaran.id=transaksi.pembayaran_id')
		->join('users','users.id = transaksi.user_id')
		->get($table);
	}
	public function get_pembayaran($table, $id){
		return $this->db->where('id',$id)->get($table)->row();
	}
	public function update_transaksi($id,$table, $data){
		return $this->db->where('id_transaksi',$id)->update($table, $data);
	}
	function get_edit($id){
        $query = $this->db->where('id_transaksi',$id)->get('transaksi')->row();
        return $query;
    }
	function updated_data($id,$table,$data){
		return $this->db->where('id_transaksi', $id)
			->update($table, $data);
	}
	public function delete_user($id,$table){
		return $this->db->where('id_transaksi',$id)->delete($table);
	}
}
