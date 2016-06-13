<?php 

class Equipos_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	
	function get_all_categories()
	{
		$this->db->select('id,category');
		$this->db->from('tipo_torneo');
		$this->db->where('type', 'fase');
		$query = $this->db->get();	
		if ($query->num_rows() > 0 ) {
			return $query->result();		
		}	
	}
	
	function get_all_teams($category_id)
	{
		$this->db->select('id,name');
		$this->db->from('equipos');
		$this->db->where('category_id', $category_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();	
		if ($query->num_rows() > 0 ) {
			return $query->result();		
		}	
	}
}
		
