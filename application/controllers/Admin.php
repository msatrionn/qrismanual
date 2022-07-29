<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Home','model');
		$this->load->library("pagination");
	}
	public function login(){
		$this->load->view('login/login');
	}
	
	public function register(){
		$this->load->view('login/register');
	}

	public function index(){
		if ( $this->session->userdata('level')=="admin") {
			$data['total_pembayaran']=$this->model->get_total_pembayaran()->row();
			$data['pemesanan']=$this->model->get_total_pemesanan()->row();
			$data['diproses']=$this->model->get_total_diproses()->row();
			$data['lunas']=$this->model->get_total_lunas()->row();
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/index',$data);
			$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}

	public function user(){
		if ( $this->session->userdata('level')=="admin") {
			$data['user']=$this->model->get_users('users')->result();
			$this->load->view('pages/admin/layouts/header');
			$this->load->view('pages/admin/user/index',$data);
			$this->load->view('pages/admin/layouts/footer');
		}else{
			redirect('admin/login');
		}
	}
	
}
