<?php

class Model_penjualan extends CI_Model{

function cekBarang(){

	$id_user = $this->session->userdata('id_user');
	return $this->db->get_where('penjualan_detail_temp',array('id_user' => $id_user));

}

function getLastFaktur($bulan , $tahun , $cabang){

	$bulan = date('m');
	$tahun = date('Y');
	$cabang = $this->session->userdata('kode_cabang');
	$this->db->select('no_faktur');
	$this->db->from('penjualan');
	$this->db->where('kode_cabang' , $cabang);
	$this->db->where('MONTH(tgltransaksi)' , $bulan);
	$this->db->where('YEAR(tgltransaksi)' , $tahun);
	$this->db->order_by('no_faktur' , 'desc');
	$this->db->join('users' , 'penjualan.id_user = users.id_user');
	$this->db->limit(1);
	return $this->db->get();
}

function cekBarangtemp($kode_barang, $id_user){
	return $this->db->get_where('penjualan_detail_temp', array('kode_barang'=>$kode_barang, 'id_user'=>$id_user));
}

function insertBarangtemp($data){
	$this->db->insert('penjualan_detail_temp' , $data);
}

function getDatabarangtemp($id_user){
	$this->db->select('penjualan_detail_temp.kode_barang,nama_barang,harga,qty,(qty * harga) as total,id_user');
	$this->db->from('penjualan_detail_temp');
	$this->db->join('barang_master' , 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
	$this->db->where('id_user', $id_user);
	return $this->db->get();
}

function deleteBarangtemp($kode_barang , $id_user){
	$hapus = $this->db->delete('penjualan_detail_temp', array('kode_barang' => $kode_barang , 'id_user' => $id_user));
	if($hapus){
		return 1;
	}
}

function insertPenjualan($data){
	$simpan = $this->db->insert('penjualan' , $data);
	if($simpan){
		$detailpenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
		$totalpenjualan = 0;
		$berhasil = 0;
		$error = 0;
		foreach($detailpenjualan->result() as $d){
			$totalpenjualan = $totalpenjualan + ($d->qty*$d->harga);
			$datadetail = array(
			'no_faktur' => $data['no_faktur'],
			'kode_barang' => $d->kode_barang,
			'harga' => $d->harga,
			'qty' => $d->qty,
			);
			$simpandetail = $this->db->insert('penjualan_detail' , $datadetail);
			if($simpandetail){
				$berhasil++;
			}else {
				$eror++;
			}
		}
		if($error > 0){
			$hapusdetailpenjualan = $this->db->delete('penjualan_detail' , array('no_faktur' => $data['no_faktur']));
			$hapusdatapenjualan = $this->db->delete('penjualan' , array('no_faktur' => $data['no_faktur']));
			$this->session->set_flash('msg', '<div class="alert alert-danger" role="alert">
			This is a success alert — check it out!
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			Data Gagal Disimpan !
			</div>');
			redirect('penjualan/inputpenjualan');
		}else{
			$hapustemporary = $this->db->delete('penjualan_detail_temp', array('id_user' => $data['id_user']));
			if($hapustemporary){
				if($data['jenis_transaksi'] == "tunai"){
				$databayar = array(
					'no_faktur' => $data['no_faktur'],
					'tglbayar' => $data['tgltransaksi'],
					'bayar' => $totalpenjualan,
					'id_user' => $data['id_user']
			);

			$bayar = $this->db->insert('historibayar' , $databayar);
			if($bayar){
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
			Data Berhasil Disimpan !
			</div>');
			redirect('penjualan/inputpenjualan');
			}else{
				$hapusdetailpenjualan = $this->db->delet('penjualan_detail' , array('no_faktur' => $data['no_faktur']));
				$hapusdatapenjualan = $this->db->delete('penjualan' , array('no_faktur' => $data['no_faktur']));
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			Data Gagal Disimpan !
			</div>');
			redirect('penjualan/inputpenjualan');
			}
			
			}

			}else{
				$hapusdetailpenjualan = $this->db->delet('penjualan_detail' , array('no_faktur' => $data['no_faktur']));
				$hapusdatapenjualan = $this->db->delete('penjualan' , array('no_faktur' => $data['no_faktur']));
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			Data Gagal Disimpan !
			</div>');
			redirect('penjualan/inputpenjualan');
			}
		}


		
	}
}

function getDatapenjualan(){
	$this->db->select('penjualan.no_faktur , tgltransaksi , penjualan.kode_pelanggan , nama_pelanggan , jenis_transaksi , penjualan.id_user , nama_lengkap , kode_barang , (qty * harga) as totalakhir , qty' );
	$this->db->from('penjualan');
	$this->db->join('pelanggan' , 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
	$this->db->join('users' , 'penjualan.id_user = users.id_user');
	$this->db->join('penjualan_detail' , 'penjualan.no_faktur = penjualan_detail.no_faktur');
	return $this->db->get();
}

function getPenjualan($no_faktur){
	$this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenis_transaksi,penjualan.id_user,nama_lengkap as kasir');
	$this->db->from('penjualan');
	$this->db->join('pelanggan' , 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
	$this->db->join('users' , 'penjualan.id_user = users.id_user');
	$this->db->where('no_faktur' , $no_faktur);
	return $this->db->get();
}

function getDetailpenjualan($no_faktur){
	$this->db->select('penjualan_detail.kode_barang,nama_barang,penjualan_detail.harga,qty,satuan');
	$this->db->from('penjualan_detail');
	$this->db->join('barang_master' , 'penjualan_detail.kode_barang = barang_master.kode_barang');
	$this->db->where('no_faktur' , $no_faktur);
	return $this->db->get();
}

function getLaporanpenjualan($dari , $sampai){
	$this->db->where('tgltransaksi >=' , $dari);
	$this->db->where('tgltransaksi <=' , $sampai);
	$this->db->select('penjualan.no_faktur , tgltransaksi , penjualan.kode_pelanggan , nama_pelanggan , jenis_transaksi , penjualan.id_user , nama_lengkap , kode_barang , (qty * harga) as total , qty' );
	$this->db->from('penjualan');
	$this->db->join('pelanggan' , 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
	$this->db->join('users' , 'penjualan.id_user = users.id_user');
	$this->db->join('penjualan_detail' , 'penjualan.no_faktur = penjualan_detail.no_faktur');
	return $this->db->get();
}


function getDatapenjualanhariini(){
	$hariini = date("Y-m-d");
	return $this->db->get_where('penjualan' , array('tgltransaksi' => $hariini));

}

function getBayarhariini(){
	$hariini = date("Y-m-d");
	$this->db->select("SUM(bayar) as totalbayar");
	$this->db->from('historibayar');
	$this->db->join('penjualan' , 'historibayar.no_faktur = penjualan.no_faktur');
	$this->db->join('users' , 'penjualan.id_user = users.id_user');
	$this->db->where('tglbayar' , $hariini);
	return $this->db->get();
}

}