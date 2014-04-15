<?php 

class Admin_model extends CI_Model{

	function __construct()

	{

		parent::__construct();

	}
	
	
	function update_jugadores($ids_elec,$ids_cert,$ids_inscriptos){
		if ($ids_elec){
			foreach( $ids_elec as $id => $val)
			{
			$data = array(
				'electro' => $val,
           	);
			
			$this->db->where('id', $id);
			$this->db->update('jugadores', $data);
			$id_test = $this->db->insert_id();
			} 	
		}
		if ($ids_cert){
			foreach( $ids_cert as $id => $val)
			{
			$data = array(
				'certificado' => $val,
           	);
			
			$this->db->where('id', $id);
			$this->db->update('jugadores', $data);
			$id_test = $this->db->insert_id();
			} 	
		}
		if ($ids_inscriptos){
			foreach( $ids_inscriptos as $id => $val)
			{
			$data = array(
				'inscripto' => $val,
           	);
			
			$this->db->where('id', $id);
			$this->db->update('jugadores', $data);
			$id_test = $this->db->insert_id();
			} 	
		}
	}
		
	function get_goleadores($category_id){
	   $this->db->select('j.name as name_jugador, j.last_name, j.goal,e.name as name_equipo');
	   $this->db->from('jugadores j');
	   $this->db->join('equipos e','e.id = j.team_id');
	   $this->db->join('tipo_torneo c','c.id = e.actual_fase1_id');
	   #$this->db->join('tipo_torneo c','c.id = e.category_id');
	   
	   $this->db->where('c.id',$category_id);
	   $this->db->where('j.goal > ','0');

	   $this->db->limit(20);
	   $this->db->order_by('j.goal desc, e.name asc'); 
	   $query = $this->db->get();
	   $goleadores = $query->result();
	   return $goleadores;
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
	
	function set_results_elim($partidos_id,$result1,$result2,$pen1,$pen2,$cargados,$perdidos){
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
							'team1_pen' => '0',
							'team2_pen' => '0',
							'cargado' => '1',
						);
						$this->db->where('id', $partido);
						$this->db->update('partidos_elimin', $data);
						$this->db->insert_id();
					}
				else {
					$data = array(
							'team1_res' => $result1[$i],
							'team2_res' => $result2[$i],
							'team1_pen' => $pen1[$i], 
							'team2_pen' => $pen2[$i],
							'cargado' => '1',
						);
						$this->db->where('id', $partido);
						$this->db->update('partidos_elimin', $data);
						$this->db->insert_id();
				}
			}
			else{
				#echo "esos partidos fueron seteados anteriormente: " . $partido . "<br>";
			}	
			$i++;
    	}  
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
	
	function set_horarios_elim($partidos_id,$dias,$horarios,$canchas)
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
			$this->db->update('partidos_elimin', $data);
			$this->db->insert_id();
			
			$i++;
    	}  
	}
	
	function to_excel_model($id_partido){
		
		
		$this->db->select('team1_id,team2_id,e1.name as equipo1_name, e2.name as equipo2_name');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->where('p.id',$id_partido);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
		  	$equipo1 = $row->team1_id;
			$equipo2 = $row->team2_id;
			
			$name_equipo1 = $row->equipo1_name;
			$name_equipo2 = $row->equipo2_name;
			
			$this->get_players_ficha($equipo1,$name_equipo1,'1');
			$this->get_players_ficha($equipo2,$name_equipo2,'2');
			
		}
		
		$array = array(
			
		);

		$this->load->helper('csv');
		
		$file_name = $name_equipo1 . "_vs_" . $name_equipo2 . ".csv";
		
		array_to_csv($array,$file_name);
	}
    
	### Estas dos son las nuevas funciones para sacar los datos para armar la planilla
    function get_equipos_partidos($id_partido){
		$this->db->select('tournament_id,team1_id,team2_id,e1.name as equipo1_name, e2.name as equipo2_name,court,time,nro_fecha');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
        $this->db->join('fechas f','f.id = p.nro_fecha_id');
		$this->db->where('p.id',$id_partido);
		$query = $this->db->get();
		$teams = $query->result();
        
        //~ echo $this->db->last_query() . "<br>";

		return $teams;
	}	
    
    function get_equipos_partidos_elimin($id_partido){
		$this->db->select('tournament_id,team1_id,team2_id,e1.name as equipo1_name, e2.name as equipo2_name,court,time');
		$this->db->from('partidos_elimin p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->where('p.id',$id_partido);
		$query = $this->db->get();
		$teams = $query->result();
		return $teams;
	}	
	
    function get_tipo_torneo($tournament_id){
        	
        $this->db->select('type, category');
		$this->db->from('tipo_torneo');
		$this->db->where('id',$tournament_id);
		$query = $this->db->get();
		$torneo = $query->result();
		return $torneo;
    }
    
    
    function get_tipo_torneo_elimin($tournament_id){
        $this->db->select('type, category,name');
		$this->db->from('tipo_torneo');
		$this->db->where('id',$tournament_id);
		$query = $this->db->get();
		$torneo = $query->result();
		return $torneo;
    }
    
	function show_players_ficha($equipo_id){
			
	
		$this->db->select('name as nombre,last_name as apellido, dni, birth,certificado,electro,inscripto');
		$this->db->from('jugadores');
		$this->db->where('team_id',$equipo_id);

		#$this->db->where('inscripto','1');

		$certificado = 'No';
		$electro = 'No';
		$inscripto = 'No';
		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";

		return $query->result();
	}
	
	function to_excel_model_elim($id_partido){
		
		
		$this->db->select('team1_id,team2_id,e1.name as equipo1_name, e2.name as equipo2_name');
		$this->db->from('partidos_elimin p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->where('p.id',$id_partido);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
		  	$equipo1 = $row->team1_id;
			$equipo2 = $row->team2_id;
			
			$name_equipo1 = $row->equipo1_name;
			$name_equipo2 = $row->equipo2_name;
			
			$this->get_players_ficha($equipo1,$name_equipo1,'1');
			$this->get_players_ficha($equipo2,$name_equipo2,'2');
			
		}
		
		$array = array(
			
		);

		$this->load->helper('csv');
		
		$file_name = $name_equipo1 . "_vs_" . $name_equipo2 . ".csv";
		
		array_to_csv($array,$file_name);
	}

	function get_players_ficha($equipo_id,$nombre_equipo,$nro_equipo){
		
		if 	($nro_equipo == 2){
				#echo ";;;;;";
			}
			
		echo $nombre_equipo . "\n";
		
		echo "Nombre;Cert;Elec;Inscr\n";	
		$this->db->select('name as nombre,last_name as apellido	,certificado,electro,inscripto');
		$this->db->from('jugadores');
		$this->db->where('team_id',$equipo_id);
		#$this->db->where('inscripto','1');
		
		$query = $this->db->get();
		$certificado = 'No';
		$electro = 'No';
		$inscripto = 'No';
		
		#$this->load->database();
		#$this->load->helper('csv');
		#$name_file = 'toto.csv';
		#query_to_csv($query, TRUE, $name_file);
		
		if ($query->num_rows() > 0)
		{
		foreach ($query->result() as $row){
			if ($row->certificado){
			$certificado = 'Si';
			}
			if ($row->electro){
				$electro = 'Si';
			}
			if ($row->inscripto){
				$inscripto = 'Si';
			}
			if 	($nro_equipo == 2){
				#echo ";;;;;";
			}
			echo $row->nombre . " " . $row->apellido   . ";" .  $certificado  . ";" .  $electro  . ";" . $inscripto . "\n";
			}		
		}
		
	}

	function update_results($posiciones_id,$pg,$pe,$pp,$gf,$gc)
		{
	 	$i = 1; 
		foreach ($posiciones_id as $posicion_id)
		{
			$pj = $pg[$i]+$pe[$i]+$pp[$i];
			$dg = $gf[$i] + $gc[$i];
			$ptos = 3*$pg[$i] + $pe[$i];
			$data = array(
				'pj' => $pj,
				'pg' => $pg[$i],
				'pe' => $pe[$i],
				'pp' => $pp[$i],
				'gf' => $gf[$i],
				'gc' => $gc[$i],
				'dg' => $dg,
				'ptos' => $ptos,
		   	);
         	$this->db->where('id', $posicion_id);
			$this->db->update('posiciones', $data);
			$this->db->insert_id();
			#echo $this->db->last_query() . "<br>";
			$i++;
    	}  
	
	}
	
	function generate_table_positions($tournament_id,$fase){
		$teams = $this->admin_model->get_teams($tournament_id);
		foreach ($teams as $team){
			$this->db->set('team_id', $team['id']);
			$this->db->set('fase', $fase);
			$this->db->insert('posiciones');
			}
			return $teams;
	}
	

	function update_positions($partidos,$fase,$cargado,$actual_perdido){
		if (!$cargado){
			if  ($actual_perdido){
				$this->ambos_perdieron($fase,$partidos->team1_id,$partidos->team2_id);
			}
			else {
				if ($partidos->team1_res == $partidos->team2_res){
					$this->empate($fase,$partidos->team1_id,$partidos->team2_id,$partidos->team1_res,$partidos->team2_res);
				}
				else if ($partidos->team1_res > $partidos->team2_res){
					$this->ganador($fase,$partidos->team1_id,$partidos->team2_id,$partidos->team1_res,$partidos->team2_res);
				}
				else {
					$this->ganador($fase,$partidos->team2_id,$partidos->team1_id,$partidos->team2_res,$partidos->team1_res);
				}
			}
		}
		else{
				#equipo ya cargado
			}
	}
	
	
		function empate($fase,$team1_id,$team2_id, $team1_res, $team2_res){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pe', 'pe + 1', FALSE);
			$gf = 'gf+'. $team1_res;
			$gc = 'gc-'. $team2_res;
			$dg = 'dg+' . $team1_res . "-" . $team2_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->set('ptos', 'ptos + 1', FALSE);
			$this->db->where('fase', $fase );
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
			$this->db->where('fase', $fase );
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$res = $this->db->insert_id();

	}

	function ganador($fase,$team1_id,$team2_id, $team1_res, $team2_res){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pg', 'pg + 1', FALSE);
			$gf = 'gf+'. $team1_res;
			$gc = 'gc-'. $team2_res;
			$dg = 'dg+' . $team1_res . "-" . $team2_res;
			$this->db->set('gf', $gf, FALSE);
			$this->db->set('gc', $gc, FALSE);
			$this->db->set('dg', $dg, FALSE);
			$this->db->set('ptos', 'ptos + 3', FALSE);
			$this->db->where('fase', $fase );
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
			$this->db->where('fase', $fase );
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$res = $this->db->insert_id();
	}
	
	function ambos_perdieron($fase,$team1_id,$team2_id){
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pp', 'pp + 1', FALSE);
			$this->db->where('fase', $fase );
			$this->db->where('team_id', $team1_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
			
			$this->db->set('pj', 'pj + 1', FALSE);
			$this->db->set('pp', 'pp + 1', FALSE);
			$this->db->where('fase', $fase );
			$this->db->where('team_id', $team2_id);
			$this->db->update('posiciones');
			$this->db->insert_id();
	}	
	function set_goleadores($goleadores_id){
		
		foreach ($goleadores_id as $goleador_id){
			$this->db->set('goal', 'goal + 1', FALSE);
			$this->db->where('id', $goleador_id);
			$this->db->update('jugadores');
			$res = $this->db->insert_id();
			}
	}
	
	function get_team_name($team_id){
		$this->db->select('name');	
		$this->db->from('equipos');
		$this->db->where('id', $team_id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->name;
		}
	}
	
	function create_team($team_name,$category_id){
		$this->db->set('name', $team_name);
		$this->db->set('category_id', $category_id);
		$this->db->set('actual_fase1_id', $category_id);
		$this->db->insert('equipos');
		return $this->db->insert_id();
	}
	function create_team_info($team_id){
		$this->db->set('team_id', $team_id);
		$this->db->insert('equipos_info');
		return $this->db->insert_id();
	}
	
	function set_sancion($id_jugador,$sancion,$observacion,$tournament_id,$nro_fecha){
		$this->db->set('player_id', $id_jugador);
		$this->db->set('sancion', $sancion);
		$this->db->set('observacion', $observacion);
		$this->db->set('tipo_torneo_id', $tournament_id);
		$this->db->set('fecha', $nro_fecha);
		$this->db->insert('sanciones');
		#echo $this->db->last_query() . "<br>";

		return $this->db->insert_id();
	}
	
	function get_tournament_by_player_id($player_id){
		$this->db->select('t.id,actual_fase2_id');
		$this->db->from('tipo_torneo t');
		$this->db->join('equipos e','e.actual_fase1_id = t.id');
		$this->db->join('jugadores j','j.team_id = e.id');
		$this->db->where('j.id',$player_id);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   if ($row->actual_fase2_id == 0){
			   
			    $this->db->select('t.id,actual_fase1_id');
				$this->db->from('tipo_torneo t');
				$this->db->join('equipos e','e.actual_fase1_id = t.id');
				$this->db->join('jugadores j','j.team_id = e.id');
				$this->db->where('j.id',$player_id);
				$query = $this->db->get();
				if ($query->num_rows() > 0)
				{
					$row = $query->row(); 
					return $row->actual_fase1_id;
				}
		   	}	
		    else return $row->actual_fase2_id ;
			}	
		
		}
	function create_equipos_users($team_id,$username, $password){
		$this->db->set('team_id', $team_id);
		$this->db->set('user', $username);
		$this->db->set('password', $password);
		$this->db->insert('equipos_users');
		return $this->db->insert_id();
	}
	
	function get_equipo_info($team_id){
		$this->db->from('equipos_info');
		$this->db->where('team_id',$team_id);
		$query = $this->db->get();

		return $query->result();
	}
	
	function get_details(){
		$this->db->from('equipos_users');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function send_mail_insc($detail){
		$email = $detail->email;
		$cuerpo = "Hola, " . $detail->user . "\n" .
		    "Está por comenzar una nueva fase del torneo y a partir de acá no se pueden ingresar nuevos jugadores."  . "\n" . 
			"Además vamos a lanzar proximamente un nuevo sitio de internet." . "\n" . 
			"Es por esto que tienen que PREINSCRIBIR a todos los jugadores (aunque los hayan anotado a principio del campeonato) y dar información del equipo, mediante un usuario y contraseña, ingresando a esta página: http://www.soñandoconelgol.com.ar/. El usuario y contraseña son personales para cada equipo." . "\n" . "\n" .
			"Usuario: " . $detail->user . "\n" . 
			"Contraseña: " . $detail->password . "\n" . "\n" .
			"Una vez que hayan:" . "\n"
			. "- ingresado todos los jugadores (obligatorio)," . "\n"
			. "- asignado el capitán, delegado y subdelegado (obligatorios)," . "\n"
			. "- ingresado la historia de tu equipo (opcional)," . "\n"
    		. "- cargado la foto del equipo (opcional) y" . "\n"
		  	. "- elegido los colores de la camisetas titular y alternativa (opcionales)." .  "\n"
			. "Tienen que mandar un email a info@torneostella.com.ar con el asunto PREINSCRIPCION para que los jugadores sean reinscriptos (habilitados) definitivamente por los organizadores del torneo. Ellos van a chequear que los datos obligatorios sean correctos, que los jugadores hayan entregado el certificado médico y el electrocardiograma y que estén habilitados para jugar. ,"  . "\n" 
			. "Todos los datos se pueden modificar siempre antes de haber enviado el mail confirmando la preinscripción. Luego de esto no se pueden modificar jugadores salvo
el permiso especial de los organizadores del torneo. Hay tiempo hasta el Sábado 19 de Noviembre para hacerlo" . "\n" 
  . "Saludos. " . "\n" . "Organización torneo Soñando Con el Gol (Stella Maris).";
		
		$this->load->library('email');
	
		$this->email->from('inscripcion@soñandoconelgol.com.ar', 'Soñando con el Gol');
		$this->email->to($email);
		$this->email->bcc('inscripcion@xn--soandoconelgol-rnb.com.ar'); 
		
		$this->email->subject('Preinscripción - Soñando con el Gol (Stella Maris)');
		$this->email->message($cuerpo);
		
		$this->email->send();
		
		echo $this->email->print_debugger();

	}
	
	
	function get_equipos(){
		$this->db->select('id, name');	
		$this->db->from('equipos');
		$this->db->order_by('category_id','asc');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		return $combo;
	}
		
	function get_equipos_swap(){
		$this->db->select('id, name');	
		$this->db->from('equipos');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		
		$combo[0] = 'Elegir equipo';

		return $combo;
	}	
	function change_team_name($team_id,$new_name) {
		$datos1 = array(
				'name' => $new_name,
           	);
			
		$this->db->where('id', $team_id);
		$this->db->update('equipos', $datos1);
		$this->db->insert_id();
		
			$datos2 = array(
				'user' => $new_name,
           	);
		$this->db->where('team_id', $team_id);
		$this->db->update('equipos_users', $datos2);
		$this->db->insert_id();
		
		$datos3 = array(
				'username' => $new_name,
				'email' => $new_name,
           	);
		$this->db->where('team_id', $team_id);
		$this->db->update('users', $datos3);
		$this->db->insert_id();
		
	}	
	function swap_teams($team1_id,$team2_id){
		
		#saco la categoria del 1ero
		$this->db->select('actual_fase1_id');	
		$this->db->from('equipos');
		$this->db->where('id',$team1_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   $cat_team1 =  $row->actual_fase1_id;  
		}	
		
		#saco la categoria del 2do
		$this->db->select('actual_fase1_id');	
		$this->db->from('equipos');
		$this->db->where('id',$team2_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   $cat_team2 =  $row->actual_fase1_id;  
		}
		
		###partidos TENGO QUE HACERLO TEMPORAL	
		$temp_nro = '99999';
		$data = array(
				'team1_id' =>  $temp_nro,
           	);
		$this->db->where('team1_id', $team2_id);
		$this->db->update('partidos', $data);
		$this->db->insert_id();	
				
		$data = array(
				'team2_id' =>  $temp_nro,
           	);
		$this->db->where('team2_id', $team2_id);
		$this->db->update('partidos', $data);
		$this->db->insert_id();			

		$data = array(
				'team1_id' =>  $team2_id,
           	);
		$this->db->where('team1_id', $team1_id);
		$this->db->update('partidos', $data);
		$this->db->insert_id();	
				
		$data = array(
				'team2_id' =>  $team2_id,
           	);
		$this->db->where('team2_id', $team1_id);
		$this->db->update('partidos', $data);
		$this->db->insert_id();		
		
		#cambio el temporal
		$data = array(
				'team1_id' =>  $team1_id,
           	);
		$this->db->where('team1_id', $temp_nro);
		$this->db->update('partidos', $data);
		$this->db->insert_id();	
				
		$data = array(
				'team2_id' =>  $team1_id,
           	);
		$this->db->where('team2_id', $temp_nro);
		$this->db->update('partidos', $data);
		$this->db->insert_id();	

		#equipos TENGO QUE HACERLO TEMPORAL
		
		$data = array(
				'category_id' =>  $cat_team2,
				'actual_fase1_id' =>  $cat_team2,
           	);
		$this->db->where('id', $team1_id);
		$this->db->update('equipos', $data);
		$this->db->insert_id();
		
		$data = array(
				'category_id' =>  $cat_team1,
				'actual_fase1_id' =>  $cat_team1,
           	);
		$this->db->where('id', $team2_id);
		$this->db->update('equipos', $data);
		$this->db->insert_id();
		
		####posiciones 
		$temp_nro = '99999';
		$data = array(
				'team_id' =>  $temp_nro,
           	);
		$this->db->where('team_id', $team2_id);
		$this->db->where('fase', '1');
		$this->db->update('posiciones', $data);
		$this->db->insert_id();	
		
			$data = array(
				'team_id' =>  $team2_id,
           	);
		$this->db->where('team_id', $team1_id);
		$this->db->where('fase', '1');
		$this->db->update('posiciones', $data);
		$this->db->insert_id();
	
		$data = array(
				'team_id' =>  $team1_id,
           	);
		$this->db->where('team_id', $temp_nro);
		$this->db->where('fase', '1');
		$this->db->update('posiciones', $data);
		$this->db->insert_id();			
		
		#Update posiciones SET team_id = $team1_id where team_id = $team2_id and fase = 1;
		#Update posiciones SET team_id = $team2_id where team_id = $team1_id and fase = 1;

		################
		#UPDATE partidos SET `team1_id` = $team1_id where `team1_id` = $team2_id;
		#UPDATE partidos SET `team2_id` = $team1_id where `team2_id` = $team2_id;
		
		#UPDATE partidos SET `team1_id` = $team2_id where `team1_id` = $team1_id;
		#UPDATE partidos SET `team2_id` = $team2_id where `team2_id` = $team1_id;
		
		#Update equipos SET category_id = $cat_team2 where id = $team1_id;
		#Update equipos SET actual_fase_1 = $cat_team2 where id = $team1_id;

		#Update equipos SET category_id = $cat_team1 where id = $team2_id;
		#Update equipos SET actual_fase_1 = $cat_team1 where id = $team2_id;
		
	}	
	#me devuelve las categorias para poner en un comboBox
	function get_categories(){
		$this->db->select('id, category as name');	
		$this->db->from('tipo_torneo');
		$this->db->where('type','fase');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		return $combo;
	}
	
	
	
	function get_teams_combo($category_id){
		$this->db->select('id, name');	
		$this->db->from('equipos');
		$this->db->where('category_id',$category_id);
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$combo[$row['id']]=$row['name'];	
			}
		return $combo;
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
	
	function get_all_players($team_id)
	{
		$this->db->from('jugadores');
		$this->db->where('team_id',$team_id);
				$this->db->order_by('last_name,name','asc,asc');		

		$query = $this->db->get();	
		if ($query->num_rows() > 0 ) {
			return $query->result_array();		
		}	
	}
	function get_player($id)
	{
		$this->db->from('jugadores');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			foreach ($query->result() as $row){
				return $row;
			}	
		}	
		
	}
	
	#se pasa 1 si esta inscripto y 0 sino
	function get_players($team_id,$inscripto)
	{
		$this->db->from('jugadores');
		$this->db->where('team_id',$team_id);
		$this->db->where('inscripto',$inscripto);
		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			return $query->result_array();
		}	
	}
	
	function delete_player_temp($id_player_temp)
	{
		$this->db->delete('jugadores', array('id' => $id_player_temp)); 
	}
	
	function subir_foto($datos, $team_id){
		$this->db->where('team_id', $team_id);
		$this->db->update('equipos_info', $datos);
		$id_test = $this->db->insert_id();
		return $id_test;
	}
	
	#me devuelve los jugadores para poner en un comboBox
	function get_players_combo($team_id,$inscripto)
	{
		$this->db->from('jugadores');
		$this->db->where('team_id',$team_id);
		$this->db->where('inscripto',$inscripto);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			foreach($query->result_array() as $row){
				$full_name = $row['name'] . " " . $row['last_name'];
				$combo[$row['id']] = $full_name;	
				}
			return $combo;
		}	
		
	}
	
	function update_player($id,$datos){
		
		$this->db->where('id', $id);
		$this->db->update('jugadores', $datos);
		}
	function update_responsables($team_id, $responsables_ids){
		
		$this->db->where('id', $team_id);
		$this->db->update('equipos', $responsables_ids);
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
	
	function get_dia_defecto(){
		$this->db->select('dia_defecto');
		$this->db->from('fechas');
		$this->db->where("actual", "1");
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->dia_defecto;  
		}	
	}	
	
	
	function set_fecha_actual($new_fecha_actual,$dia){
			$data = array(
				'actual' => 0,
           	);
		
			$this->db->update('fechas', $data);
			$this->db->insert_id();			
			
			$data = array(
				'actual' => 1,
				'dia_defecto' => $dia
           	);
		
			$this->db->where('id', $new_fecha_actual);
			$this->db->update('fechas', $data);
			$this->db->insert_id();			
			
			
			#si pasa esto pongo la ultima fecha de 
			#la fase = 1 como 1 en actual asi se sigue mostrando
			$this->db->select('id');
			$this->db->from('fechas');
			$this->db->where("actual", "1");
			$this->db->where("fase", "2");

			$query = $this->db->get();
			#echo $this->db->last_query() . "<br>";
		
			if ($query->num_rows() > 0)
			{
				
				$this->db->select_max('id');
				$this->db->where("fase", "1");
				$query = $this->db->get('fechas');

			   $row = $query->row(); 
			   $id_actual =  $row->id;
			   
			   $data = array(
				'actual' => 1,
           		);
		
				$this->db->where('id', $id_actual);
				$this->db->update('fechas', $data);
				$this->db->insert_id();		
				#echo $this->db->last_query() . "<br>";
		  
			}
			
		}
	
	
	function get_partidos($tournament_id,$actual_fecha_id,$fase){
		$this->db->select('p.id as p_id,e1.name as name_equipo1,e2.name as name_equipo2,nro_fecha,date,time,court,team1_res,team2_res,cargado');
		$this->db->from('partidos p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		$this->db->join('fechas f','f.nro_fecha= p.nro_fecha_id');
		$this->db->where('tournament_id',$tournament_id);
		$this->db->where('f.id',$actual_fecha_id);
		$this->db->where('f.fase',$fase);
		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";
		$partidos = $query->result();
		return $partidos;
	}
	
	function get_partidos_elim($tournament_id){
		$this->db->select('p.id as p_id,e1.name as name_equipo1,e2.name as name_equipo2,date,time,court,team1_res,team2_res,team1_pen,team2_pen,cargado');
		$this->db->from('partidos_elimin p');
		$this->db->join('equipos e1','e1.id = p.team1_id');
		$this->db->join('equipos e2','e2.id = p.team2_id');
		#$this->db->join('fechas f','f.nro_fecha= p.nro_fecha_id');

		$this->db->where('tournament_id',$tournament_id);
		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";
		$partidos = $query->result();
		return $partidos;
	}
		
	function get_tournaments_liga(){
		$this->db->select('id,type,category,name');	
		$this->db->from('tipo_torneo');
		$this->db->where('tournament','liga');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$nombre_completo = $row['type'] . " " .  $row['category'] . " " . $row['name'];
			$combo[$row['id']]= $nombre_completo;	
			}
		return $combo;
	}
	
	function get_tournaments(){
		$this->db->select('id,type,category,name');	
		$this->db->from('tipo_torneo');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$nombre_completo = $row['type'] . " " .  $row['category'] . " " . $row['name'];
			$combo[$row['id']]= $nombre_completo;	
			}
		return $combo;
	}
	
	function get_tournaments_elim(){
		$this->db->select('id,type,category,name');	
		$this->db->from('tipo_torneo');
		$this->db->where('tournament','eliminatoria');
		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$nombre_completo = $row['type'] . " " .  $row['category'] . " " . $row['name'];
			$combo[$row['id']]= $nombre_completo;	
			}
		return $combo;
	}
	
	function hay_jugadores($team_id,$inscripto){
			
		$this->db->from('jugadores');
		$this->db->where('team_id', $team_id);
		$this->db->where('inscripto', $inscripto);

		$cnt = $this->db->count_all_results();
		return $cnt;
	}
	
	function subir_jugador($datos){
               $this->db->insert('jugadores', $datos);
               $id_test = $this->db->insert_id();
               return $id_test;
    }
	   
	function get_type_category_by_id($id){
		$this->db->select('type');	
		$this->db->from('tipo_torneo');
		$this->db->where('id', $id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->type;
		}
	}
	
	function get_category_by_id($id){
		$this->db->select('name');	
		$this->db->from('tipo_torneo');
		$this->db->where('id', $id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->name;
		}
	}
	
	#se le pasa un nombre de categoria y se la crea 
	#retorna el id del equipo insertado o 0 sino se logro insertar
	#esto lo puedo hacer con tipo_torneo
	function create_category($name){
		$this->db->set('type', 'fase');
		$this->db->set('category', $name);
		$this->db->set('tournament', 'liga');
		$this->db->set('name', $name);
		$this->db->insert('tipo_torneo');
		return $this->db->insert_id();
	}
	
	function generate_fase($tournament_id,$ida_vuelta){
		#Devuelve un array de id de los equipos en la categoria dada por $categoryID
		$equipos = $this->admin_model->get_teams($tournament_id);
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
		
		$this->admin_model->show_fixtures($equipos_id,$tournament_id,$ida_vuelta);
		
		$cant = sizeof($equipos);
		#esto es para fases
		$fase = 1;
		
		$this->admin_model->generate_fechas($cant,$fase,$ida_vuelta);
		
		#seteo en 1 el campo generado de tipo_torneo
		$this->admin_model->se_genero_eltorneo($tournament_id);
	}
	
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
	
			
	############################################
    ############################################
	
	function generate_campeones_grupo($tournament_id,$ida_vuelta){
		#Devuelve un array de id de los equipos en la categoria dada por $categoryID
		$equipos_id = $this->admin_model->get_teams_using_desarrollo($tournament_id);
		
		$this->admin_model->generate_postfase_temp($equipos_id,$tournament_id);
		return;
	}
	
	#Tengo que sacar los ids, y ver si es ida y vuelta
	#
	
	function generar_torneo_post_fases($fase){
		$this->db->select('id');	
		$this->db->from('tipo_torneo');
		$this->db->where('tournament','liga');
		$this->db->where('type !=','fase');
		$query = $this->db->get();

		foreach($query->result_array() as $row){
				$this->admin_model->get_post_fases_ids($row['id'],$fase);
			}
	}	
	function get_post_fases_ids($tournament_id,$fase){
		$this->db->select('team_id');	
		$this->db->from('postfase_temp');
		$this->db->where('tournament_id',$tournament_id);
		
		$query = $this->db->get();
	
		$i=0;
		foreach ($query->result() as $row){
			$teams_id[$i] = $row->team_id;
			#actualizo los equipos
			$this->admin_model->update_equipos_actual_fase2_id($teams_id[$i],$tournament_id); 
			$i++;
		}
		
		$this->db->select('type');	
		$this->db->from('tipo_torneo');
		$this->db->where('id',$tournament_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   
		   
		   if ($row->type == 'descenso'){
		   		$ida_vuelta = 1;
		   }
		   else{
			   $ida_vuelta = 0;
		   }
		  
		}	
		
		$this->admin_model->generate_campeones_grupoPOSTA($teams_id,$tournament_id,$ida_vuelta);
		$this->admin_model->generate_table_positions_campeones($tournament_id,$fase);
	}
	
	
	function get_tournaments_postfase(){
		$this->db->select('id,type,category,name');	
		$this->db->from('tipo_torneo');
		$this->db->where('tournament','liga');
		$this->db->where('type !=','fase');

		$query = $this->db->get();
		foreach($query->result_array() as $row){
			$nombre_completo = $row['type'] . " " .  $row['category'] . " " . $row['name'];
			$combo[$row['id']]= $nombre_completo;	
			}
		
		$combo[0] = 'NINGUNO';
		return $combo;
	} 
	
	###########TENGO QUE VER COMO HAGO ESTO	
	function generate_campeones_grupoPOSTA($equipos_id,$tournament_id,$ida_vuelta){	
	
		$teams = sizeof($equipos_id);
		#GENERO EL EQUIPO FANTASMA CON ID = 0
		if ($teams % 2 == 1) { 
			$equipos_id[$teams] = 0;
		}
		$this->admin_model->show_fixtures($equipos_id,$tournament_id,$ida_vuelta);
		#seteo en 1 el campo generado de tipo_torneo
		$cant = $teams;	
		#esto es para fases
		$fase = 2;
		
		$this->admin_model->generate_fechas($cant,$fase,$ida_vuelta);
		
		$this->admin_model->se_genero_eltorneo($tournament_id);
	}
	
	function generate_postfase_temp($equipos_id,$tournament_id){
			foreach ($equipos_id as $team_id){
				
			$data = array(
				'team_id' => $team_id,
				'tournament_id' => $tournament_id,
           	);
			$this->db->insert('postfase_temp', $data);
			$id_test = $this->db->insert_id();
			}		
		}
	
	function get_postfase_temp(){
		$this->db->select('f.id f_id, e.name e_name, t.type as t_type, t.category as t_category, t.tournament as t_tournament, t.name as t_name, t.id as t_id');	
		$this->db->from('postfase_temp f');
		$this->db->join('equipos e','e.id = f.team_id');
		$this->db->join('tipo_torneo t','t.id = f.tournament_id');
		$this->db->order_by('tournament_id','asc');
		$query = $this->db->get();
		return $query->result();
	}	
		
		
	function update_postfase_temp($new_post, $new_post_id){
		$i = 0;
		foreach ($new_post_id as $a){
			$ids[$i] = $a;
			$i++;
		}
		
		$i = 0;
		foreach ($new_post as $post){
			$data = array(
				'tournament_id' => $post,
           	);
			$this->db->where('id', 	$ids[$i]);
			$this->db->update('postfase_temp', $data);
			$id_test = $this->db->insert_id();
			#echo $this->db->last_query() . "<br>";
			$i++;
		}
	}
		
	function get_teams_using_desarrollo($tournament_id){
		$this->db->select('position,from_id');
		$this->db->from('desarrollo');
		$this->db->where('to_id', $tournament_id);
		$query = $this->db->get();
		$posiciones = $query->result();
		$i=0;
		foreach ($query->result() as $row){
			$teams_id[$i] = $this->admin_model->get_positions_fase1($row->from_id,$row->position);
			$i++;
			}
			return $teams_id;
		}	
	
	####esta la uso para modificar la tabla de posicioens manualmente
	function get_positions_modify_fase1($actual_fase1_id){
		$this->db->select('p.id as position_id, e.name as name_equipo,e.id as id_equipo,pj,pg,pe,pp,gf,gc,dg,ptos');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase1_id');
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
	function get_positions_modify_fase2($actual_fase2_id){
		$this->db->select('p.id as position_id, e.name as name_equipo,e.id as id_equipo,pj,pg,pe,pp,gf,gc,dg,ptos');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase2_id');
		$this->db->where('e.actual_fase2_id', $actual_fase2_id);
		$this->db->where('p.fase', '2');
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$this->db->order_by('name_equipo','ASC');
		$query = $this->db->get();
		$posiciones = $query->result();
		#echo $this->db->last_query() . "<br>";
		return $posiciones;
	}
	
	#ESTA LA USO PARA generate_campeones_grupo
	function get_positions_fase1($actual_fase1_id, $position){
		$this->db->select('team_id,ptos,dg,gf,e.name as name_equipo');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase1_id');
		$this->db->where('e.actual_fase1_id', $actual_fase1_id);
		$this->db->where('fase', '1');
		$this->db->limit(1,$position-1);
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$this->db->order_by('name_equipo','ASC');
		$query = $this->db->get();
		$posiciones = $query->result();
		#echo $this->db->last_query() . "<br>";
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->team_id;
		  
		}	
	}
	
	function update_equipos_actual_fase2_id($team_id,$tournament_id){
			$data = array(
				'actual_fase2_id' => $tournament_id,
           	);
			$this->db->where('id', $team_id);
			$this->db->update('equipos', $data);
			$id_test = $this->db->insert_id();
	}  

	function generate_table_positions_campeones($tournament_id,$fase){
		$equipos_id = $this->admin_model->get_teams_using_desarrollo($tournament_id);
		$teams = sizeof($equipos_id);
		for ($i=0;$i<$teams;$i++){
			$this->db->set('team_id', $equipos_id[$i]);
			$this->db->set('fase', $fase);
			$this->db->insert('posiciones');
		}
			return $teams;
	}
	########################################################
	##################################
	function get_nro_grupos_campeonato($tournament,$type){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);
			
			$query = $this->db->get();
			$nro_grupo = $query->result();
		
			return $nro_grupo;
		}
	###########################
	######################## Es igual a la de campeones
		function get_nro_grupos_descenso($tournament,$type){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);
			
			$query = $this->db->get();
			$nro_grupo = $query->result();
			return $nro_grupo;
		}
		###########################
		########################	
		
	################GENERO CUARTOS DE FINAL DE CC
	function generate_cc_cuartos($tournament_id){
		#Devuelve un array de id de los equipos en la categoria dada por $categoryID
		$equipos_id = $this->admin_model->get_teams_using_desarrollo_elim($tournament_id);
		$teams = sizeof($equipos_id);
		#GENERO EL EQUIPO FANTASMA CON ID = 0
		if ($teams % 2 == 1) { 
			$equipos_id[$teams] = 0;
		}
		
		#ESTO LO TENGO QUE DESTILDAR
		#aca lo inserto en partidos_elim en vez de partidos
		$this->admin_model->show_fixtures_elim($equipos_id,$tournament_id);
		
		$this->admin_model->se_genero_eltorneo($tournament_id);
	}

	
	function get_teams_using_desarrollo_elim($tournament_id){
		$this->db->select('position,from_id');
		$this->db->from('desarrollo');
		$this->db->where('to_id', $tournament_id);
		$query = $this->db->get();
		$posiciones = $query->result();
		#echo $this->db->last_query() . ";<br>";

		$i=0;
		foreach ($query->result() as $row){
			#$teams_id[$i] = $this->admin_model->get_result_match($row->from_id);
			$teams_id[$i] = $this->admin_model->get_positions_fase2($row->from_id,$row->position);
			
			#aca no lo hago para que no desaparezca
			#$this->admin_model->update_equipos_actual_fase2_id($teams_id[$i],$tournament_id); 

			$i++;
			}
			return $teams_id;
		}	 
	#ESTA LA USO PARA generate_eliminatorio
	function get_positions_fase2($actual_fase2_id, $position){
		$this->db->select('team_id,ptos,dg,gf,e.name as name_equipo');
		$this->db->from('posiciones p');
		$this->db->join('equipos e','e.id = p.team_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase2_id');
		$this->db->where('e.actual_fase2_id', $actual_fase2_id);
		$this->db->where('fase', '2');
		$this->db->limit(1,$position-1);
		$this->db->order_by('ptos','DESC');
		$this->db->order_by('dg','DESC');
		$this->db->order_by('gf','DESC');
		$this->db->order_by('name_equipo','ASC');
		$query = $this->db->get();
		$posiciones = $query->result();
		
		#echo $this->db->last_query() . ";<br>";
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->team_id;
		  
		}	
	}
	
	
	############################################################
	##############################
	############### GENERO semis de campeonato #########
	#NO TENDRIA QUE SER ASI
	function get_categories_campeonato($type){
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
	
	function get_category_cat_by_id($id){
		$this->db->select('category');	
		$this->db->from('tipo_torneo');
		$this->db->where('id', $id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->category;
		}
	}
	
	function get_nro_grupo_semi($tournament,$type,$category,$name){
			$this->db->select('id,name');
			$this->db->from('tipo_torneo');
			$this->db->where('type',$type);
			$this->db->where('tournament',$tournament);
			$this->db->where('category',$category);
			$this->db->like('name', $name, 'after');
	
			$query = $this->db->get();
			$nro_grupo = $query->result();

			return $nro_grupo;
		}
		
	function get_cargados_semis($type,$tournament,$category){
		$this->db->from('partidos p');
		$this->db->join('tipo_torneo t','t.id = p.tournament_id');
		$this->db->where('type', $type);
		$this->db->where('tournament', $tournament);
		$this->db->where('category', $category);
		$this->db->where('cargado', '0');
		$query = $this->db->get();
				
		return $query->num_rows();
		
	}	
	
	########### TENGO QUE SACAR EL ULTIMO????????? ESTA NO LA USO POR AHORA
	function get_result_match($actual_fase2_id){
		$this->db->select('*');
		$this->db->from('partidos p');
		$this->db->join('equipos e','e.id = p.team1_id');
		$this->db->join('tipo_torneo t','t.id = e.actual_fase2_id');
		$this->db->where('e.actual_fase2_id', $actual_fase2_id);
		$query = $this->db->get();
		$posiciones = $query->result();
		#echo $this->db->last_query() . "<br>";
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->team_id;
		  
		}	
	}

	#######################################
	#########################################
	function se_genero_eltorneo($tournament_id){
			$data = array(
				'generado' => '1',
           	);
			$this->db->where('id', $tournament_id);
			$this->db->update('tipo_torneo', $data);
			$id_test = $this->db->insert_id();
	} 
	function torneo_generado($tournament_id)
	{
		$this->db->select('generado');	
		$this->db->from('tipo_torneo');
		$this->db->where('id', $tournament_id);
		$query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->generado;
		}
	}
	
	function torneos_postfase_generado()
	{
		$this->db->select('id');	
		$this->db->from('tipo_torneo');
		$this->db->where('tournament','liga');
		$this->db->where('type !=','fase');
		$this->db->where('generado','0');
		$query = $this->db->get();

		 if ($query->num_rows() > 0)
		{
		   return 1;
		}
		else{
			return 0;
		}
	}

	#chequeo si existe algun cargado
	function get_cargados($type,$tournament){
		$this->db->from('partidos p');
		$this->db->join('tipo_torneo t','t.id = p.tournament_id');
		$this->db->where('type', $type);
		$this->db->where('tournament', $tournament);
		$this->db->where('cargado', '0');
		$query = $this->db->get();
		return $query->num_rows();
		
	}	

	function get_team_category($team_id)
	{
		$this->db->select('category');	
		$this->db->from('tipo_torneo t');
		$this->db->join('equipos e','e.category_id=t.id');
		$this->db->where('e.id', $team_id);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->category;
		  
		}
	}
	
	function get_category_fases($fase){
		$this->db->select('id');	
		$this->db->from('tipo_torneo');
		$this->db->where('type', $fase);
		$query = $this->db->get();
        $res = $query->result();
        return $res;
	}

	#la uso en generate_fase
	function get_teams($categoryID){
        $this->db->select('id,name');
        $this->db->from('equipos');
        $this->db->where('category_id',$categoryID);
		$this->db->order_by('orden','ASC');
		$this->db->order_by('name','ASC');

        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
    }
	
	
	###ESTO LO USO PARA CAMBIAR LAS CATEGORIAS DE LOS EQUIPOS
	#me devuelve las categorias para poner en un comboBox
	function get_categories_ninguno(){
		$this->db->select('id, category as name');	
		$this->db->from('tipo_torneo');
		$this->db->where('type','fase');
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
				
		return $combo;
	}
	
	function get_all_teams_nocategory(){
		
		$query = $this->db->query('SELECT e.id as e_id,e.name as e_name, t.id as t_id,eq.password as psswd, e.orden as orden FROM equipos e 
		JOIN tipo_torneo t ON t.id = e.category_id
		JOIN equipos_users eq ON eq.team_id = e.id
		UNION 
		SELECT eq.id as e_id,eq.name as e_name, 0,eqp.password as psswd,0 as t_id FROM equipos eq 
        JOIN equipos_users eqp ON eqp.team_id = eq.id
        WHERE eq.category_id = 0 
		ORDER BY t_id ASC, e_name ASC');	
		//~ echo $this->db->last_query() . "<br>";

		return $query->result();
    }
	
	function update_categorias($new_post, $new_post_id){
		$i = 0;
		foreach ($new_post_id as $a){
			$ids[$i] = $a;
			$i++;
		}
		
		$i = 0;
		foreach ($new_post as $post){
			$data = array(
				'category_id' => $post,
				'actual_fase1_id' => $post,
           	);
			$this->db->where('id', 	$ids[$i]);
			$this->db->update('equipos', $data);
			$id_test = $this->db->insert_id();
			#echo $this->db->last_query() . "<br>";
			$i++;
		}
	}
	function update_equipos($new_post, $new_post_id){
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
			$this->db->where('id', 	$ids[$i]);
			$this->db->update('equipos', $data);
			$id_test = $this->db->insert_id();
			#echo $this->db->last_query() . "<br>";
			$i++;
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
	
	#la uso en generate_fase
	#Genera el fixture a una vuelta si $ida_vuelta = 0
	#Genera el fixture a dos vueltas si $ida_vuelta = 1
	 
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
				
				$this->db->set('tournament_id', $tournament_id);
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
	  
	  
	 function   show_fixtures_elim($team_ids,$tournament_id)
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
				
				$this->db->set('tournament_id', $tournament_id);
				$this->db->set('team1_id', $team1_id);
				$this->db->set('team2_id', $team2_id);
				$this->db->insert('partidos_elimin');
				
	 			$res = $this->db->insert_id();
			}
    	}
  	  }
	  function generate_match($team1_id,$team2_id,$tournament_id,$fecha_id){
		  
		 		$this->db->set('tournament_id', $tournament_id);
				$this->db->set('team1_id', $team1_id);
				$this->db->set('team2_id', $team2_id);
				$this->db->set('nro_fecha_id', $fecha_id);

				$this->db->insert('partidos_elimin');
				
	 			$res = $this->db->insert_id();
	
		}  
		
		function clean_db($clausura){
			
			$this->db->truncate('partidos_elimin');
			$this->db->truncate('partidos'); 
 			$this->db->truncate('posiciones'); 
			$this->db->truncate('postfase_temp'); 
			$this->db->truncate('fechas'); 
			$this->db->truncate('notas'); 
			$this->db->truncate('sanciones'); 
			
			$data = array(
				'actual_fase2_id' => '0',
				'orden' => '0',
				
           	);
			$this->db->update('equipos', $data);
			
			$data = array(
				'goal' => '0',
				'red' => '0',
				'yellow' => '0',
				'goal' => '0',
				
           	);
			$this->db->update('jugadores', $data);
			
			$data = array(
				'generado' => '0',
				
           	);
			$this->db->update('tipo_torneo', $data);
			
			#si ademas es clausura hay que borrar los certificados y electros
			if ($clausura){
				$data = array(
					'certificado' => '0',
					'electro' => '0',
					'inscripto' => '0',
           		);
				$this->db->update('jugadores', $data);
			}
		}	
		
	##########	
	function get_partidos_por_horario($actual_fecha_id){
		
		#SELECT time, count(time) from partidos where nro_fecha_id = '1' 
		#and `team1_id` != 0 and `team2_id` != 0 group by time 
		
		$this->db->select('time,count(time) as count_time');
		$this->db->from('partidos');
		$array = array('nro_fecha_id' => $actual_fecha_id, 'team1_id !='  => '0', 'team2_id !='  => '0');

		$this->db->where($array);
		$this->db->group_by('time');

		$query = $this->db->get();
		#echo $this->db->last_query() . "<br>";
		if ($query->num_rows() > 0)
		{
	  		$partidos = $query->result();
	  	 	return $partidos;
		}
	}
	
	function get_show_tournament(){
	   $this->db->select('tipo_torneo');
	   $this->db->from('show_tournament');	   
	   $query = $this->db->get();
		foreach ($query->result() as $row){
			return $row->tipo_torneo;
		}
	}
	
	function set_show_tournament($torneo_actual)
	{
		if ($torneo_actual == 0){
			$set_torneo = 1;			
		}
		elseif ($torneo_actual == 1)  {
			$set_torneo = 0;			
		}		 		
			$data = array(
				'tipo_torneo' => $set_torneo
           	);
         	$this->db->where('id', 1);
			$this->db->update('show_tournament', $data);
			$this->db->insert_id();
			
	}
		
}
		
