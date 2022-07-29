<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Home','model');
	}

	public function index(){
		$data['pembayaran']=$this->model->get_pembayaran_all('pembayaran')->result();
		$this->load->view('pages/client/index',$data);
	}

	public function pembayaran($id){
		if ($this->session->userdata('level') == "admin") {
		$data['pembayaran']=$this->model->get_pembayaran_id('pembayaran',$id);
		$this->load->view('pages/client/pembayaran',$data);
		}else{
			redirect('admin/login');
		}
		
	}
	
	public function topup(){
		if ($this->session->userdata('id')!= null) {
			$data['pembayaran']=$this->model->get_pembayaran('pembayaran')->result();
			$this->load->view('pages/client/topup',$data);
		}
		else{
			redirect('admin/login');
		}
	}
	public function about(){
		$this->load->view('pages/client/about');

	}
}

