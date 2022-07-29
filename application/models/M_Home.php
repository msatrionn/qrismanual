<?php
class M_Home extends CI_Model 
{ 
	protected $table = 'berita';
    public function __construct() {
        parent::__construct();
    }

	function get_post_list($limit, $start){
        $query = $this->db->get('berita', $limit, $start);
        return $query;
    }

	public function get_pembayaran($table){
        return $this->db->join('transaksi','transaksi.pembayaran_id=pembayaran.id')->where('transaksi.user_id',$this->session->userdata('id'))->get($table);
	}
	public function get_pembayaran_all($table){
		return $this->db->get($table);
	}

	public function get_pembayaran_id($table,$id){
        $query = $this->db->where('id',$id)->get($table)->row();
        return $query;
    }

    public function get_users($table) {
        return $this->db->get($table);
    }

    public function get_total_pembayaran() {
        return $this->db->query("select count(id) as total_pembayaran from pembayaran");
    }

    public function get_total_pemesanan() {
        return $this->db->query("select count(id_transaksi) as pemesanan from transaksi");
    }

    public function get_total_diproses() {
        return $this->db->query("select count(id_transaksi) as proses from transaksi where status='proses' ");
    }

    public function get_total_lunas() {
        return $this->db->query("select count(id_transaksi) as lunas from transaksi where status ='lunas' ");
    }
} 
