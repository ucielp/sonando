<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fixture extends CI_Controller {

		function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('ion_auth');

	}
	
	function index($event_id=NULL,$fecha=NULL)
	{
			
		//Declaramos offset y limit para la paginación
		$limit = 1;
		#$offset = 1;
		//~ ESTO TENGO QUE VER BIEN COMO LO HAGO,QUIZAS DEBERIA SACARLO
		$fase = 1;
		
		if ($fecha){
			$current_fecha = $fecha;
		}	
		else{
			$current_fecha = $this->fixture_model->get_actual($fase);
		}
		//By default show a main category in order to fill the table content
		if (!$event_id){
			$event_id = 1;
		}
		
		$data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox
		
		//~ Aca me podria fijar dependiendo del torneo que se juega la cantidad de fechas
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		$config = array(
				'base_url'		=> base_url().'fixture/index/' . $event_id ,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;
		$data['fixture'] = $this->fixture_model_new->get_partidos($event_id,$fecha);
		$data['event_name'] = $this->fixture_model_new->get_event_name_by_id($event_id); //para imprimir el nombre por pantalla
		$data['categoryTree'] = $this->fixture_model_new->parse_tree(); # Category Tree
		
		$data['title'] = "So&ntilde;ando con el Gol";
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$data['main_content'] = 'home/fixture/show_fixture_view';
		$this->load->view('home/temp/template', $data);
	}

	//~ public function show_fixture_byid($fecha=NULL)
	//~ {
		//~ $this->data['title'] = "Fixture";
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ //Declaramos offset y limit para la paginación
		//~ $limit = 1;
		//~ #$offset = 1;
		//~ 
		######ESTO TENGO QUE VER BIEN COMO LO HAGO,QUIZAS DEBERIA SACARLO
		//~ $fase = 1;
		//~ 
		//~ if ($fecha){
			//~ $current_fecha = $fecha;
		//~ }	
		//~ else{
			//~ $current_fecha = $this->fixture_model->get_actual($fase);
		//~ }
		//~ 
		//~ $event_id = 4;
		//~ 
		//~ var_dump($_POST);
//~ 
		//~ $data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox
		//~ 
		####Aca me podria fijar dependiendo del torneo que se juega la cantidad de fechas
		//~ $total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		//~ 
		//~ $data['fecha_nro'] = $current_fecha;
		//~ $this->load->library('pagination_torneo');
		//~ 
		//~ $config = array(
				//~ 'base_url'		=> base_url().'fixture/show_fixture_byid/' ,
				//~ 'total_rows'	=> $total_rows,
				//~ 'per_page'		=> $limit,
				//~ 'cur_page'		=> $current_fecha,
				//~ #'uri_segment'  => '2',
				//~ 'full_tag_open'	=> '<div id="paginacion">',
				//~ 'full_tag_close' => '</div><div class="clear"></div>',
				//~ 'first_link'	=>	FALSE,
				//~ 'last_link'		=>	FALSE,
				//~ 'use_page_numbers' => FALSE,
				//~ 'cur_tag_open'	=>	'<strong>',
				//~ 'cur_tag_close'	=>	'</strong>'
			//~ );
			//~ 
		//~ $this->pagination_torneo->initialize($config);
			//~ 
		//~ 
		//~ $fecha = $current_fecha;
		//~ $data['fixture'] = $this->fixture_model_new->get_partidos($event_id,$fecha);
		//~ $data['event_name'] = $this->fixture_model_new->get_event_name_by_id($event_id); //para imprimir el nombre por pantalla
		//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		//~ $data['main_content'] = 'home/fixture/show_fixture_view';
		//~ $this->load->view('home/temp/template', $data);
	//~ }	
	
	
	
	
	
	
	
	
	
	
	
	
	# Estos son los metodos viejos #
		
	/*****************FASE************************/
	public function fase(){
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Fase";
		$type = 'fase';
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		
		$data['main_content'] = 'home/fixture/fase';
		$this->load->view('home/temp/template', $data);
	}
	
	
	public function ver_fase(){				
		$tournament = 'liga';
		$type = 'fase';
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del 
		
		
		//Declaramos offset y limit para la paginación
		$limit = 1;
		#$offset = 1;
		$fase = 1;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_fase/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;
		$data['fixture'] = $this->fixture_model->get_partidos($actual_tournament_id,$fase,$fecha);
		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_fase';
		$this->load->view('home/temp/template', $data);
		
	}
	
	#Esta la uso para el apertura en vez de ver_fase
	public function ver_fase_apertura($category_id){				
		$tournament = 'liga';
		$type = 'fase';
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $category_id;
		$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del 
		
		//Declaramos offset y limit para la paginación
		$limit = 1;
		#$offset = 1;
		$fase = 1;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_fase/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;
		$data['fixture'] = $this->fixture_model->get_partidos($actual_tournament_id,$fase,$fecha);
		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_fase';
		$this->load->view('home/temp/template', $data);
		
	}
	
	public function fixture_fase($cat,$fecha){
		
			$tournament = 'liga';
			$type = 'fase';
			$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
				
			$actual_tournament_category = $cat; 
			$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
				
			//Declaramos offset y limit para la paginación
			$limit = 1;
			$fase = 1;
			#$offset = 1;
			#este es el nro de fechas
			$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
			$data['fecha_nro'] = $fecha;
			
			$this->load->library('pagination_torneo');
			$config = array(
					'base_url'		=> base_url().'fixture/fixture_fase/' . $actual_tournament_category,
					'total_rows'	=> $total_rows,
					'per_page'		=> $limit,
					'cur_page'  => $fecha,
					'first_link'	=>	FALSE,
					'last_link'		=>	FALSE,
					'use_page_numbers' => TRUE,
					'cur_tag_open'	=>	'<strong>',
					'cur_tag_close'	=>	'</strong>'
				);
				
			$this->pagination_torneo->initialize($config);
			
			$data['fixture'] = $this->fixture_model->get_partidos($actual_tournament_id,$fase,$fecha);
			$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		
			
			$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
			$data['main_content'] = 'home/fixture/ver_fase';
			$this->load->view('home/temp/template', $data);
			
		}
	
	/*****************COPA DE CAMPEONES************************/
	/*****************Fase de GRUPO************************/
	
	public function campeones(){
		
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Copa de Campeones";
		$tournament = 'liga';
		$type = 'campeones';
		$category = 'grupo';
		$arr = array();
		
		$limit = 1;
		$fase = 2;
		
		
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/campeones_fixture/',
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;		

		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		#####de Acá saco la siguiente parte del torneo
		$tournament_elim = 'eliminatoria';
		$type_elim = 'campeones';
		$category_elim = 'cuarto';

		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco las semis
		$category_elim = 'semi';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_elim = 'final';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_elim = 'tercer';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;
		
		$data['main_content'] = 'home/fixture/campeones';
		$this->load->view('home/temp/template', $data);
	}
	
	public function campeones_fixture($fecha){
		
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Copa de Campeones";
		$tournament = 'liga';
		$type = 'campeones';
		$category = 'grupo';
		$arr = array();
		
		$limit = 1;
		$fase = 2;
		
		
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$data['fecha_nro'] = $fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/campeones_fixture/',
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		#####de Acá saco la siguiente parte del torneo
		$tournament_elim = 'eliminatoria';
		$type_elim = 'campeones';
		$category_elim = 'cuarto';

		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco los cuartos de final
		$category_elim = 'cuarto';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco las semis
		$category_elim = 'semi';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_elim = 'final';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_elim = 'tercer';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;
		
		
		$data['main_content'] = 'home/fixture/campeones';
		$this->load->view('home/temp/template', $data);
	}



	/*****************COPA REPECHAJE************************/
	/*****************Fase de GRUPO************************/
	
	public function repechaje(){
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Fase";
		$tournament = 'liga';
		$type = 'repechaje';
		$data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
		
		$data['main_content'] = 'home/fixture/repechaje';
		$this->load->view('home/temp/template', $data);
	}
	
	
	public function ver_repechaje(){				

		$data['title'] = "So&ntilde;ando con el Gol - Copa Repechaje";
		
		$tournament = 'liga';
		$type = 'repechaje';
		$data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
		
		$category = $this->input->post('dropdown_category'); //cual tengo que mostrar
        
        //~ Esto es lo que concateno despues en los partidos de eliminatoria
        $number_of_category =  substr($category,-1,1);


		$arr = array();
		
		$limit = 1;
		$fase = 2;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/repechaje_fixture/' . $category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;		

		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		#####de Acá saco la siguiente parte del torneo
        
        //~ $category = $this->input->post('dropdown_category'); //cual tengo que mostrar

		$tournament_elim = 'eliminatoria';
		$type_elim = 'repechaje';
		$category_elim = 'cuarto' . $number_of_category;
        

		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco las semis
		$category_elim = 'semi' . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_elim = 'final' . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_elim = 'tercer' . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;
		
		$data['main_content'] = 'home/fixture/ver_repechaje';
		$this->load->view('home/temp/template', $data);
		
		
	}
	
	public function repechaje_fixture($cat,$fecha){
		
		$data['title'] = "So&ntilde;ando con el Gol - Copa Repechaje";

		$tournament = 'liga';
		$type = 'repechaje';
		$data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
	
		$actual_tournament_category = $cat; 
		$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
        
        //~ Esto es lo que concateno despues en los partidos de eliminatoria
        $number_of_category =  substr($cat,-1,1);
        
		//Declaramos offset y limit para la paginación
				$limit = 1;
		$fase = 2;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');

		$config = array(
				'base_url'		=> base_url().'fixture/repechaje_fixture/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'  => $fecha,
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => TRUE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
		

		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		#####de Acá saco la siguiente parte del torneo
		$tournament_elim = 'eliminatoria';
		$type_elim = 'repechaje';
		$category_elim = 'cuarto'  . $number_of_category;

		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco las semis
		$category_elim = 'semi'  . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_elim = 'final'  . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_elim = 'tercer'  . $number_of_category;
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;
		
		$data['main_content'] = 'home/fixture/ver_repechaje';
		$this->load->view('home/temp/template', $data);
	}
	


	/*****************COPA CAMPEONATO************************/
	/*****************Fase de GRUPO************************/
	/*****************Es como copa de campeones pero se le pasa la category en el combo box como arriba************************/
	
	
	public function campeonato(){
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Zona Campeonato";
		$type = 'campeonato';
		$data['main_content'] = 'home/fixture/campeonato';
		$data['categories'] = $this->posiciones_model->get_categories($type);
		$this->load->view('home/temp/template', $data);		
	}
	
	public function ver_campeonato(){
		$tournament = 'liga';
		$type = 'campeonato';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		$category = $actual_tournament_category;
		
		$data['category_name'] = $actual_tournament_category; 
		
		//Declaramos offset y limit para la paginación
		$limit = 1;
		$fase = 2;
		
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		$fecha = $current_fecha;
		
		
		$arr = array();
		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
			
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_campeonato/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
		
		# ESTO ES DIFERENTE A TODOS LOS TORNEOS, ACA TENGO QUE PASARLE TAMBIEN EL NAME		
		#####de Acá saco las semis
		$tournament_elim = 'eliminatoria';
		$type_elim = 'campeonato';
		$category_elim = $actual_tournament_category;
		$category_name = 'semi';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_name = 'final';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_name = 'tercer';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;

		$data['title'] = "So&ntilde;ando con el Gol - Fixture Zona Campeonato " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_campeonato';
		$this->load->view('home/temp/template', $data);			
		
	}
	
	function fixture_campeonato($cat,$fecha){
		$tournament = 'liga';
		$type = 'campeonato';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		
		$data['category_name'] = $actual_tournament_category; 
		
		//Declaramos offset y limit para la paginación
		$limit = 1;
		$fase = 2;
		
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$data['fecha_nro'] = $fecha;
		$this->load->library('pagination_torneo');
		$actual_tournament_category = $cat;
		
		$arr = array();
		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
				$data['fixture_grupos'] = $arr;
		
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_campeonato/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $fecha,

				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
		$this->pagination_torneo->initialize($config);
		
		
		#####de Acá saco las semis
		$tournament_elim = 'eliminatoria';
		$type_elim = 'campeonato';
		$category_elim = $actual_tournament_category;
		$category_name = 'semi';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$category_name = 'final';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$category_name = 'tercer';
		
		foreach($this->fixture_model->get_nro_grupo_like($tournament_elim,$type_elim,$category_elim,$category_name) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;

		$data['title'] = "So&ntilde;ando con el Gol - Fixture Zona Campeonato " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_campeonato';
		$this->load->view('home/temp/template', $data);

			
	}	
	
	/*****************ZONA DESCENSO************************/
	/*****************ES IGUAL A FASE PERO SE LE PASAN DISTINTAS VARIABLES************************/
	
	public function descenso(){
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Zona Descenso";
		$type = 'descenso';
		$data['categories'] = $this->posiciones_model->get_categories($type);
		$data['main_content'] = 'home/fixture/descenso';
		$this->load->view('home/temp/template', $data);
	}
	public function ver_descenso(){
		$type = 'descenso';
		$tournament = 'liga';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
			//Declaramos offset y limit para la paginación
		$limit = 1;
		#$offset = 1;
		$fase = 2;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_descenso/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;
		
		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		$fase = 2;
		$data['fixture'] = $this->fixture_model->get_partidos($actual_tournament_id,$fase,$fecha);

		$data['title'] = "So&ntilde;ando con el Gol - Fixture Descenso " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_descenso';
		$this->load->view('home/temp/template', $data);

	}
	public function fixture_descenso($cat,$fecha){
		$type = 'descenso';
		$tournament = 'liga';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $cat;
		$actual_tournament_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
			//Declaramos offset y limit para la paginación
		$limit = 1;
		#$offset = 1;
		$fase = 2;
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$data['fecha_nro'] = $fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/fixture_descenso/' . $actual_tournament_category,
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			

		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		$fase = 2;
		$data['fixture'] = $this->fixture_model->get_partidos($actual_tournament_id,$fase,$fecha);

		$data['title'] = "So&ntilde;ando con el Gol - Fixture Descenso " . $data['category_name'];
		$data['main_content'] = 'home/fixture/ver_descenso';
		$this->load->view('home/temp/template', $data);

	}
	
	/*****************PROMOCIONES************************/
	
	public function promociones(){
		
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Promociones";
		$tournament = 'eliminatoria';
		$type = 'promocion';
		$arr = array();
		$fase = 2;
		
		foreach($this->fixture_model->get_nro_grupo_promo($tournament,$type) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos_elim($group->id);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		$data['main_content'] = 'home/fixture/ver_promociones';
		$this->load->view('home/temp/template', $data);
	}
	
	########## TORNEO DE VERANO #########################
	public function campeones_verano(){
		
		$data['title'] = "So&ntilde;ando con el Gol - Fixture Copa de Campeones";
		$tournament = 'liga';
		$type = 'verano';
		$category = 'grupo';
		$arr = array();
		
		$limit = 1;
		$fase = 2;
		
		
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		$current_fecha = $this->fixture_model->get_actual($fase);
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		
		$config = array(
				'base_url'		=> base_url().'fixture/campeones_fixture/',
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'cur_page'		=> $current_fecha,
				#'uri_segment'  => '2',
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	FALSE,
				'last_link'		=>	FALSE,
				'use_page_numbers' => FALSE,
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
			
		$this->pagination_torneo->initialize($config);
			
		
		$fecha = $current_fecha;		

		foreach($this->fixture_model->get_nro_grupo($tournament,$type,$category) as $group):
			$arr[$group->id] = $this->fixture_model->get_partidos($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos'] = $arr;
		
		#####de Acá saco los cuartos de final
		$tournament_elim = 'eliminatoria';
		$type_elim = 'verano';
		$category_elim = 'cuarto';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$cuartos[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		
		$data['fixture_grupos_cuartos'] = $cuartos;
		
		
		#####de Acá saco las semis
		$tournament_elim = 'eliminatoria';
		$type_elim = 'verano';
		$category_elim = 'semi';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$semi[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_semi'] = $semi;
		
		#####de Acá saco las finales
		$tournament_elim = 'eliminatoria';
		$type_elim = 'verano';
		$category_elim = 'final';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$final[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_final'] = $final;
		
		#####de Acá saco los 3ros y 4tos puestos
		$tournament_elim = 'eliminatoria';
		$type_elim = 'verano';
		$category_elim = 'tercer';
		
		foreach($this->fixture_model->get_nro_grupo($tournament_elim,$type_elim,$category_elim) as $group):
			$tercer[$group->id] = $this->fixture_model->get_partidos_elim($group->id,$fase,$fecha);
		endforeach;
		$data['fixture_grupos_tercer'] = $tercer;
		
		
		$data['main_content'] = 'home/fixture/campeones_verano';
		$this->load->view('home/temp/template', $data);
	}
	
	
}
