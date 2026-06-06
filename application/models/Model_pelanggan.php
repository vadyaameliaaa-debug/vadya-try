<?php

class Model_pelanggan extends CI_Model{

function getDataPelanggan(){

		return $this->db->get('pelanggan');
	}

function insertPelanggan($data){

		$this->db->insert('pelanggan', $data);
		if($simpan){
			return 1;
		} else {
			return 0;
		}
	}

function getPelanggan($kodepelanggan){

    	return $this->db->get_where('pelanggan', array('kode_pelanggan' => $kodepelanggan));
 	}


 function updatePelanggan($data , $kodepelanggan){

    	$simpan = $this->db->update('pelanggan' , $data , array ('kode_pelanggan' => $kodepelanggan));
    	if($simpan){
			return 1;
		} else {
			return 0;
		}
    }

     function deletePelanggan($kodepelanggan){

    	$hapus = $this->db->delete('pelanggan' , array('kode_pelanggan' => $kodepelanggan));
    	if($hapus){

    		return 1;
    	}else{
    		return 0;
    	}
    }
}