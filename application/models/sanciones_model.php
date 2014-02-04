<?php 

class Sanciones_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	function get_sanciones(){
		
	   $this->db->select('fecha, j.last_name as apellido, j.name as nombre_jugador,e.name as nombre_equipo, t.type, t.category,sancion,observacion');
	   $this->db->from('sanciones s');
	   $this->db->join('jugadores j','s.player_id = j.id');
	   $this->db->join('equipos e','j.team_id = e.id');
	   $this->db->join('tipo_torneo t','t.id = s.tipo_torneo_id');
	   	   $this->db->order_by('s.id','desc');

	   $query = $this->db->get();
	   $sanciones = $query->result();
	  	#echo $this->db->last_query() . "<br>";

	   return $sanciones;
	}
}
		
