<?php

class Pelanggan extends CI_Controller{

	function __construct(){

	parent::__construct();
	checklogin();
	$this->load->model('Model_pelanggan');

	}

function index(){

		$data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
		$this->template->load('template/template','pelanggan/view_pelanggan' , $data);
	}

function inputpelanggan(){

		$this->load->view('pelanggan/input_pelanggan');
	}

function simpanpelanggan(){
		$kodepelanggan = $this->input->post('kodepelanggan');
		$namapelanggan = $this->input->post('namapelanggan');
		$umur	= $this->input->post('umur');
		$alamat	= $this->input->post('alamat');
		$nomor_hp = $this->input->post('nomor_hp');
		$email = $this->input->post('email');
	

		$data = array(

			'kode_pelanggan' => $kodepelanggan,
			'nama_pelanggan' => $namapelanggan,
			'umur' => $umur,
			'alamat_pelanggan' => $alamat,
			'no_hp' => $nomor_hp,
			'email_pelanggan' => $email
		);

		$simpan = $this->Model_pelanggan->insertPelanggan($data);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Disimpan !
			</div>');
			redirect("pelanggan");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Disimpan !
			</div>');
			redirect("pelanggan");
		}
		
	}

	function editpelanggan(){

		$kodepelanggan = $this->uri->segment(3);
		$data['pelanggan'] = $this->Model_pelanggan->getPelanggan($kodepelanggan)->row_array();
		$this->load->view('pelanggan/edit_pelanggan' , $data);
	}

	function updatepelanggan(){
		$kodepelanggan = $this->input->post('kodepelanggan');
		$namapelanggan = $this->input->post('namapelanggan');
		$umur	= $this->input->post('umur');
		$alamat	= $this->input->post('alamat');
		$nomor_hp = $this->input->post('nomor_hp');
		$email = $this->input->post('email');

		$data = array(

			'kode_pelanggan' => $kodepelanggan,
			'nama_pelanggan' => $namapelanggan,
			'umur' => $umur,
			'alamat_pelanggan' => $alamat,
			'no_hp' => $nomor_hp,
			'email_pelanggan' => $email
		);

		$simpan = $this->Model_pelanggan->updatePelanggan($data , $kodepelanggan);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Diedit !
			</div>');
			redirect("pelanggan");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Diedit !
			</div>');
			redirect("pelanggan");
		}
		
	}

	function hapuspelanggan(){

		$kodepelanggan = $this->uri->segment(3);
		$hapus = $this->Model_pelanggan->deletePelanggan($kodepelanggan);

		if($shapus = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Dihapus !
			</div>');
			redirect("pelanggan");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Dihapus !
			</div>');
			redirect("pelanggan");
		}
	}
}

