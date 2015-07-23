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
	
	function insert_newsletter($email){
		$ql = $this->db->select('id')->from('newsletter')->where('email',$email)->get();
		if( $ql->num_rows() > 0 ) {print "ya existe";} else {
			$a = array('email' => $email);
			$this->db->insert('newsletter', $a);
		}

	}	

}
		
