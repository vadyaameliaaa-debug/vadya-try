<?php

class Users extends CI_Controller{

	function __construct(){

	parent::__construct();
	checklogin();
	$this->load->model('Model_users');
	$this->load->model('Model_cabang');

	}

	function index(){
		$data['users'] = $this->Model_users->getDataUsers()->result();
		$this->template->load('template/template','users/view_users' , $data);
	}

	function inputusers(){

		$data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$this->load->view('users/input_users' , $data);
	}

	function simpanusers(){
		$idusers = $this->input->post('idusers');
		$namalengkap = $this->input->post('namalengkap');
		$nohp	= $this->input->post('nohp');
		$username	= $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$kodecabang = $this->input->post('kodecabang');

		$data = array(

			'id_user' => $idusers,
			'nama_lengkap' => $namalengkap,
			'no_hp' => $nohp,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'kode_cabang' => $kodecabang
		);

		$simpan = $this->Model_users->insertUsers($data);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Disimpan !
			</div>');
			redirect("users");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Disimpan !
			</div>');
			redirect("users");
		}
		
	}

	function editusers(){

		$idusers = $this->uri->segment(3);
		$data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$data['users'] = $this->Model_users->getUsers($idusers)->row_array();
		$this->load->view('users/edit_users' , $data);
	}

	function updateusers(){
		$idusers = $this->input->post('idusers');
		$namalengkap = $this->input->post('namalengkap');
		$nohp	= $this->input->post('nohp');
		$username	= $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$kodecabang = $this->input->post('kodecabang');

		$data = array(

			'id_user' => $idusers,
			'nama_lengkap' => $namalengkap,
			'no_hp' => $nohp,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'kode_cabang' => $kodecabang
		);

		$simpan = $this->Model_users->updateUsers($data , $idusers);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Diedit !
			</div>');
			redirect("users");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Diedit !
			</div>');
			redirect("users");
		}
		
	}

	function hapususers(){

		$idusers = $this->uri->segment(3);
		$hapus = $this->Model_users->deleteUsers($idusers);

		if($shapus = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Dihapus !
			</div>');
			redirect("users");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Dihapus !
			</div>');
			redirect("users");
		}
	}
}