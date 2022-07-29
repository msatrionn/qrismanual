<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Login','model');
	}
	public function login_post(){
		$username    = $this->input->post('username');
		$password 	 = md5($this->input->post('password'));
		$validate= $this->model->validasi_login($username,$password,'users');
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$name  = $data['username'];
			$sesdata = array(
				'id'=> $data['id'],
				'username'  => $name,
				'level'  => $data['level'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			redirect('home');

		}else{
			echo $this->session->set_flashdata('msg','Username atau Password salah');
			redirect('admin/login');
		}
	}
	public function register_post(){
		$data=[
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'level'=>"user",
			'no_telp'=>$this->input->post('no_telp'),
		];
		$this->model->save_registrasi_data('users', $data);
		echo $this->session->set_flashdata('msg','Registrasi berhasil');
		redirect('admin/login');
  	}
	public function logout(){
		echo $this->session->set_flashdata('msg', '<p>Silahkan Login</p>' );
		$this->session->sess_destroy();
		redirect('home');
	}

	public function delete_data_user($id){
		// if ($this->session->userdata('id_user') != null) {
			$this->model->delete_user($id,'users');
			return redirect('admin/index/'.$id);
		// }else{
		// 	redirect('admin/login');
			
		// }
	}
}
