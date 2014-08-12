<?php 

class Admin_model_new extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	function get_categories(){
		$this->db->select('*');	
		$this->db->from('category');
		$this->db->order_by('parent_id asc');

		$query = $this->db->get();
		return $query->result_array();
	}
		
	#me devuelve las categorias para poner en un comboBox
	function get_categories_combo_box(){
		$this->db->select('id, name_category');	
		$this->db->from('category');
		$this->db->order_by('parent_id asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{			
			foreach($query->result_array() as $row){
				$name_category_completo = $this->fixture_model_new->get_category_and_subcategory($row['id']);
				$combo[$row['id']]=$name_category_completo;	
			}
			return $combo;
		}
			return 0;
	}
	

	
	function get_events_combo_box(){
		$this->db->select('id, name_event,category_id');	
		$this->db->from('events');
		$this->db->order_by('category_id asc, name_event');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{			
			foreach($query->result_array() as $row){
				$combo[$row['id']]=$row['name_event'] . " (" . $row['category_id'] . ")";	
			}
			return $combo;
		}
			return 0;
	}

	function get_events_combo_box_2(){
		$this->db->select('id, name_event,category_id');	
		$this->db->from('events');
		$this->db->order_by('category_id asc, name_event');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{			
			foreach($query->result_array() as $row){
				$combo[$row['id']]=$row['name_event'] ;	
			}
			return $combo;
		}
			return 0;
	}
	
	
	#me devuelve las categorias para poner en un comboBox donde tambien muestra el id
	function get_categories_combo_box_to_events(){
		$this->db->select('id, name_category');	
		$this->db->from('category');
		$this->db->order_by('parent_id asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{			
			foreach($query->result_array() as $row){
				$combo[$row['id']]=$row['name_category'] . " (" . $row['id'] . ")";	
			}
			return $combo;
		}
			return 0;
	}
	
	function create_category($name_category,$parent_id,$show,$tipo){
		$this->db->set('name_category', $name_category);
		$this->db->set('parent_id', $parent_id);
		$this->db->set('show', $show);
		$this->db->set('tipo', $tipo);

		$this->db->insert('category');
		return $this->db->insert_id();
	}
		
	function set_category($category_id,$name_category,$id_parente_category,$show,$tipo_torneo){
		$i = 1;
		foreach ($category_id as $cat_id){
			$data = array(
				'name_category' => $name_category[$i],
				'parent_id' => $id_parente_category[$i],
				'show' => $show[$i],
				'tipo' => $tipo_torneo[$i],
			);
			$this->db->where('id', $cat_id);
			$this->db->update('category', $data);
			$this->db->insert_id();
			$i++;
		}	
	}
	
	function delete_category($id_category)
	{
		 
		$this->db->select('parent_id');	
		$this->db->from('category');
		$this->db->where('id', $id_category);
		$query = $this->db->get();
		$warning = '';
		foreach ($query->result() as $row){	
			
			if($row->parent_id != 0){
				$warning = "Cuidado, las categorías 'hijas' no se borraron, pero no se van a mostrar si no esta el padre";
			}
		}
		$this->db->delete('category', array('id' => $id_category));
		return $warning;
	}
	
	function get_events(){
			$this->db->select('*');	
			$this->db->from('events');
			$this->db->order_by('category_id asc');

			$query = $this->db->get();
			return $query->result_array();
		}
		
	function create_event($name_event,$category_id){
		$this->db->set('name_event', $name_event);
		$this->db->set('category_id', $category_id);

		$this->db->insert('events');
		return $this->db->insert_id();
	}
	
	function set_events($events_id,$name_event,$category_id){
		$i = 1;
		
		foreach ($events_id as $event_id){
			$data = array(
				'name_event' => $name_event[$i],
				'category_id' => $category_id[$i],
			);
			$this->db->where('id', $event_id);
			$this->db->update('events', $data);
			$this->db->insert_id();
			$i++;
		}	
	}
	
	
	function delete_event($id_event)
	{
		$warning = '';
		$this->db->delete('events', array('id' => $id_event));
		return $warning;
	}
	
	###ESTO LO USO PARA CAMBIAR LAS CATEGORIAS DE LOS EQUIPOS
	#me devuelve las categorias para poner en un comboBox
	function get_events_ninguno(){
		$this->db->select('id, name_event as name, category_id');	
		$this->db->from('events');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		$combo[0] = 'Ninguna';
		return $combo;
	}
	
	function get_orden_ninguno(){
		$combo[0] = '1';
		$combo[1] = '2';
		$combo[2] = '3';
		$combo[3] = '4';
		$combo[4] = '5';
		$combo[5] = '6';
		$combo[6] = '7';
		$combo[7] = '8';
		$combo[8] = '9';
		$combo[9] = '10';
		$combo[10] = '11';
		$combo[11] = '12';
		$combo[12] = '13';
		$combo[13] = '14';
		$combo[14] = '15';
		$combo[15] = '16';
		$combo[16] = '17';
		$combo[17] = '18';
		$combo[18] = '19';
		$combo[19] = '20';
		$combo[20] = '21';

		return $combo;
	}
	
	function get_all_teams(){
		
		$query = $this->db->query('
		SELECT e.id as e_id,e.name as e_name, eq.password as psswd, eq.user as user, e.activo
		FROM equipos e 
		JOIN equipos_users eq ON eq.team_id = e.id
		ORDER BY e_name ASC');	
		//~ echo $this->db->last_query() . "<br>";

		return $query->result();
    }
    
    function get_all_teams_activos(){
		
		$this->db->select('name as e_name, id as e_id');	
		$this->db->from('equipos');
		$this->db->where('activo', '1');
		$query = $this->db->get();
		
		return $query->result();
    }
        
    function get_all_teams_not_this_category($category_id){

		$query = $this->db->query('SELECT name as e_name, id as e_id FROM equipos 
		WHERE activo = 1
		AND ID NOT IN (SELECT team_id FROM category_display WHERE category_id = '. $category_id . ')');	

		return $query->result();
    }
    
	function torneo_generado($event_id)
	{
		$this->db->select('generado');	
		$this->db->from('events');
		$this->db->where('id', $event_id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->generado;
		}
	}
	
	function insert_equipo_torneo($ids_en_array, $show, $category_id){
		$i = 1;
		foreach ($ids_en_array as $id){
			if ($show[$i]){
				$this->db->set('team_id', $ids_en_array[$i]);
				$this->db->set('category_id', $category_id);
				$this->db->insert('category_display');
				$this->db->insert_id();
			}
			$i++;
		}
		
	}
	
	function delete_equipo_from_category_display($category_id,$team_id)
	{
		$this->db->where('category_id', $category_id);
		$this->db->where('team_id', $team_id);
		$this->db->delete('category_display'); 
	}
	
	function update_equipos_from_category_display($category_id, $new_post, $new_post_id){
		$i = 0;
		foreach ($new_post_id as $a){
			$ids[$i] = $a;
			$i++;
		}
		
		$i = 0;
		foreach ($new_post as $post){
			$data = array(
				'orden' => $post,
           	);
			$this->db->where('category_id', $category_id);
			$this->db->where('team_id', 	$ids[$i]);
			$this->db->update('category_display', $data);
			$this->db->insert_id();
			$i++;
		}
	}
	
	function generate_tournament($tournament_id,$tipo_torneo){
		
        if ($tipo_torneo == 'ida'){
            $ida_vuelta = 0;
        }
        else{
            $ida_vuelta = 1;
        }
        
        $equipos = $this->admin_model_new->get_teams($tournament_id);
		$i = 0;
		
		foreach ($equipos as $row)
		{
		   $equipos_id[$i] = $row['team_id'];	
		   $i++;
		}
		#GENERO EL EQUIPO FANTASMA CON ID = 0
		if ($i % 2 == 1) { 
			$equipos_id[$i] = 0;
		}
		
		$this->admin_model_new->show_fixtures($equipos_id,$tournament_id,$ida_vuelta);
		
		$cant = sizeof($equipos);
		#de ahora en mas siempre dejo fase 1 y veo si lo puedo eliminar
		$fase = 1;
		
		$this->admin_model_new->generate_fechas($cant,$fase,$ida_vuelta);
		
		#seteo en 1 el campo generado de tipo_torneo
		$this->admin_model_new->se_genero_eltorneo($tournament_id);
	}
	
	
	#la uso en generate_tournament
	function get_teams($tournament_id){
        $this->db->select('team_id');
        $this->db->from('category_display');
        $this->db->where('category_id',$tournament_id);
		$this->db->order_by('orden','ASC');
		$this->db->order_by('id','ASC');

        $query = $this->db->get();
        
        # echo $this->db->last_query() . "<br>";

        $res = $query->result_array();
        return $res;
    }
	
	#la uso en generate_tournament
    function show_fixtures($team_ids,$tournament_id,$ida_vuelta)
    {
	   $teams = sizeof($team_ids);
	      
		#if odd number of teams add a "ghost". Esto no se va a dar porque yo genero el equipo 
		#fantasma anteriormente
		$ghost = false;
		if ($teams % 2 == 1) {
			$teams++;
			$ghost = true;
		}
		 // Generate the fixtures using the cyclic algorithm.
		$totalRounds = $teams - 1;
		$matchesPerRound = $teams / 2;
		$rounds = array();
		for ($i = 0; $i < $totalRounds; $i++) {
			$rounds[$i] = array();
		}
		for ($round = 0; $round < $totalRounds; $round++) {
			for ($match = 0; $match < $matchesPerRound; $match++) {
				$home = ($round + $match) % ($teams - 1);
				$away = ($teams - 1 - $match + $round) % ($teams - 1);
				// Last team stays in the same place while the others
				// rotate around it.
				if ($match == 0) {
					$away = $teams - 1;
				}
				$rounds[$round][$match] = $this->admin_model_new->team_name($home + 1, $team_ids) 
					. " vs " .  $this->admin_model_new->team_name($away + 1, $team_ids);
			}
   		}
	   
		// Interleave so that home and away games are fairly evenly dispersed.
		$interleaved = array();
		for ($i = 0; $i < $totalRounds; $i++) {
			$interleaved[$i] = array();
		}
		
		$evn = 0;
		$odd = ($teams / 2);
		for ($i = 0; $i < sizeof($rounds); $i++) {
			if ($i % 2 == 0) {
				$interleaved[$i] = $rounds[$evn++];
			} else {
				$interleaved[$i] = $rounds[$odd++];
			}
		}

    	$rounds = $interleaved;
		// Last team can't be away for every game so flip them
		// to home on odd rounds.
		for ($round = 0; $round < sizeof($rounds); $round++) {
			if ($round % 2 == 1) {
				$rounds[$round][0] = $this->admin_model_new->flip($rounds[$round][0]);
			}
		}
		for ($i = 0; $i < sizeof($rounds); $i++) {
			
			foreach ($rounds[$i] as $r){
				list($team1_id, $team2_id) = explode('vs', $r);
				
				$this->db->set('tournament_id', $tournament_id);
				$this->db->set('team1_id', $team1_id);
				$this->db->set('team2_id', $team2_id);
				$this->db->set('nro_fecha_id', $i+1);
				$this->db->insert('partidos');
				# echo $this->db->last_query() . "<br>";
	 			$res = $this->db->insert_id();
			}
    	}
		
		$k = $i;
		if ($ida_vuelta % 2 != 0) {
			# Second half is mirror of first half";
			$round_counter = sizeof($rounds) + 1;
			for ($i = sizeof($rounds) - 1; $i >= 0; $i--) {
				$round_counter += 1;
				foreach ($rounds[$i] as $r) {
					$r_flip = $this->admin_model_new->flip($r);
					list($team1_id, $team2_id) = explode('vs', $r_flip);
					$this->db->set('tournament_id', $tournament_id);
					$this->db->set('team1_id', $team1_id);
					$this->db->set('team2_id', $team2_id);
					$this->db->set('nro_fecha_id', $i+1+$k);
					$this->db->insert('partidos');
					$res = $this->db->insert_id();
					#echo $this->db->last_query() . "<br>";
				}
			}
		}
		else{
				#el torneo es una sola vuelta
			}
  	  }
	
	#la uso en generate_tournament
	function generate_fechas($cant,$fase,$ida_vuelta){
		$cant = $cant - 1;
		if ($ida_vuelta){
			$cant = $cant*2;
		}
	
		$this->db->from('fechas');
		$this->db->where('fase', $fase);
		$query = $this->db->get();
		$cant_actual =  $query->num_rows();

		$total = $cant - $cant_actual;
		if ($total > 0){
			for ($i=$cant_actual+1;$i<=$cant;$i++){
				$this->db->set('nro_fecha', $i);
				$this->db->set('dia_defecto', 'dd-mm');
				$this->db->set('fase',$fase);
				$this->db->insert('fechas');
				$this->db->insert_id();

			}
		}
	}
    
    #la uso en show_fixtures
	function flip($match) {
   	 	$components = explode(' vs ', $match);
   	 	return $components[1] . " vs " . $components[0];
	}
	
	#la uso en show_fixtures
	function team_name($num, $names) {
			$i = $num - 1;
		if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
			return trim($names[$i]);
		} else {
			return $num;
		}
	}
	
	function se_genero_eltorneo($tournament_id){
			$data = array(
            # TODO esto tiene que estar en 1
				'generado' => '1',
           	);
			$this->db->where('id', $tournament_id);
			$this->db->update('category', $data);
			$id_test = $this->db->insert_id();
	} 
	
	function get_category_by_id($id){
		$this->db->select('name_event');	
		$this->db->from('events');
		$this->db->where('id', $id);
		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";

		foreach ($query->result() as $row){
			return $row->name_event;
		}
	}
	
	function generate_table_positions($tournament_id){
        
		$teams = $this->admin_model_new->get_teams($tournament_id);
		foreach ($teams as $team){
			$this->db->set('team_id', $team['team_id']);
            $this->db->set('category_id', $tournament_id);
			$this->db->insert('posiciones');
			}
			return $teams;
	}
	function get_fechas(){
		
		$this->db->select('id');
		$this->db->from('fechas');
		$this->db->where("actual", "1");

		$query = $this->db->get();
		
		#segunda consulta
		$this->db->select('id,nro_fecha,fase');
		$this->db->from('fechas');
		
		#si pasa esto es porq ya arranco la 2da parte del torneo
		if ($query->num_rows() > 0)
		{
			$this->db->order_by("fase", "desc"); 
			$this->db->order_by("actual", "desc");
			$this->db->order_by("nro_fecha", "asc"); 
		}
		else{
			$this->db->order_by("actual", "desc");
			$this->db->order_by("fase", "asc"); 
			$this->db->order_by("nro_fecha", "asc"); 
		}	
		
	
		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";
		if ($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				if($row['fase'] == 1){
					$fase = 'fases';
				}
				else{
					$fase = 'campeonatos';
				}
				$show = $row['nro_fecha'] . " (" . $fase . ")" ;	
				$combo[$row['id']]= $show;	
				}
			return $combo;
			}	
	}
    
    function get_event_by_id($event_id){
        	
        $this->db->select('name_event, category_id');
		$this->db->from('events');
		$this->db->where('id',$event_id);
		$query = $this->db->get();
		$torneo = $query->result();
		return $torneo;
    }
    
    function get_reglamento(){
		$this->db->from('reglamento');
		$this->db->order_by('titulo');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_team_category($team_id)
	{
		$this->db->select('name_event');	
		$this->db->from('events t');
		$this->db->join('equipos e','e.category_id=t.id');
		$this->db->where('e.id', $team_id);
		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";

        if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->name_event;
		  
		}
	}
	
	function get_partidos_por_fecha()
	{
		
		$this->db->select('eq1.name equipo1,eq2.name equipo2,c.id as id_category,p.time as horario,p.court as cancha');	
		$this->db->from('partidos p');
		$this->db->join('fechas f','f.id = p.nro_fecha_id');
		$this->db->join('category c','c.id = p.tournament_id');
		$this->db->join('equipos eq1','eq1.id = p.team1_id');
		$this->db->join('equipos eq2','eq2.id = p.team2_id');
		$this->db->where('f.actual', 1);
		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";

        if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
	function get_tipo_torneos()
	{

		$query = $this->db->query("SHOW COLUMNS FROM category LIKE 'tipo'");	

		foreach ($query->result() as $row){
			$enums = $row->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $enums, $enum_array );
			$enum_fields = $enum_array[1];
		}
		
		foreach($enum_fields as $enum_data){
			$combo[$enum_data]=$enum_data;	
		}
		return $combo;
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
	
	function convert_to_ul($tree, $id, $html,$url_link){
			
	  if (isset($tree[$id]['name'])){
	  //~ if (isset($tree[$id]['name']) & ($tree[$id]['tipo'] == 'ida' )){
			if($tree[$id]['tipo'] == "nodo"){
				$html .= 
					'<li>' .
						'<span class="nav-click"></span>' . $tree[$id]['name'] ;
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
			$html .= $this->admin_model_new->convert_to_ul($tree, $arChildren[$i], "",$url_link);
		}
		$html .= '</ul>'.PHP_EOL;
	  }

	  $html .= '</li>'.PHP_EOL;
	  return $html;
	}
	
	function parse_tree ($url_link) {
	
	    $tree = $this->admin_model_new->get_category_tree();
		$too  = $this->admin_model_new->convert_to_ul($tree, 0, "",$url_link);
		
		return $too;
	}
	
	
	function get_data_category_by_id($id){
		$this->db->select('name_category,show,tipo,generado');	
		$this->db->from('category');
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row){
			return $row;
		}
	}
	
	function get_all_teams_from_category_display_by_categoryid($category_id){
        $this->db->select('team_id,e.name as nombre_equipo,cd.orden as el_orden');
        $this->db->from('category_display cd');
		$this->db->join('equipos e','e.id=cd.team_id');
        $this->db->where('cd.category_id',$category_id);
		$this->db->order_by('cd.orden','ASC');
		$this->db->order_by('name','ASC');

        $query = $this->db->get();
        $res = $query->result();
        
        if ($query->num_rows() > 0)
		{
		  return $res;
		}
		else{
			return 0;
		}
    }
    
    	function get_partidos($tournament_id,$actual_fecha_id){
		$this->db->select('p.id as p_id,e1.name as name_equipo1,e2.name as name_equipo2,nro_fecha,date,time,court,team1_res,team2_res,cargado');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->join('fechas f','f.nro_fecha= p.nro_fecha_id');
		$this->db->where('tournament_id',$tournament_id);
		$this->db->where('f.id',$actual_fecha_id);
		$query = $this->db->get();
		//~ echo $this->db->last_query() . "<br>";
		$partidos = $query->result();
		return $partidos;
	}
	
    function set_horarios($partidos_id,$dias,$horarios,$canchas)
		{
	 	$i = 1; 
		foreach ($partidos_id as $partido)
		{
		
			#esto actualiza los horarios de partidos
			$data = array(
				'date' => $dias[$i],
				'time' => $horarios[$i],
				'court' => $canchas[$i],
           	);
         	$this->db->where('id', $partido);
			$this->db->update('partidos', $data);
			$this->db->insert_id();
			
			$i++;
    	}  
	}
	
    function set_results($partidos_id,$result1,$result2,$cargados,$perdidos){
		$i = 1;
		foreach ($partidos_id as $partido)
		{		
				#esto actualiza los partidos que no fueron seteados
				if (!$cargados[$i]){
					if ($perdidos[$i]){
						#Perdieron los dos equipos se le pone 0 a 0 pero no se suman los puntos
						$data = array(
							'team1_res' => '0',
							'team2_res' => '0',
							'cargado' => '1',
						);
						$this->db->where('id', $partido);
						$this->db->update('partidos', $data);
						$this->db->insert_id();
					}
				else {
					$data = array(
							'team1_res' => $result1[$i],
							'team2_res' => $result2[$i],
							'cargado' => '1',
						);
						$this->db->where('id', $partido);
						$this->db->update('partidos', $data);
						$this->db->insert_id();
				}
			}
			else{
				#echo "esos partidos fueron seteados anteriormente: " . $partido . "<br>";
			}	
			$i++;
    	}  
	}
    
    function update_positions($partidos,$cargado,$actual_perdido){
		if (!$cargado){
			if  ($actual_perdido){
				$this->ambos_perdieron($partidos->team1_id,$partidos->team2_id);
			}
			else {
				if ($partidos->team1_res == $partidos->team2_res){
					$this->empate($partidos->team1_id,$partidos->team2_id,$partidos->team1_res,$partidos->team2_res);
				}
				else if ($partidos->team1_res > $partidos->team2_res){
					$this->ganador($partidos->team1_id,$partidos->team2_id,$partidos->team1_res,$partidos->team2_res);
				}
				else {
					$this->ganador($partidos->team2_id,$partidos->team1_id,$partidos->team2_res,$partidos->team1_res);
				}
			}
		}
		else{
				#equipo ya cargado
			}
	}
	
    
    	function empate($team1_id,$team2_id, $team1_res, $team2_res){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pe', 'pe + 1', FALSE);
			$gf = 'gf+'. $team1_res;
			$gc = 'gc-'. $team2_res;
			$dg = 'dg+' . $team1_res . "-" . $team2_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->set('ptos', 'ptos + 1', FALSE);
			$this->db->where('team_id', $team1_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
	
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pe', 'pe + 1', FALSE);
			$gf = 'gf+'. $team2_res;
			$gc = 'gc-'. $team1_res;
			$dg = 'dg+' . $team2_res . "-" . $team1_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->set('ptos', 'ptos + 1', FALSE);
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$res = $this->db->insert_id();

	}

	function ganador($team1_id,$team2_id, $team1_res, $team2_res){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pg', 'pg + 1', FALSE);
			$gf = 'gf+'. $team1_res;
			$gc = 'gc-'. $team2_res;
			$dg = 'dg+' . $team1_res . "-" . $team2_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->set('ptos', 'ptos + 3', FALSE);
			$this->db->where('team_id', $team1_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
	
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pp', 'pp + 1', FALSE);
			$gf = 'gf+'. $team2_res;
			$gc = 'gc-'. $team1_res;
			$dg = 'dg+' . $team2_res . "-" . $team1_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$res = $this->db->insert_id();
	}
	
	function ambos_perdieron($team1_id,$team2_id){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pp', 'pp + 1', FALSE);
			$this->db->where('team_id', $team1_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
			
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pp', 'pp + 1', FALSE);
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
	}
    
    function get_team_by_match($partido_id)
	{
		$this->db->select('team1_id, team2_id,team1_res,team2_res, e1.name as equipo1_name, e2.name as equipo2_name');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->where('p.id',$partido_id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row;
		}
	}
    
    function get_all_players_combo($team_id)
	{
		$this->db->from('jugadores');
		$this->db->where('team_id',$team_id);
		$this->db->order_by('last_name','asc');		
		$query = $this->db->get();	
		if ($query->num_rows() > 0 ) {
			foreach($query->result_array() as $row){
				$full_name = $row['name'] . " " . $row['last_name'];
				$combo[$row['id']] = $full_name;	
				}
					
		}
		$combo[0] = 'Otro';
		return $combo;	
	}
    
    function set_goleadores($goleadores_id){
		foreach ($goleadores_id as $goleador_id){
			$this->db->set('goal', 'goal + 1', FALSE);
			$this->db->where('id', $goleador_id);
			$this->db->update('jugadores');
			$res = $this->db->insert_id();
			}
	}
	

    function get_goleadores_new($category_id){
        $query = $this->db->query('SELECT j.name as name_jugador, j.last_name, j.goal,e.name as name_equipo
        
                FROM  jugadores j
                JOIN equipos e ON e.id  = j.team_id
                WHERE team_id IN (SELECT team_id FROM category_display WHERE category_id = '. $category_id . 
                        ' AND goal != 0 )
               
                ORDER by goal desc,e.name asc
                LIMIT 20
                '
        );	
		return $query->result();

    }



    function get_equipos_from_category_display($tournament_id){
        
        $query = $this->db->query('SELECT name, id FROM equipos 
		WHERE activo = 1
		AND ID IN (SELECT team_id FROM category_display WHERE category_id = '. $tournament_id . ')');	
        
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		$combo[0] = 'Elegir equipo';

		return $combo;
	}
    
     function generate_match($team1_id,$team2_id,$tournament_id,$fecha_id){
		  
		 		$this->db->set('tournament_id', $tournament_id);
				$this->db->set('team1_id', $team1_id);
				$this->db->set('team2_id', $team2_id);
				$this->db->set('nro_fecha_id', $fecha_id);
				$this->db->insert('partidos');
	 			$res = $this->db->insert_id();
		}  
    
    function get_positions($tournament_id){
		$this->db->select('p.id as position_id,e.name as name_equipo,e.id as id_equipo,pj,pg,pe,pp,gf,gc,dg,ptos');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->where('p.category_id', $tournament_id);
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$this->db->order_by('name_equipo','ASC');
		$query = $this->db->get();
		$posiciones = $query->result();
		# echo $this->db->last_query() . "<br>";
		return $posiciones;
	}
	
	function delete_team_totalmente($team_id){
		$this->db->delete('equipos', array('id' => $team_id));
		$this->db->delete('equipos_info', array('team_id' => $team_id));
		$this->db->delete('equipos_users', array('team_id' => $team_id));
		$this->db->delete('jugadores', array('team_id' => $team_id));
		$this->db->delete('partidos', array('team1_id' => $team_id));
		$this->db->delete('partidos', array('team2_id' => $team_id));
		$this->db->delete('posiciones', array('team_id' => $team_id));
	}
	
	function update_equipos_activado($activates, $equipos_ids){
		$i = 0;
		foreach ($equipos_ids as $a){
			$ids[$i] = $a;
			$i++;
		}
		
		$i = 0;
		foreach ($activates as $post){
			$data = array(
				'activo' => $post,
           	);
			$this->db->where('id', 	$ids[$i]);
			$this->db->update('equipos', $data);
			$id_test = $this->db->insert_id();
			#echo $this->db->last_query() . "<br>";
			$i++;
		}
	}
	
	
}
		
