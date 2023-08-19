<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kriteria extends CI_Model 
{

	public function getSubkrit($id){

		$query = "SELECT * FROM tb_sub_kriteria WHERE id_kriteria='$id'";

		return $this->db->query($query)->result_array();
	}

}