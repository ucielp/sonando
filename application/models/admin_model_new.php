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
	
	function get_all_teams_nocategory(){
		
		$query = $this->db->query('SELECT e.id as e_id,e.name as e_name, t.id as t_id,eq.password as psswd, e.orden as orden FROM equipos e 
		JOIN events t ON t.id = e.category_id
		JOIN equipos_users eq ON eq.team_id = e.id
		UNION 
		SELECT eq.id as e_id,eq.name as e_name, 0,eqp.password as psswd,0 as t_id FROM equipos eq 
        JOIN equipos_users eqp ON eqp.team_id = eq.id
        WHERE eq.category_id = 0 
		ORDER BY t_id ASC, e_name ASC');	
		//~ echo $this->db->last_query() . "<br>";

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
	
	function generate_fase($event_id,$ida_vuelta){
		$equipos = $this->admin_model_new->get_teams($event_id);
		$i = 0;
		
		foreach ($equipos as $row)
		{
		   $equipos_id[$i] = $row['id'];	
		   $i++;
		}
		#GENERO EL EQUIPO FANTASMA CON ID = 0
		if ($i % 2 == 1) { 
			$equipos_id[$i] = 0;
		}
		
		$this->admin_model_new->show_fixtures($equipos_id,$event_id,$ida_vuelta);
		
		$cant = sizeof($equipos);
		#esto es para fases
		$fase = 1;
		
		$this->admin_model_new->generate_fechas($cant,$fase,$ida_vuelta);
		
		#seteo en 1 el campo generado de tipo_torneo
		$this->admin_model_new->se_genero_eltorneo($event_id);
	}
	
	
	#la uso en generate_fase
	function get_teams($event_id){
        $this->db->select('id,name');
        $this->db->from('equipos');
        $this->db->where('category_id',$event_id);
		$this->db->order_by('orden','ASC');
		$this->db->order_by('name','ASC');

        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
    }
	
	#la uso en generate_fase
    function show_fixtures($team_ids,$event_id,$ida_vuelta)
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
				$rounds[$round][$match] = $this->admin_model->team_name($home + 1, $team_ids) 
					. " vs " .  $this->admin_model->team_name($away + 1, $team_ids);
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
				$rounds[$round][0] = $this->admin_model->flip($rounds[$round][0]);
			}
		}
		for ($i = 0; $i < sizeof($rounds); $i++) {
			
			foreach ($rounds[$i] as $r){
				list($team1_id, $team2_id) = explode('vs', $r);
				
				$this->db->set('tournament_id', $event_id);
				$this->db->set('team1_id', $team1_id);
				$this->db->set('team2_id', $team2_id);
				$this->db->set('nro_fecha_id', $i+1);
				$this->db->insert('partidos');
				
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
					$r_flip = $this->admin_model->flip($r);
					list($team1_id, $team2_id) = explode('vs', $r_flip);
					$this->db->set('tournament_id', $event_id);
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
	
	#la uso en generate_fase
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
	
	function se_genero_eltorneo($event_id){
			$data = array(
				'generado' => '1',
           	);
			$this->db->where('id', $event_id);
			$this->db->update('events', $data);
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
	
	function generate_table_positions($event_id,$fase){
		$teams = $this->admin_model_new->get_teams($event_id);
		foreach ($teams as $team){
			$this->db->set('team_id', $team['id']);
			$this->db->set('fase', $fase);
			$this->db->insert('posiciones');
			}
			return $teams;
	}
	function get_fechas(){
		
		$this->db->select('id');
		$this->db->from('fechas');
		$this->db->where("actual", "1");
		$this->db->where("fase", "2");

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
		
		$this->db->select('eq1.name equipo1,eq2.name equipo2,e.name_event,p.time as horario,p.court as cancha');	
		$this->db->from('partidos p');
		$this->db->join('fechas f','f.id = p.nro_fecha_id');
		$this->db->join('events e','e.id = p.tournament_id');
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
	
}
		
