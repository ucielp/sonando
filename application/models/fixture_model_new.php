<?php 

class Fixture_model_new extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	function get_categories(){
			$this->db->select('id, name_category');	
			$this->db->from('category');
			$query = $this->db->get();
			foreach($query->result_array() as $row){
				$combo[$row['id']]=$row['name_category'];
				}
			return $combo;
		}
	
	
	function get_events_combo_box(){
		$this->db->select('id, name_event,category_id');	
		$this->db->from('events');
		$this->db->order_by('category_id asc,name_event');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{			
			foreach($query->result_array() as $row){
				$combo[$row['id']]=$row['name_event'];	
			}
			return $combo;
		}
			return 0;
	}
	function get_partidos($event_id,$fecha){
		if ($fecha == 0){		
			$this->db->select('p.id as p_id,e1.name as name_equipo1,e1.id as id_equipo1,e2.name as name_equipo2,e2.id as id_equipo2,nro_fecha,date,time,court,team1_res,team2_res, cargado');
			$this->db->from('partidos p');
			$this->db->join('equipos e1','e1.id = p.team1_id');
			$this->db->join('equipos e2','e2.id = p.team2_id');
			#$this->db->join('fechas f','f.id = p.nro_fecha_id');
			#lo hago con nro de fecha y no con el id
			$this->db->join('fechas f','f.nro_fecha = p.nro_fecha_id');
			$this->db->where('tournament_id',$event_id);
			$this->db->where('actual','1');
			//~ $this->db->where('fase',$fase);
			$query = $this->db->get();
			$partidos = $query->result();
			return $partidos;
		}
		#la anterior
		else {
			$this->db->select('p.id as p_id,e1.name as name_equipo1,e1.id as id_equipo1,e2.name as name_equipo2,e2.id as id_equipo2,nro_fecha,date,time,court,team1_res,team2_res, cargado');
			$this->db->from('partidos p');
			$this->db->join('equipos e1','e1.id = p.team1_id');
			$this->db->join('equipos e2','e2.id = p.team2_id');
			#$this->db->join('fechas f','f.id = p.nro_fecha_id');
			#lo hago con nro de fecha y no con el id
			$this->db->join('fechas f','f.nro_fecha = p.nro_fecha_id');
			$this->db->where('tournament_id',$event_id);
			$this->db->where('nro_fecha',$fecha);
			//~ $this->db->where('fase',$fa	se);
			$query = $this->db->get();
			$partidos = $query->result();
			#echo $this->db->last_query() . "<br>";
		  
			return $partidos;
		}	
	}
	
	
	function get_partidos_elim($tournament_id){
		$this->db->select('p.id as p_id,e1.name as name_equipo1,e1.id as id_equipo1,e2.name as name_equipo2,e2.id as id_equipo2,date,time,court,team1_res,team2_res,team1_pen,team2_pen,cargado');
		$this->db->from('partidos_elimin p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->where('tournament_id',$tournament_id);
		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";
		$partidos = $query->result();
		return $partidos;
	}

	function  get_nros_fecha($fase){
			
				
			$this->db->select_max('nro_fecha');
			$this->db->where("fase", $fase);
			$query = $this->db->get('fechas');
			
			if ($query->num_rows() > 0)
			{
			   $row = $query->row(); 
			   return   $row->nro_fecha;   
			  }
	}
	function get_actual($fase){
		$this->db->select('nro_fecha');
		$this->db->where("actual", "1");
		$this->db->where("fase", $fase);
		$query = $this->db->get('fechas');

		if ($query->num_rows() > 0)
			{
			   $row = $query->row(); 
			   return   $row->nro_fecha;
			   
			  }
	}		
			
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
	
		#esto es para eliminatorias para mostrar todo
		function get_nro_grupo_like($tournament,$type,$category,$category_name){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);
			$this->db->where('category',$category);
			$this->db->like('name', $category_name);
			#echo $this->db->last_query() . "<br>";
			$query = $this->db->get();
			$nro_grupo = $query->result();
			return $nro_grupo;
		}
		
		#esto es para promociones para mostrarlas todas juntas
		function get_nro_grupo_promo($tournament,$type){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);

			$query = $this->db->get();
			#echo $this->db->last_query() . "<br>";

			$nro_grupo = $query->result();
			return $nro_grupo;
		}
		
		//~ TODO Esto es para equipos pero lo tengo que arreglar
		function get_all_events(){
			$this->db->select('id,name_event as name');
			$this->db->from('events');
			//~ $this->db->where('generado', '1');
			$query = $this->db->get();	
			if ($query->num_rows() > 0 ) {
				return $query->result();		
			}
		}
		
		function get_event_name_by_id($event_id){
			
			$this->db->select('name_event');
			$this->db->from('events');
			$this->db->where('id', $event_id );
			$query = $this->db->get();	

			if ($query->num_rows() > 0)
			{
				$row = $query->row(); 
				return $row->name_event;
			}
		}
		
		function get_category_tree() {
	
		$this->db->select('id, parent_id,name_category');	
		$this->db->from('category');
		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";
		  

		foreach ($query->result() as $row)
		{
			$pid  = $row->parent_id;
			$id   = $row->id;
			$name = $row->name_category;

			// Create or add child information to the parent node
			if (isset($tree[$pid]))
				// a node for the parent exists
				// add another child id to this parent
				$tree[$pid]["children"][] = $id;
			else
				// create the first child to this parent
				$tree[$pid] = array("children"=>array($id));

			// Create or add name information for current node
			if (isset($tree[$id]))
				// a node for the id exists:
				// set the name of current node
				$tree[$id]["name"] = $name;
			else
				// create the current node and give it a name
				$tree[$id] = array( "name"=>$name );
		}
		return $tree;
	}
	
	function convert_to_ul($tree, $id, $html){

	  if (isset($tree[$id]['name']))
		$html .= 
			'<li>' .
				'<span class="nav-click"></span>' .
				'<a href="' . base_url() . 'fixture/show_fixture/' . $id . '">' . $tree[$id]['name'] . '</a>';

	  if (isset($tree[$id]['children']))
	  {
		$arChildren = &$tree[$id]['children'];
		$len = count($arChildren);
		$html .= '<ul>';
		for ($i=0; $i<$len; $i++) {
			$html .= $this->fixture_model_new->convert_to_ul($tree, $arChildren[$i], "");
		}
		$html .= '</ul>'.PHP_EOL;
	  }

	  $html .= '</li>'.PHP_EOL;
	  return $html;
	}
	
	function parse_tree () {
	
	    $tree = $this->fixture_model_new->get_category_tree();
		$too = $this->fixture_model_new->convert_to_ul($tree, 0, "");
		
		return $too;
	}
		
}
		
