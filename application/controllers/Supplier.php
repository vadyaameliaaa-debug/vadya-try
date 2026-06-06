<?php

class supplier extends CI_Controller{


	function __construct(){

	parent::__construct();
	checklogin();
	$this->load->model('Model_supplier');

	}


	function index(){

		$data['supplier'] = $this->Model_supplier->getDataSupplier()->result();
		$this->template->load('template/template','supplier/view_supplier' , $data);
	}

	function inputsupplier(){

		$this->load->view('supplier/input_supplier');
	}


	function simpansupplier(){
		$kodesupplier = $this->input->post('kodesupplier');
		$namasupplier = $this->input->post('namasupplier');
		$alamatsupplier	= $this->input->post('alamatsupplier');
		$nohpsupplier	= $this->input->post('nohpsupplier');
		$emailsupplier = $this->input->post('emailsupplier');
	

		$data = array(

			'kode_supplier' => $kodesupplier,
			'nama_supplier' => $namasupplier,
			'alamat_supplier' => $alamatsupplier,
			'no_hp_supplier' => $nohpsupplier,
			'email_supplier' => $emailsupplier
		);

		$simpan = $this->Model_supplier->insertsupplier($data);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Disimpan !
			</div>');
			redirect("supplier");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Disimpan !
			</div>');
			redirect("supplier");
		}
		
	}

	function editsupplier(){

		$kodesupplier = $this->uri->segment(3);
		$data['supplier'] = $this->Model_supplier->getSupplier($kodesupplier)->row_array();
		$this->load->view('supplier/edit_supplier' , $data);
	}

	function updatesupplier(){
		$kodesupplier = $this->input->post('kodesupplier');
		$namasupplier = $this->input->post('namasupplier');
		$alamatsupplier	= $this->input->post('alamatsupplier');
		$nohpsupplier	= $this->input->post('nohpsupplier');
		$emailsupplier = $this->input->post('emailsupplier');
	

		$data = array(

			'kode_supplier' => $kodesupplier,
			'nama_supplier' => $namasupplier,
			'alamat_supplier' => $alamatsupplier,
			'no_hp_supplier' => $nohpsupplier,
			'email_supplier' => $emailsupplier
		);

		$simpan = $this->Model_supplier->updatesupplier($data , $kodesupplier);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Diedit !
			</div>');
			redirect("supplier");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Diedit !
			</div>');
			redirect("supplier");
		}
		
	}

	function hapussupplier(){

		$kodesupplier = $this->uri->segment(3);
		$hapus = $this->Model_supplier->deleteSupplier($kodesupplier);

		if($shapus = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Dihapus !
			</div>');
			redirect("supplier");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Dihapus !
			</div>');
			redirect("supplier");
		}
	}


}
