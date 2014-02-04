<?php 

class Contacto_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function get_asuntos(){
		$this->db->select('id, asunto, mail');	
		$this->db->from('asuntos');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['mail']]=$row['asunto'];	
			}
		return $combo;
	}
	function get_asunto_from_email($to){
		$this->db->select('asunto');	
		$this->db->where('mail', $to);
		$this->db->from('asuntos');
		$query = $this->db->get();
		foreach($query->result() as $row){
			return $row->asunto;
		}
	}
}
	