<?php 

class Goleadores_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}

	

	function get_name(){

		$query = $this->db->get('goleadores',1);



		foreach ($query->result() as $row)

		{

			echo $row->last_name;

		}

	}



}	



