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
		
		$this->db->select('p.id as p_id,e1.name as name_equipo1,e1.id as id_equipo1,e2.name as name_equipo2,e2.id as id_equipo2,nro_fecha,date,time,court,team1_res,team2_res,team1_pen,team2_pen,cargado');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->join('fechas f','f.nro_fecha = p.nro_fecha_id');
		$this->db->where('tournament_id',$event_id);
		$this->db->where('nro_fecha',$fecha);
		$query = $this->db->get();
		$partidos = $query->result();
		//~ echo $this->db->last_query() . "<br>";
	  
		return $partidos;

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
	
		$this->db->select('id, parent_id,name_category,tipo');	
		$this->db->from('category');
		$this->db->where('show','1');
		$query = $this->db->get();
		  

		foreach ($query->result() as $row)
		{
			$pid  = $row->parent_id;
			$id   = $row->id;
			$name = $row->name_category;
			$tipo = $row->tipo;

			$tree[$id]["tipo"] = $tipo;

			
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
	
	function get_full_category_tree() {
		$this->db->select('id, parent_id, name_category, tipo');	
		$this->db->from('category');
		$this->db->where('show','1');
		$query = $this->db->get();
		foreach ($query->result() as $row){
			$pid  = $row->parent_id;
			$id   = $row->id;
			$name = $row->name_category;
			$tipo = $row->tipo;

			$tree[$id]["tipo"] = $tipo;
			
			// Create or add child information to the parent node
			if (isset($tree[$pid]))
				// a node for the parent exists
				// add another child id to this parent
				$tree[$pid]["children"][] = $id;
			else
				// create the first child to this parent
				$tree[$pid] = array("children"=>array($id));

			// Create or add name information for current node
			if (isset($tree[$id])) {
				// a node for the id exists:
				// set the name of current node
				$tree[$id]["name"] = $name;
				$tree[$id]["id"] = $id;
				$tree[$id]["pid"] = $pid;
				$tree[$id]["tipo"] = $tipo;
			} else {
				// create the current node and give it a name
				$tree[$id] = array( "name" => $name, "id" => $id, "pid" => $pid, "tipo" => $tipo );				
			}
		}
		return $tree;
	}
	
	function convert_to_html($tree, $id, $html, $url_link, $level){
		if(isset($tree[$id]['name'])){
			if($tree[$id]['tipo'] == "nodo"){
				if($tree[$id]['pid'] == 0){
					$html .= 
						'<a href="#' . $tree[$id]['id'] . '" class="list-group-item list-group-parent collapsed" data-toggle="collapse" data-parent="#' . $tree[$id]['id'] . '">' .
						$tree[$id]['name'] . '</a>';
				}else{
					if ($level==2){ //level 2
						$html .= 
						'<a href="#' . $tree[$id]['id'] . '" class="list-group-item list-group-parent subparent" data-toggle="collapse" data-parent="#' . $tree[$id]['id'] . '">' .
						$tree[$id]['name'] . '</a>';
					}else if ($level==3){ //level 3
						$html .= 
						'<a href="#' . $tree[$id]['id'] . '" class="list-group-item list-group-parent subsubparent" data-toggle="collapse" data-parent="#' . $tree[$id]['id'] . '">' .
						$tree[$id]['name'] . '</a>';
					}else if ($level==4){ //for now we don't have this level but could be in the future
						$html .= 
						'<a href="#' . $tree[$id]['id'] . '" class="list-group-item list-group-parent subsubsubparent" data-toggle="collapse" data-parent="#' . $tree[$id]['id'] . '">' .
						$tree[$id]['name'] . '</a>';
					}else if ($level==5){ //for now we don't have this level but could be in the future. If we have more than 5 levels we should add it here
						$html .= 
						'<a href="#' . $tree[$id]['id'] . '" class="list-group-item list-group-parent subsubsubsubparent" data-toggle="collapse" data-parent="#' . $tree[$id]['id'] . '">' .
						$tree[$id]['name'] . '</a>';
					}					
				}
			}else{ // hoja
				$html .= 
					'<a class="hoja list-group-item" href="' . base_url() . $url_link . $id . '">' .
					$tree[$id]['name'] . '</a>';
			}
		}			
		if(isset($tree[$id]['children'])){
			$level= $level + 1;
			$arChildren = &$tree[$id]['children'];
			$len = count($arChildren);
			if ($id != 0) $html .= '<div class="collapse" id="' . $tree[$id]['id'] . '">'; // not for the first one
			for ($i=0; $i<$len; $i++) {
				$html .= $this->fixture_model_new->convert_to_html($tree, $arChildren[$i], "", $url_link, $level);
			}
			if ($id != 0) $html .= '</div>'.PHP_EOL;
		}
		return $html;
	}
	
	function convert_to_ul($tree, $id, $html,$url_link){
			
	  if (isset($tree[$id]['name'])){
	  //~ if (isset($tree[$id]['name']) & ($tree[$id]['tipo'] == 'ida' )){
			if($tree[$id]['tipo'] == "nodo"){
				$html .= 
					'<li>' .
						'<span class="nav-click"></span>' .
						 $tree[$id]['name'] ;
			}
			else{
				$html .= 
					'<li>' .
						'<span class="nav-click"></span>' .
						'<a href="' . base_url() . $url_link . $id . '">' . $tree[$id]['name'] . '</a>';
			}
	   }			

	  if (isset($tree[$id]['children']))
	  {
		$arChildren = &$tree[$id]['children'];
		$len = count($arChildren);
		$html .= '<ul>';
		for ($i=0; $i<$len; $i++) {
			$html .= $this->fixture_model_new->convert_to_ul($tree, $arChildren[$i], "",$url_link);
		}
		$html .= '</ul>'.PHP_EOL;
	  }

	  $html .= '</li>'.PHP_EOL;
	  return $html;
	}
	
	function parse_tree ($url_link) {
	
	    $tree = $this->fixture_model_new->get_category_tree();
		$too  = $this->fixture_model_new->convert_to_ul($tree, 0, "",$url_link);
		
		return $too;
	}
	
	function parse_category_tree ($url_link) {
		$level = 0; // to remember the level
	    $tree = $this->fixture_model_new->get_full_category_tree();
		$too  = $this->fixture_model_new->convert_to_html($tree, 0, "",$url_link, $level);
		
		return $too;
	}
	
    # Esta funcion no esta del todo bien, tengo que agregar query->num_rows > 0
	function get_category_and_subcategory($id_category){
		$string = '';
		while($id_category != 0){
			$this->db->select('name_category,parent_id');	
			$this->db->from('category');
			$this->db->where('id', $id_category);
			$query = $this->db->get();
			//~ $string = '';
			foreach ($query->result() as $row){	
				$parent_id = $row->parent_id;
				$string = $row->name_category . " / " . $string;
			}
			$id_category = $parent_id;
		}
        #echo $this->db->last_query() . "<br>";
		return $string;
	}
    
    function get_category_and_subcategory_optimized($id_category,$all_parents_of,$all_parents_name){
        $parent_of;
        $parent_name;
        $el_padre_de;
		$string = '';
        $count = 0;
		while($id_category != 0){
            $count ++;
            if (isset($all_parents_of[$id_category])){
                $string = $all_parents_name[$id_category]. " / " . $string;
                $id_category = $all_parents_of[$id_category];
            }
            else{
                $this->db->select('name_category,parent_id');	
                $this->db->from('category');
                $this->db->where('id', $id_category);
                $query = $this->db->get();
            
                if ($query->num_rows() > 0){
                    foreach ($query->result() as $row){	
                        $parent_id = $row->parent_id;
                        $string = $row->name_category . " / " . $string;
                        $parent_of[$id_category] = $row->parent_id;
                        $parent_name [$id_category] = $row->name_category;
                        $id_category = $parent_id;
                    }
                }
                else{
                    $id_category = 0;
                    $string = "???" . " / " . $string;
                }
            }
		}
        return array(
            'string' => $string,
            'parents_of' => $parent_of,
            'parents_name' => $parent_name,
        );
	}
	
	function get_fechas_por_evento($event_id){
		$this->db->distinct();
		$this->db->select('nro_fecha_id');
		$this->db->from('partidos');
		$this->db->where('tournament_id',$event_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$fechas = $query->result();
			return $fechas;

		}
		else{
			return;
		}	
	}
	
	function get_fecha_defecto($event_id){
		$this->db->select('nro_fecha_id');
		$this->db->from('partidos');
		$this->db->where('tournament_id',$event_id);
		$this->db->where('cargado',0);
		$this->db->group_by('nro_fecha_id');
		
		$this->db->order_by('count(cargado) ASC,nro_fecha_id ASC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
			return $row->nro_fecha_id;		   
		}
		
	}
}
		
