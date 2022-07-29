
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Transaksi','model');
	}

	public function index(){
		if ($this->session->userdata('level') == "admin") {
			$data["transaksi"] = $this->model->get_transaksi('transaksi')->result();
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/transaksi/index',$data);
			$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}
	public function riwayat(){
		if ($this->session->userdata('level') == "admin") {
			$data["transaksi"] = $this->model->get_transaksi('transaksi')->result();
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/transaksi/riwayat',$data);
			$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}
	public function transaksi($id){
		if ($this->session->userdata('level') == "admin") {
		$data['transaksi']=$this->model->get_transaksi('transaksi',$id);
		$this->load->view('pages/client/transaksi',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	
	public function save(){
	if ($this->session->userdata('id') != null) {
		$config['upload_path'] = './assets/file/transaksi';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 3000;
		$config['file_name'] = date('y-m-d:h:m:s').$_FILES['bukti_transfer']['name']; 

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti_transfer')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);

		} else {
			$data = [
			'user_id' => $this->session->userdata('id'),
			'pembayaran_id' => $this->input->post('pembayaran_id'),
			'no_jenis_transaksi' => $this->input->post('nomor'),
			'jumlah_bayar' => $this->input->post('jumlah_bayar'),
			'bukti_transfer' => $config['file_name'],
			'status' => "proses",
			];
			$this->model->insert_transaksi('transaksi', $data);

			array('image_metadata' => $this->upload->data());
			redirect('home/topup');
		}
	}
	else{
		redirect('admin/login');
	}
	
	}
	public function update_file(){
		if ($this->session->userdata('id') != null) {
			$id=$this->input->post('id_transaksi');
			$config['upload_path'] = './assets/file/transaksi';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 3000;
			$config['file_name'] = date('y-m-d:h:m:s').$_FILES['bukti_transfer']['name']; 
			$data['post']=$this->model->get_edit($id);
			if ($_FILES['bukti_transfer']['name']) {
				$config['upload_path'] = './assets/file/transaksi';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 3000;
				$config['file_name'] = date('y-m-d:h:m:s').$_FILES['bukti_transfer']['name']; 
				$this->load->library('upload', $config);
	
				if(file_exists(FCPATH.'assets/file/transaksi/'.$data['post']->bukti_transfer)){
					unlink(FCPATH.'assets/file/transaksi/'.$data['post']->bukti_transfer);
					if (!$this->upload->do_upload('bukti_transfer')) {
						$error = array('error' => $this->upload->display_errors());
					} else {
						
						$data = [
							'bukti_transfer' => $config['file_name'],
							'status' => "proses",
						];
						
						array('image_metadata' => $this->upload->data());
						$this->model->updated_data($id, 'transaksi', $data);
					}
	
				}
				else{
					$config['upload_path'] = './assets/file/transaksi/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 3000;
					$config['file_name'] = date('y-m-d:h:m:s').$_FILES['bukti_transfer']['name']; 
					$this->load->library('upload', $config);
	
					if (!$this->upload->do_upload('bukti_transfer')) {
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
					} else {
						
						$data = [
							'bukti_transfer' => $config['file_name'],
							'status' => "proses",
						];
						
						array('image_metadata' => $this->upload->data());
						$this->model->updated_data($id, 'transaksi', $data);
					}
				}
				
			}
			else{
				$data = [
					'status' => "proses",
				];
				$this->model->updated_data($id, 'transaksi', $data);
			}
			redirect('home/topup');
		}
		else{
			redirect('admin/login');
		}
	}
	public function delete($id){
		if ($this->session->userdata('level') == "admin") {
			$data['post']=$this->model->get_edit($id);
			if(file_exists($lok=FCPATH.'./assets/file/transaksi/'.$data['post']->bukti_transfer)){
				unlink(FCPATH.'/assets/file/transaksi/'.$data['post']->bukti_transfer);
				$this->model->delete_user($id,'transaksi');
			}
			else{
				$this->model->delete_user($id,'transaksi');	
			}
			return redirect('transaksi/index/'.$id);
		}else{
			redirect('admin/login');
			
		}
	}
	public function update_status($id){
		if ($this->session->userdata('level') == "admin") {
		$data = [
			'status' => $this->input->post('status')
		];
		$this->model->updated_data($id, 'transaksi', $data);
		redirect('transaksi/index');
		}else{
			redirect('admin/login');
			
		}
	}
}
