<?php 

class Home_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	function get_marcas(){
		$this->db->from('marcas');
		$query = $this->db->get();
		return $query->result();
	}
}
		
