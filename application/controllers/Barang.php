<?php

class Barang extends CI_Controller{

	function __construct(){

	parent::__construct();
	checklogin();
	$this->load->model('Model_barang');
	$this->load->model('Model_supplier');

	}

	function index(){

		$data['barang'] = $this->Model_barang->getDataBarang()->result();
		$this->template->load('template/template','barang/view_barang' , $data);
	}

	function inputbarang(){

		$data['supplier'] = $this->Model_supplier->getDataSupplier()->result();
		$this->load->view('barang/input_barang' , $data);
	}

	function simpanbarang(){
		$kodebarang = $this->input->post('kodebarang');
		$namabarang = $this->input->post('namabarang');
		$stok	= $this->input->post('stok');
		$satuan	= $this->input->post('satuan');
		$harga_modal = $this->input->post('harga_modal');
		$harga_jual = $this->input->post('harga_jual');
		//$kodesupplier = $this->input->post('kodesupplier');

		$data = array(

			'kode_barang' => $kodebarang,
			'nama_barang' => $namabarang,
			'stok' => $stok,
			'satuan' => $satuan,
			'harga_modal' => $harga_modal,
			'harga_jual' => $harga_jual
			//'kode_supplier' => $kodesupplier
		);

		$simpan = $this->Model_barang->insertBarang($data);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Disimpan !
			</div>');
			redirect("barang");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Disimpan !
			</div>');
			redirect("barang");
		}
		
	}

	function editbarang(){

		$kodebarang = $this->uri->segment(3);
		//$data['supplier'] = $this->Model_supplier->getDataSupplier()->result();
		$data['barang'] = $this->Model_barang->getBarang($kodebarang)->row_array();
		$this->load->view('barang/edit_barang' , $data);
	}

	function updatebarang(){
		$kodebarang = $this->input->post('kodebarang');
		$namabarang = $this->input->post('namabarang');
		$stok	= $this->input->post('stok');
		$satuan	= $this->input->post('satuan');
		$harga_modal = $this->input->post('harga_modal');
		$harga_jual = $this->input->post('harga_jual');
		//$kodesupplier = $this->input->post('kodesupplier');

		$data = array(

			'nama_barang' => $namabarang,
			'stok' => $stok,
			'satuan' => $satuan,
			'harga_modal' => $harga_modal,
			'harga_jual' => $harga_jual
			//'kode_supplier' => $kodesupplier
		);

		$simpan = $this->Model_barang->updateBarang($data , $kodebarang);
		if($simpan = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Diedit !
			</div>');
			redirect("barang");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Diedit !
			</div>');
			redirect("barang");
		}
		
	}

	function hapusbarang(){

		$kodebarang = $this->uri->segment(3);
		$hapus = $this->Model_barang->deleteBarang($kodebarang);

		if($shapus = 1){
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  			Data Berhasil Dihapus !
			</div>');
			redirect("barang");
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
  			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
  			Data Gagal Dihapus !
			</div>');
			redirect("barang");
		}
	}
}