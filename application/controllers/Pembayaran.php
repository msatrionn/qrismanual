
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Pembayaran','model');
	}
	public function index(){
		if ($this->session->userdata('level') == "admin") {
			$data["pembayaran"] = $this->model->get_pembayaran('pembayaran')->result();
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/pembayaran/index',$data);
			$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}
	public function create(){
		if ($this->session->userdata('level') == "admin") {
		$this->load->view('pages/admin/layouts/header');
		$this->load->view('pages/admin/pembayaran/create');
		$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}
	public function simpan(){
		if ($this->session->userdata('level') == "admin") {
		$config['upload_path'] = './assets/file/pembayaran';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 3000;
		$config['file_name'] = date('y-m-d_h_m_s')."image"; 

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('qris')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);

		} else {
			$data = [
			'nama_pembayaran' => $this->input->post('nama_pembayaran'),
			'deskripsi' => $this->input->post('deskripsi'),
			'qris' => $config['file_name'],
			];
			$this->model->save_data('pembayaran', $data);

			array('image_metadata' => $this->upload->data());
			redirect('pembayaran/index');
		}
	}else{
			redirect('admin/login');
		}
		
	}
	public function edit($id){
		if ($this->session->userdata('level') == "admin") {
			$data['edit']=$this->model->get_edit($id);
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/pembayaran/edit',$data);
			$this->load->view('pages/admin/layouts/footer');
		}
		else{
			redirect('admin/login');
		}
	
	}
	public function update(){
		if ($this->session->userdata('level') == "admin") {
			$id=$this->input->post('id');
			$config['upload_path'] = './assets/file/pembayaran';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 3000;
			$config['file_name'] = date('y-m-d_h_m_s')."image"; 
			$data['post']=$this->model->get_edit($id);
			if ($_FILES['qris']['name']) {
				$config['upload_path'] = './assets/file/pembayaran';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 3000;
				$config['file_name'] = date('y-m-d_h_m_s')."image"; 
				$this->load->library('upload', $config);
	
				if(file_exists(FCPATH.'assets/file/pembayaran/'.$data['post']->qris)){
					unlink(FCPATH.'assets/file/pembayaran/'.$data['post']->qris);
					if (!$this->upload->do_upload('qris')) {
						$error = array('error' => $this->upload->display_errors());
					} else {
						
						$data = [
							'nama_pembayaran' => $this->input->post('nama_pembayaran'),
							'deskripsi' => $this->input->post('deskripsi'),
							'qris' => $config['file_name'],
						];
						
						array('image_metadata' => $this->upload->data());
						$this->model->updated_data($id, 'pembayaran', $data);
					}
	
				}
				else{
					$config['upload_path'] = './assets/file/pembayaran/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 3000;
					$config['file_name'] = date('y-m-d_h_m_s')."image"; 
					$this->load->library('upload', $config);
	
					if (!$this->upload->do_upload('qris')) {
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
					} else {
						
						$data = [
							'nama_pembayaran' => $this->input->post('nama_pembayaran'),
							'deskripsi' => $this->input->post('deskripsi'),
							'qris' => $config['file_name'],
						];
						
						array('image_metadata' => $this->upload->data());
						$this->model->updated_data($id, 'pembayaran', $data);
					}
				}
				
			}
			else{
				$data = [
					'nama_pembayaran' => $this->input->post('nama_pembayaran'),
				];
				$this->model->updated_data($id, 'pembayaran', $data);
			}
			redirect('pembayaran/index');
		}else{
			redirect('admin/login');
			
		}
	}
	public function delete($id){
		if ($this->session->userdata('level') == "admin") {
			$data['post']=$this->model->get_edit($id);
			if(file_exists($lok=FCPATH.'./assets/file/pembayaran/'.$data['post']->qris)){
				unlink(FCPATH.'/assets/file/pembayaran/'.$data['post']->qris);
				$this->model->deleted_pembayaran($id,'pembayaran');
			}

			else{
				$this->model->deleted_pembayaran($id,'pembayaran');
				
			}
			return redirect('pembayaran/index/'.$id);
		}else{
			redirect('admin/login');
			
		}
	}
}
