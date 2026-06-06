<?php

class Penjualan extends CI_Controller{


	function __construct(){

		parent::__construct();
		checklogin();
		$this->load->model('Model_penjualan');
		$this->load->model('Model_pelanggan');
		$this->load->model('Model_barang');
	
	}	


	function index(){
		$data['penjualan'] = $this->Model_penjualan->getDatapenjualan()->result();
		$this->template->load('template/template' , 'penjualan/view_penjualan' , $data);
	}

	function inputpenjualan(){

		$bulan = date('m');
	    $tahun = date('Y');
	    $thn = substr($tahun, 2, 2);
	    $cabang = $this->session->userdata('kode_cabang');
		$getLastFaktur = $this->Model_penjualan->getLastFaktur($bulan , $tahun , $cabang)->row_array();
		$nomorterakhir = $getLastFaktur['no_faktur'];
		$no_faktur = buatkode($nomorterakhir, $cabang . $bulan . $thn, 4);
		$data['no_faktur'] = $no_faktur;
		$data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
		$data['barang'] = $this->Model_barang->getDataBarang()->result();
		$this->template->load('template/template' , 'penjualan/input_penjualan' , $data);

	}

	function cekBarang(){

		$jmldatabarang = $this->Model_penjualan->cekBarang()->num_rows();
		echo $jmldatabarang;

	}

	function simpanbarangtemp(){
		$kode_barang = $this->input->post('kode_barang');
		$harga = $this->input->post('harga');
		$qty = $this->input->post('qty');
		$id_user = $this->input->post('id_user');

		$cekbarangtemp = $this->Model_penjualan->cekBarangtemp($kode_barang, $id_user)->num_rows();
		if($cekbarangtemp > 0){
			echo "1";
		}else{
			$data = array(
				'kode_barang' => $kode_barang,
				'harga' => $harga,
				'qty' => $qty,
				'id_user' => $id_user
			);

			$simpan = $this->Model_penjualan->insertBarangtemp($data);
		}

	}

	function getDatabarangtemp(){
		$id_user = $this->input->post('id_user');
		$data['barangtemp'] = $this->Model_penjualan->getDatabarangtemp($id_user)->result();
		$this->load->view('penjualan/penjualan_detail_temp' , $data);
	}

	function hapusBarangtemp(){
		$kode_barang = $this->input->post('kodebarang');
		$id_user = $this->input->post('iduser');
		$hapus = $this->Model_penjualan->deleteBarangtemp($kode_barang, $id_user);
		echo $hapus;
	}

	function simpanpenjualan(){
		$no_faktur = $this->input->post('no_faktur');
		$tgltransaksi = $this->input->post('tgltransaksi');
		$kode_pelanggan = $this->input->post('kode_pelanggan');
		$jenis_transaksi = $this->input->post('jenis_transaksi');
		$id_user = $this->input->post('id_user');
		$data = array(
			'no_faktur' => $no_faktur,
			'tgltransaksi' => $tgltransaksi,
			'kode_pelanggan' => $kode_pelanggan,
			'jenis_transaksi' => $jenis_transaksi,
			'id_user' => $id_user
		);

		$simpan = $this->Model_penjualan->insertPenjualan($data , $id_user , $jenis_transaksi , $no_faktur);
	}


	function cetakpenjualan(){
		$no_faktur = $this->uri->segment(3);
		$data['penjualan'] = $this->Model_penjualan->getPenjualan($no_faktur)->row_array();
		$data['detail'] = $this->Model_penjualan->getDetailpenjualan($no_faktur)->result();
		$this->load->view('penjualan/cetak_penjualan' , $data);
	}

	function laporanpenjualan(){
		$this->template->load('template/template' , 'penjualan/frm_laporanpenjualan');
	}

	function cetaklaporanpenjualan(){
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['laporanpnj'] = $this->Model_penjualan->getLaporanpenjualan($dari , $sampai)->result();
		//if (isset($_POST['export'])) {
			// Fungsi header dengan mengirimkan raw data excel
     		//header("Content-type: application/vnd-ms-excel");

      		// Mendefinisikan nama file ekspor "hasil-export.xls"
     		//header("Content-Disposition: attachment; filename=Laporan Penjualan.xlsx");
		//}

		$this->load->view('penjualan/cetak_laporanpenjualan' , $data);
	}
}