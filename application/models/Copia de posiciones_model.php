<?php 

class Posiciones_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	function get_positions($actual_tournament_id){
		$this->db->select('*, e.name as name_equipo');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_tournament_id');
		$this->db->where('e.actual_tournament_id', $actual_tournament_id);
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		//$this->db->join('equipos e','e.id = p.team_id');
		$query = $this->db->get();
		$posiciones = $query->result();
		return $posiciones;
		
	}
	
	function get_categories($type){
		$this->db->select('id, category');	
		$this->db->from('tipo_torneo');
		$this->db->where('type', $type);
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['category'];
			}
		return $combo;
	}

}
		
