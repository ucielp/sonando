<?php 

class Notas_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function get_notas($limit, $offset)
	{
		$this->db->select('*,notas.id as id_nota');	
		//$this->db->from('notas');
		$this->db->order_by('notas.id', 'desc');
		$this->db->join('users u', 'u.id = notas.id_user');
		$query = $this->db->get('notas', $limit, $offset);
		#echo $this->db->last_query() . "<br>";
		if ($query->num_rows() > 0 ) {
			return $query->result();
		}	
	}
	
	function num_notas(){
		$this->db->select('*');	
		$this->db->from('notas');
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function subir_nota($data)
	{
		$this->db->set('id_user', $data['id_user']);
		$this->db->set('fecha', $data['fecha']);
		$this->db->set('titulo', $data['titulo']);
		$this->db->set('foto', $data['foto']);
		$this->db->set('audio', $data['audio']);
		$this->db->set('texto', $data['texto']);
		$this->db->insert('notas');
		return $this->db->insert_id();
	}
}
	