<?php 

class Posiciones_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	#retorna los distintos tipos de torneo; fase campeones campeonato descenso promocion
	function get_type_tournaments(){
		$this->db->select('type');
		$this->db->from('tipo_torneo');
		$this->db->group_by('type');
		$query = $this->db->get();
		$tipo_torneos= $query->result();
		return $tipo_torneos;
	}	
	


	#retorna las categorias para meter en un combobox para fase, campeonato y descenso
	function get_categories($type){
		$this->db->select('id, category');	
		$this->db->from('tipo_torneo');
		$this->db->where('type', $type);
		$this->db->group_by('category');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			#$combo[$row['id']]=$row['category'];}
			$combo[$row['category']]=$row['category'];	
			}
		return $combo;
	}
	
	
	#retorna las categorias para meter en un combobox para repechaje
	function get_categories_by_type_tournament($type,$tournament){
		$this->db->select('id, category');	
		$this->db->from('tipo_torneo');
		$this->db->where('type', $type);
		$this->db->where('tournament', $tournament);
		$this->db->group_by('category');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			#$combo[$row['id']]=$row['category'];}
			$combo[$row['category']]=$row['category'];	
			}
		//~ echo $this->db->last_query() . "<br>";

		return $combo;
	}
	
	function get_id_by_category($type,$name,$tournament){
		$this->db->select('id');	
		$this->db->from('tipo_torneo');
		$this->db->where('type', $type);
		$this->db->where('name', $name);
		$this->db->where('tournament', $tournament);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->id;
		}
	}
	
	
	#retorna las posiciones dandole el id de tipo_torneo
	function get_positions_fase1($actual_fase1_id){
		$this->db->select('e.name as name_equipo,e.id as id_equipo,pj,pg,pe,pp,gf,gc,dg,ptos');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('events t','t.id = e.actual_fase1_id');
		$this->db->where('e.actual_fase1_id', $actual_fase1_id);
		
		$this->db->where('p.fase', '1');
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$this->db->order_by('name_equipo','ASC');
		$query = $this->db->get();
		$posiciones = $query->result();
		#echo $this->db->last_query() . "<br>";
		return $posiciones;
	}
	
	
		#retorna las posiciones de la fase2 dandole el id de tipo_torneo
	function get_positions_fase2($actual_fase2_id){
		$this->db->select('e.name as name_equipo,e.id as id_equipo,pj,pg,pe,pp,gf,gc,dg,ptos');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase2_id');
		$this->db->where('e.actual_fase2_id', $actual_fase2_id);
		$this->db->where('p.fase', '2');
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$query = $this->db->get();
		$posiciones = $query->result();
		//~ echo $this->db->last_query() . "<br>";
		return $posiciones;
	}
	
	function get_name_by_id($id){
		$this->db->select('name');
		$this->db->from('tipo_torneo');
		$this->db->where('id', $id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->name;
		}
	}


	#COPA DE CAMPEONES
	
	#FASE DE GRUPOS
	#retorna el nro de grupos  $tournament = 'liga', $category = 'grupo', $type = 'campeones'
	#no hace falta pasarle la categoria en este caso
	#donde tengo que hacer un foreach para mostrar las posiciones para cada uno de los grupos
	function get_nro_grupo($tournament,$type,$category){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);
			$this->db->where('category',$category);
	
			$query = $this->db->get();
			$nro_grupo = $query->result();
			return $nro_grupo;
		}

	#FASE ELIMINATORIA $type = 'campeones' y $tournament = 'eliminatoria'
	# NO HACE FALTA CATEGORY, puedo hacer la segunda y en la base de datos cambiar 1 por cuarto 1, etc
	
	function elimin($tournament,$type){
		$this->db->select('id,castegory,name');
		$this->db->from('tipo_torneo');
		$this->db->where('type',$type);
		$this->db->where('tournament',$tournament);
		#$this->db->where('category',$category);
		$query = $this->db->get();
		$elimin = $query->result();
		#tengo que hacer la funcion create eliminatory
		#this->create_eliminatory ($elimin);
	}
}
		
