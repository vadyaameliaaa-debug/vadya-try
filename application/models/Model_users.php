<?php

class Model_users extends CI_Model{

function getDataUsers(){

		return $this->db->get('users');
	}

	function insertUsers($data){

		$this->db->insert('users', $data);
		if($simpan){
			return 1;
		} else {
			return 0;
		}
	}

function getUsers($idusers){

    	return $this->db->get_where('users', array('id_user' => $idusers));
 	}

 	 function updateUsers($data , $idusers){

    	$simpan = $this->db->update('users' , $data , array ('id_user' => $idusers));
    	if($simpan){
			return 1;
		} else {
			return 0;
		}
    }

     function deleteUsers($idusers){

    	$hapus = $this->db->delete('users' , array('id_user' => $idusers));
    	if($hapus){

    		return 1;
    	}else{
    		return 0;
    	}
    }
}

?>