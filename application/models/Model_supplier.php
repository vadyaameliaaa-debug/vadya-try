<?php

class Model_supplier extends CI_Model{

	function getDataSupplier(){

		return $this->db->get('supplier');
	}


	function insertSupplier($data){

		$this->db->insert('supplier', $data);
		if($simpan){
			return 1;
		} else {
			return 0;
		}
	}

function getSupplier($kodesupplier){

    	return $this->db->get_where('supplier', array('kode_supplier' => $kodesupplier));
 	}

 	 function updateSupplier($data , $kodesupplier){

    	$simpan = $this->db->update('supplier' , $data , array ('kode_supplier' => $kodesupplier));
    	if($simpan){
			return 1;
		} else {
			return 0;
		}
    }

     function deleteSupplier($kodesupplier){

    	$hapus = $this->db->delete('supplier' , array('kode_supplier' => $kodesupplier));
    	if($hapus){

    		return 1;
    	}else{
    		return 0;
    	}
    }
}

?>