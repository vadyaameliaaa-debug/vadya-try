<?php

class Dashboard extends CI_Controller{

function __construct(){

	parent::__construct();
	checklogin();
	$this->load->model('Model_penjualan');

}

	function index()
		{
			$data['jmlpenjualan'] = $this->Model_penjualan->getDatapenjualanhariini()->num_rows();
			$data['jmlbayar'] = $this->Model_penjualan->getBayarhariini()->row_array();
			$this->template->load('template/template','dashboard/dashboard' , $data);
		}
		
}