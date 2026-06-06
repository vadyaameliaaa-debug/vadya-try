<?php

class Model_barang extends CI_Model{

	function getDataBarang(){

		//$this->db->join('supplier' , 'barang_master.kode_supplier = supplier.kode_supplier');
		return $this->db->get('barang_master');
	}

	function insertBarang($data){

		$this->db->insert('barang_master', $data);
		if($simpan){
			return 1;
		} else {
			return 0;
		}
	}
      
    function getBarang($kodebarang){

    	$this->db->where('kode_barang' , $kodebarang);
    	//$this->db->join('supplier' , 'barang_master.kode_supplier = supplier.kode_supplier');
    	return $this->db->get_where('barang_master', array('kode_barang' => $kodebarang));
    }

    function updateBarang($data , $kodebarang){

    	$simpan = $this->db->update('barang_master' , $data , array ('kode_barang' => $kodebarang));
    	if($simpan){
			return 1;
		} else {
			return 0;
		}
    }

    function deleteBarang($kodebarang){

    	$hapus = $this->db->delete('barang_master' , array('kode_barang' => $kodebarang));
    	if($hapus){

    		return 1;
    	}else{
    		return 0;
    	}
    }
}