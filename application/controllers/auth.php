<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}

class Auth extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('text');
	}
	
	#estas son las nuevas funciones
	
	######## Estas son las de categoria
	function create_modify_category_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
	
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['categories'] = $this->admin_model_new->get_categories(); 


		$tipo_torneo = $this->admin_model_new->get_tipo_torneos();

		$this->data['tipo_torneo'] = $tipo_torneo;
		
		$this->load->view('auth/modify_category_new', $this->data);
	
	}
	
	function create_new_category()
	{
		//~ $this->output->enable_profiler(TRUE);

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
	
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$table_cats = $this->admin_model_new->get_table_categories(); 
		
		if ($table_cats) {
			$this->data['categories'] = $table_cats;
		}
		else{
			$this->data['categories'] = '';
		}
		
		
		$tipo_torneo = $this->admin_model_new->get_tipo_torneos();
		$this->data['tipo_torneo'] = $tipo_torneo;
		
		$this->load->view('auth/create_new_category_view', $this->data);
	
	}
	
	function create_new_category_ok()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
		$name_category = $this->input->post('name_category');	
		$parent_id = $this->input->post('parent_id');
		$mostrar = $this->input->post('mostrar');
		$tipo = $this->input->post('dropdown_tipo_torneo');
		if($mostrar){
			$show = 1;
		}
		else{	
			$show = 0;
		}
		$this->admin_model_new->create_category($name_category,$parent_id,$show,$tipo);

		$this->data['message'] = "Se ha creado la categoría.";

		$this->load->view('auth/create_new_category_ok_view', $this->data);
	}
	
		
	function modify_category_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			 
		$name_category = $this->input->post('res1');	
		$id_parente_category = $this->input->post('res2');	
		$show = $this->input->post('show');
		$tournament_id = $this->input->post('category');
		$dropdown_t_id = $this->input->post('dropdown_t_id');	

		$this->admin_model_new->set_category($tournament_id,$name_category,$id_parente_category,$show,$dropdown_t_id);
		$this->data['warning'] = "";
		$this->data['message'] = "Se han modificado las categorías.";
		

		$this->load->view('auth/modify_category_ok_new', $this->data);
	
	}
	
	function delete_category($tournament_id)
	{ 
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		# Tengo que eliminar todas las categorías de abajo tambien.
		$this->data['warning'] = $this->admin_model_new->delete_category($tournament_id);
		$this->data['message'] = "La categoría ha sido eliminado";
		$this->load->view('auth/delete_category_ok', $this->data);
	}
	
    # Fin de las de categoria ######### 
	
    # Asignar equipos a torneo

	function asignar_equipo_torneo(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/mostrar_equipos_de_torneo/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en generar_torneos pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
	}
	
	function mostrar_equipos_de_torneo($tournament_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$data_category = $this->admin_model_new->get_data_category_by_id($tournament_id);
        if ($data_category->generado && $data_category->tipo != 'eliminatoria'){
            echo "Este torneo no se puede modificar porque ya fue generado y no es de eliminatoria";
        }
        else{
            $teams = $this->admin_model_new->get_all_teams_from_category_display_by_categoryid($tournament_id);
            $this->data['orden'] = $this->admin_model_new->get_orden_ninguno(); //para el combo box
            $this->data['teams'] = $teams;
            $this->data['category_id'] = $tournament_id;
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('auth/mostrar_equipos_de_torneo_view', $this->data);
        }
	}
	
	function update_equipo_torneo_go($tournament_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$new_post2 = $this->input->post('dropdown2');
		$new_post2_id = $this->input->post('hid2');
		$this->admin_model_new->update_equipos_from_category_display($tournament_id, $new_post2,$new_post2_id);
		
		$this->data['category_id'] = $tournament_id;
		$this->data['titulo_mensage'] = 'Se actualizaron los equipos';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/asignar_equipo_torneo_view_ok', $this->data);
	}	
	
	function delete_team_from_category_display ($tournament_id,$team_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->admin_model_new->delete_equipo_from_category_display($tournament_id,$team_id);
		$this->data['category_id'] = $tournament_id;
		$this->data['titulo_mensage'] = 'Se eliminó el equipo';

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/asignar_equipo_torneo_view_ok', $this->data);
	}

	function asignar_equipo_torneo_elegir($tournament_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		# chequeo el tipo de torneo aca y voy a distintas vistas
		$this->data['orden'] = $this->admin_model_new->get_orden_ninguno(); //para el combo box
		$this->data['teams'] = $this->admin_model_new->get_all_teams_not_this_category($tournament_id);
		$this->data['category_id'] = $tournament_id;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->load->view('auth/asignar_equipo_torneo_view', $this->data);
	}
	
	function asignar_equipo_torneo_go($tournament_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
				####### TODO

		$show = $this->input->post('show');
		$ids_en_array = $this->input->post('ids_en_array');
			
		$this->admin_model_new->insert_equipo_torneo($ids_en_array,$show,$tournament_id);
		$this->data['titulo_mensage'] = 'Se agregaron los equipos';
		$this->data['category_id'] = $tournament_id;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/asignar_equipo_torneo_view_ok', $this->data);
	}	
	
    # generar torneos
	function generar_torneos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/generar_torneo_byid_previsualizar/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en asignar_equipo_torneo pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
	}
    
	
	function generar_torneo_byid_previsualizar($tournament_id)
	{
	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        
        $data_category = $this->admin_model_new->get_data_category_by_id($tournament_id);
        
        if ($data_category->tipo == 'eliminatoria'){
            echo "El torneo es de eliminatoria asi que no se puede generar<br>";
        }
        else{
            $this->data['teams'] = $this->admin_model_new->get_all_teams_from_category_display_by_categoryid($tournament_id);
            $this->data['data_category'] = $data_category;
            $this->data['category_id']   = $tournament_id;
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('auth/generar_torneo_byid_previsualizar_view', $this->data);

        }
        
	}
    
	function generar_torneo_byid_go($tournament_id)
	{
	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        
        $data_category = $this->admin_model_new->get_data_category_by_id($tournament_id);
        $generado = $data_category->generado;
        $tipo_torneo = $data_category->tipo;
        
        if($generado){
            echo "Este torneo ya fue generado anteriormente";
        }
        else{
            # Genero el fixture y cargo las fechas y seteo en 1 el generado
            $this->admin_model_new->generate_tournament($tournament_id,$tipo_torneo);
            
            # Genero las tablas de posiciones y ya no me intersa que fase sea, pero si el tournament id
            $this->data['teams'] = $this->admin_model_new->generate_table_positions($tournament_id);

        }
    }
        
    ### Definir horario
    function set_horario_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/set_horario_new_elegir_fecha/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en generar_torneos pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
		
	}
    
    function set_horario_new_elegir_fecha($tournament_id)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        		
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['fechas'] = $this->admin_model_new->get_fechas(); //para el combo box

        $this->data['tournament_id'] = $tournament_id;
        
        $this->load->view('auth/set_horario_new_elegir_fecha_view', $this->data);
    }
        
    function set_horario_new_go($tournament_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['actual_fecha_id'] = $this->input->post('dropdown_fechas');;
		        
        $this->data['category_name'] = $this->fixture_model_new->get_category_and_subcategory($tournament_id); //para imprimir el nombre por pantalla

		$this->data['partidos'] = $this->admin_model_new->get_partidos($tournament_id,$this->data['actual_fecha_id']);
		$this->load->view('auth/set_horarios_go', $this->data);
		
	}
    
    function set_horarios_last()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['dias'] = $this->input->post('dias');	
		$this->data['horarios'] = $this->input->post('horarios');	
		$this->data['canchas'] = $this->input->post('canchas');	
		$this->data['partidos_id'] = $this->input->post('part_id');	

		$matchs_id = $this->data['partidos_id'];
		$dias = $this->data['dias'];
		$horarios = $this->data['horarios']; 
		$canchas = $this->data['canchas'];
		
		#seteo los horarios
		$this->admin_model_new->set_horarios($matchs_id,$dias,$horarios,$canchas);
		
		$this->load->view('auth/set_horarios_ok', $this->data);
		
	}
	
	function delete_match_pre($match_id)
	{ 
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['message'] = "Está seguro que quiere eliminar este partido?";
		$this->data['match_id'] = $match_id;
		$this->load->view('auth/delete_match_pre', $this->data);
	}
	
	function delete_match($match_id)
	{ 
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->admin_model_new->delete_match($match_id);
		$this->data['message'] = "El partido ha sido borrado";
		$this->load->view('auth/delete_match_ok', $this->data);
	}
	
    ########## Cargar resultados
    	function set_results_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/set_results_new_elegir_fecha/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en generar_torneos pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
		
	}
    
     function set_results_new_elegir_fecha($tournament_id)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        		
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['fechas'] = $this->admin_model_new->get_fechas(); //para el combo box

        $this->data['tournament_id'] = $tournament_id;
        
        $this->load->view('auth/set_results_new_elegir_fecha_view', $this->data);
    }
	
	function set_results_new_go($tournament_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['tournament_id'] = $tournament_id;

		$this->data['actual_fecha_id'] = $this->input->post('dropdown_fechas');;
        $this->data['category_name'] = $this->fixture_model_new->get_category_and_subcategory($tournament_id); //para imprimir el nombre por pantalla


		$this->data['partidos'] = $this->admin_model_new->get_partidos($tournament_id,$this->data['actual_fecha_id']);
		$this->load->view('auth/set_results_go', $this->data);
		
	}
    
    ## Cargar goleadores
    
    function set_goleadores_new($actual_tournament_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['result1'] = $this->input->post('res1');	
		$this->data['result2'] = $this->input->post('res2');
		$this->data['penal1'] = $this->input->post('pen1');	
		$this->data['penal2'] = $this->input->post('pen2');	
		
		$this->data['partidos_id'] = $this->input->post('part_id');	
		$this->data['cargados'] = $this->input->post('cargados');
		$this->data['perdidos'] = $this->input->post('perdidos');	


		$matchs_id = $this->data['partidos_id'];
		$teams1_res = $this->data['result1']; 
		$teams2_res = $this->data['result2'];
		$teams1_pen = $this->data['penal1']; 
		$teams2_pen = $this->data['penal2'];
		
		$cargados = $this->data['cargados'];
		$perdidos = $this->data['perdidos'];
		#seteo los resultados y perdido es 1 entonces ambos pierden
		$this->admin_model_new->set_results($matchs_id,$teams1_res,$teams2_res,$teams1_pen,$teams2_pen,$cargados,$perdidos);
		
		$i = 1;
		foreach($matchs_id as $partido_id):
			$partido = $this->admin_model_new->get_team_by_match($partido_id);
			$this->data['equipo1_name'][$partido_id] = $partido->equipo1_name;
			$this->data['equipo2_name'][$partido_id] = $partido->equipo2_name;
			$this->data['players_team1'][$partido_id] = $this->admin_model_new->get_all_players_combo($partido->team1_id);
			$this->data['players_team2'][$partido_id] = $this->admin_model_new->get_all_players_combo($partido->team2_id); 
			
			$acutal_cargado = $this->data['cargados'][$i];
			$acutal_perdido = $this->data['perdidos'][$i];
			#actualizo posiciones pero solo de los que no estaban seteados
			
			$this->admin_model_new->update_positions($partido,$acutal_cargado,$acutal_perdido,$actual_tournament_id);
			$i++;
		endforeach;
		$this->load->view('auth/set_goleadores', $this->data);
	}
    
    
    function set_goleadores_new_go()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->data['goleadores_id'] = $this->input->post('players');
		
		$this->admin_model_new->set_goleadores($this->data['goleadores_id']); 
		$this->load->view('auth/set_goleadores_ok', $this->data);
	}
    
    # Crear partido manualmente
    function create_match_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/create_match_choose_new/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en generar_torneos pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
        
	}
    
     function create_match_choose_new($tournament_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}

		$this->data['equipos'] = $this->admin_model_new->get_equipos_from_category_display($tournament_id); //para el combo box
		$this->data['tournament'] = $this->fixture_model_new->get_category_and_subcategory($tournament_id);
        $this->data['tournament_id'] = $tournament_id;
        
		$this->data['fechas'] = $this->admin_model_new->get_fechas(); //para el combo box
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/create_match_view', $this->data);
	}
	
	function create_match_new_go($category_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$team1_id = $this->input->post('dropdown_team1'); //cual tengo que mostrar
		$team2_id = $this->input->post('dropdown_team2'); //cual tengo que mostrar
		$fecha_id = $this->input->post('dropdown_fechas');
		
		if (!$team1_id or !$team2_id or ($team1_id == $team2_id)){
			echo "Debe elegir 2 equipos distintos para generar un partido";
		}
		else{
			
			$this->admin_model_new->generate_match($team1_id,$team2_id,$category_id,$fecha_id);
		
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/create_match_ok_view', $this->data);
		}
	}
    
    ### Modificar tablas de posiciones
    function modificar_tabla_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$url_link = 'auth/modificar_tabla_go/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en asignar_equipo_torneo pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
	}
    
	function modificar_tabla_go($tournament_id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}

		
        $this->data['posiciones'] = $this->admin_model_new->get_positions($tournament_id);
        $this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($tournament_id); //para imprimir el nombre por pantalla
        $this->data['tournament_id'] = $tournament_id;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/modificar_tabla_view', $this->data);	
	}
	
	function modificar_tabla_ok(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$posiciones_id = $this->input->post('pos_id');
		$pg = $this->input->post('pg');
		$pe = $this->input->post('pe');
		$pp = $this->input->post('pp');
		$gf = $this->input->post('gf');
		$gc = $this->input->post('gc');
		
		$this->admin_model->update_results($posiciones_id,$pg,$pe,$pp,$gf,$gc);
		$this->load->view('auth/modificar_tabla_ok', $this->data);
	}
    
   function  modificar_tabla_agregar_equipo($tournament_id){
       if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        
        echo "agregar un equipo con este tournament id (chequear q sea eliminatoria) " . $tournament_id;
        
   }
   
   ###  Activar equipos
   	function activar_equipos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
			
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['categories'] = $this->admin_model->get_categories_ninguno(); //para el combo box
		$this->data['orden'] = $this->admin_model->get_orden_ninguno(); //para el combo box

		
 		$this->data['teams'] = $this->admin_model_new->get_all_teams();

		//~ $this->output->enable_profiler(TRUE);

		$this->load->view('auth/activar_equipo_view', $this->data);

	}
	
	function activar_equipos_go()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$activados = $this->input->post('activados');
		
		
		$this->admin_model_new->update_equipos_activado($activados);


		$this->load->view('auth/activar_equipo_view_ok', $this->data);
	}
	
	function delete_team_preguntar($team_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->data['team_id'] = $team_id;
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);

		$this->load->view('auth/delete_team_preguntar_view', $this->data);

	}
	
	function delete_team_go($team_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['team_id'] = $team_id;
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		
		$this->admin_model_new->delete_team_totalmente($team_id);
		
		$this->load->view('auth/delete_team_ok', $this->data);

	}
    
		//~ #chequeo si el torneo se creo anteriormente
		//~ if ($this->admin_model_new->torneo_generado($tournament_id) == 0){
			//~ #esta linea es la que genera el torneo fase
			//~ $this->admin_model_new->generate_fase($tournament_id,$ida_vuelta);
		//~ 
			//~ $this->data['categories'] = $this->admin_model_new->get_categories(); //para el combo box
			//~ $this->data['categoria'] = strtoupper($this->admin_model_new->get_category_by_id($tournament_id));
			//~ 
			//~ #genero las tablas con esos equipos
			//~ $fase  = 1;
			//~ #me devuelve los teams creados
			//~ $this->data['teams'] = $this->admin_model_new->generate_table_positions($tournament_id, $fase);
			//~ $this->load->view('auth/generar_fases_ok', $this->data);
			//~ }
		//~ else{
			//~ $this->data['categoria'] = strtoupper($this->admin_model_new->get_category_by_id($tournament_id));
			//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//~ $this->load->view('auth/torneo_ya_generado', $this->data);
		//~ }
	
	//~ function generar_torneos_ok ()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $ida_vuelta = $this->input->post('idayvuelta');
		//~ $event_id = $this->input->post('dropdown_category'); //cual tengo que mostrar
	//~ 
		//~ #chequeo si el torneo se creo anteriormente
		//~ if ($this->admin_model_new->torneo_generado($event_id) == 0){
			//~ #esta linea es la que genera el torneo fase
			//~ $this->admin_model_new->generate_fase($event_id,$ida_vuelta);
		//~ 
			##$this->data['categories'] = $this->admin_model->get_categories(); //para el combo box
			//~ $this->data['categoria'] = strtoupper($this->admin_model_new->get_category_by_id($event_id));
			//~ 
			//~ #genero las tablas con esos equipos
			//~ $fase  = 1;
			//~ #me devuelve los teams creados
			//~ $this->data['teams'] = $this->admin_model_new->generate_table_positions($event_id, $fase);
			//~ $this->load->view('auth/generar_fases_ok', $this->data);
		//~ }
		//~ else{
			//~ $this->data['categoria'] = strtoupper($this->admin_model_new->get_category_by_id($event_id));
			//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//~ $this->load->view('auth/torneo_ya_generado', $this->data);
		//~ }
	//~ }

	function create_team_new()	
	 {
			
		 if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
		
			$this->data['categories'] = $this->admin_model_new->get_events_combo_box(); //para el combo box
			$this->form_validation->set_rules('team', 'Equipo', 'required');
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
			if ($this->form_validation->run() == true)
			{
					if ( $this->input->post('dropdown_category') == 0)
					{
						$this->data['message'] = 'Debe elegir una categoría';
						$this->load->view('auth/create_team_view',$this->data);
					}
					else{
					
					
						$this->data['category_id'] = $this->input->post('dropdown_category');
						$this->data['category_by_id'] =  $this->admin_model_new->get_category_by_id($this->data['category_id']);
						$this->data['team_name'] = $this->input->post('team');
						
                        $new_team_id = $this->admin_model_new->create_team($this->data['team_name'],$this->data['category_id']);
                        if (!$new_team_id){
                            echo "No se puede crear un equipo con un nombre ya existente";
                            return;
                        }
                        $this->data['team_id'] = $new_team_id;
                        
                        $username = $this->data['team_name'];
                        $email = $this->data['team_name'] ;#. "@user.com";
                        $password =  md5($this->data['team_name']);
                        $password = substr ($password,0,7);
                        $team_id = $this->data['team_id'];
                        #agrego info a los equipos
                        $this->admin_model_new->create_team_info($team_id);
                        #guardo el usuario y constraseña para mandarlo por mail
                        $this->admin_model_new->create_equipos_users($team_id,$username, $password);

                        $additional_data = array(
                            'first_name' =>  $this->data['team_name'],
                            'last_name' =>  $this->data['team_name'],
                        );
                        $grupo_name = 'inscriptions';
                        
                        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $team_id, $grupo_name)){
                            $this->session->set_flashdata('message', "User Created");
                            $this->load->view('auth/create_team_view_ok',$this->data);
                            }
                    }
			}
			else
			{
				$this->data['message'] = validation_errors();
				$this->load->view('auth/create_team_view',$this->data);
				#no hago nada	
			}		
	   }      

	function horario_fecha(){ 
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
			
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        $partidos = $this->admin_model_new->get_partidos_por_fecha(); 
		$this->data['partidos'] = $partidos;
        
        #get_category_and_subcategory
        
        foreach($partidos as $partido){
            $cat_and_subcategory[$partido->id_category] = $this->fixture_model_new->get_category_and_subcategory($partido->id_category);
        }
        $this->data['cat_and_subcategory'] = $cat_and_subcategory;
    
		$this->load->view('auth/horario_fecha_view', $this->data);

    }
	   
	   
	## Imprimir planillas
	
	function print_form($id_partido){
	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$equipos = $this->admin_model->get_equipos_partidos($id_partido);
		
		foreach ($equipos as $equipo){
			$team1_id = $equipo->team1_id;
			$team2_id = $equipo->team2_id;
			$this->data['equipo1_name'] = $equipo->equipo1_name;
			$this->data['equipo2_name'] = $equipo->equipo2_name;
			$this->data['cancha'] = $equipo->court;
			$this->data['hora'] = $equipo->time;
            $this->data['date'] = $equipo->date;
            $tournament_id = $equipo->tournament_id;
            $this->data['nro_fecha'] = $equipo->nro_fecha;
		}
		
		$this->data['name_event'] = $this->fixture_model_new->get_category_and_subcategory($tournament_id); //para imprimir el nombre por pantalla

		$this->data['players_team1'] = $this->admin_model_new->show_players_ficha($team1_id);
		$this->data['players_team2'] = $this->admin_model_new->show_players_ficha($team2_id);
		
	
		$this->load->view('auth/mostrar_planilla', $this->data);
	} 
	   
	   
	function create_category()
	{		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		
		$this->data['categories'] = $this->admin_model->get_categories(); //para el combo box
		$this->form_validation->set_rules('category', 'Categoría', 'required');
		
		#pongo algo en el mensaje
		$this->data['mensaje'] = '';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		if ($this->form_validation->run() == true)
		{
			$this->data['new_id'] = $this->admin_model->create_category($this->input->post('category'));
			#refresheo para que me cargue de nuevo el combobox si hago esto pierdo el mensaje de errror
			redirect('auth/create_category', 'refresh');
			$this->data['mensaje'] .= "Se creo la categoría " . $this->input->post('category');
		}
		else
		{
				$this->data['message'] = validation_errors();
		}
		#cargo la vista create_category
		$this->load->view('auth/create_category', $this->data);	
	}
	

	function fecha_actual(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box
		$this->data['dia'] = $this->admin_model->get_dia_defecto(); //para el combo box
				
		$this->data['message'] = validation_errors();
		$this->load->view('auth/set_actual_date',$this->data);
	}
	
	
	function set_actual_date_go(){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}	
		$this->data['message'] = "Se cargó la fecha actual con éxito";
		$new_fecha_actual = $this->input->post('dropdown_fechas');
		$dia = $this->input->post('dia');
		$this->admin_model->set_fecha_actual($new_fecha_actual,$dia);
		
		$this->load->view('auth/set_actual_date_go', $this->data);
		
	}
	
	//~ function cargar_sanciones_equipo(){
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $this->data['equipos'] = $this->admin_model->get_equipos(); //para el combo box
//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/cargar_sanciones_view1', $this->data);
		//~ 
	//~ }
	//~ function cargar_sanciones_detalles(){
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $id_equipo = $this->input->post('dropdown_equipos');
		//~ $this->data['jugadores']= $this->admin_model->get_all_players_combo($id_equipo);
//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/cargar_sanciones_view2', $this->data);
		//~ 
	//~ }
	//~ function cargar_sanciones_go(){
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $id_jugador = $this->input->post('dropdown_jugadores');
		//~ $sancion = $this->input->post('sancion');
		//~ $observacion = $this->input->post('observacion');
		//~ $nro_fecha = $this->input->post('fecha');
		//~ $tournament_id = $this->admin_model->get_tournament_by_player_id($id_jugador);
		//~ 
		//~ $this->admin_model->set_sancion($id_jugador,$sancion,$observacion,$tournament_id,$nro_fecha);
//~ 
		//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/cargar_sanciones_ok', $this->data);
	//~ }
	
	function swap_teams_new()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        
        
        $url_link = 'auth/swap_teams_new_temp/';
		$this->data['categoryTree'] = $this->admin_model_new->parse_tree($url_link); # Category Tree
		 
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		# Uso la misma vista que en generar_torneos pero le paso otro link
		$this->load->view('auth/generar_torneos', $this->data);
	}
	
    function swap_teams_new_temp($tournament_id){
        
        $this->data['teams_from_tournament'] = $this->admin_model_new->get_all_teams_from_category_display_by_categoryid_combobox($tournament_id);
        $this->data['teams_actives'] = $this->admin_model_new->get_all_teams_not_this_category_combo($tournament_id);
        
        $this->data['category_name'] =$this->fixture_model_new->get_category_and_subcategory($tournament_id);
        $this->data['tournament_id'] = $tournament_id;
        $this->load->view('auth/swap_teams_view', $this->data);

        
    }
    
    
	function swap_teams_new_go($tournament_id)

	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$team_in = $this->input->post('team_in');
		$team_out = $this->input->post('team_out'); 
		
		if (!$team_in or !$team_out or ($team_in == $team_out)){
			echo "Debe elegir 2 equipos distintos para intercambiar";
		}
		else{
			
			$this->admin_model_new->swap_teams($tournament_id,$team_in,$team_out);
		
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/swap_teams_ok_view', $this->data);
		}
	}
	
	 ## Obsoletas
	
	//~ function generar_fases()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['categories'] = $this->admin_model->get_categories(); //para el combo box
		 //~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/generar_fases', $this->data);
	//~ }
	//~ 
	//~ function generar_fases_ok ()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ #0 si es ida solo y 1 si es ida y vuelta
		//~ $ida_vuelta = 0;
		//~ #tournament_id = category_id
		//~ $tournament_id = $this->input->post('dropdown_category'); //cual tengo que mostrar
	//~ 
		//~ #chequeo si el torneo se creo anteriormente
		//~ if ($this->admin_model->torneo_generado($tournament_id) == 0){
			//~ #esta linea es la que genera el torneo fase
			//~ $this->admin_model->generate_fase($tournament_id,$ida_vuelta);
		//~ 
			//~ $this->data['categories'] = $this->admin_model->get_categories(); //para el combo box
			//~ $this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
			//~ 
			//~ #genero las tablas con esos equipos
			//~ $fase  = 1;
			//~ #me devuelve los teams creados
			//~ $this->data['teams'] = $this->admin_model->generate_table_positions($tournament_id, $fase);
			//~ $this->load->view('auth/generar_fases_ok', $this->data);
			//~ }
		//~ else{
			//~ $this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
			//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//~ $this->load->view('auth/torneo_ya_generado', $this->data);
		//~ }
		//~ 
	//~ }
	
	//~ function swap_teams()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $this->data['equipos'] = $this->admin_model->get_equipos_swap(); //para el combo box
//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/swap_teams_view', $this->data);
	//~ }
	//~ 
//~ 
	//~ function swap_teams_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $team1_id = $this->input->post('dropdown_team1'); //cual tengo que mostrar
		//~ $team2_id = $this->input->post('dropdown_team2'); //cual tengo que mostrar
		//~ 
		//~ if (!$team1_id or !$team2_id or ($team1_id == $team2_id)){
			//~ echo "Debe elegir 2 equipos distintos para intercambiar";
		//~ }
		//~ else{
			//~ 
			//~ $this->admin_model->swap_teams($team1_id,$team2_id);
		//~ 
			//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//~ $this->load->view('auth/swap_teams_ok_view', $this->data);
		//~ }
	//~ }
	
		function change_name_teams()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['equipos'] = $this->admin_model->get_equipos_swap(); //para el combo box

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('auth/change_name_teams_view', $this->data);
	}
	
	function change_name_teams_go()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$team_id = $this->input->post('dropdown_team'); //cual tengo que mostrar
		$new_name = $this->input->post('new_team'); //cual tengo que mostrar

		
		if ($team_id == 0){
			echo "Debe elegir 1 equipo  para cambiar nombre";
		}
		else{
			$this->admin_model->change_team_name($team_id,$new_name);
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/change_name_teams_ok_view', $this->data);
		}
	}
	
	//~ function create_match()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $this->data['equipos'] = $this->admin_model->get_equipos_swap(); //para el combo box
		//~ $this->data['tournament'] = $this->admin_model->get_tournaments(); //para el combo box
		//~ $this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box
//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/create_match_view', $this->data);
	//~ }
	//~ 
	//~ function create_match_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $team1_id = $this->input->post('dropdown_team1'); //cual tengo que mostrar
		//~ $team2_id = $this->input->post('dropdown_team2'); //cual tengo que mostrar
		//~ $tournament_id = $this->input->post('dropdown_category');
		//~ $fecha_id = $this->input->post('dropdown_fechas');
		//~ 
		//~ if (!$team1_id or !$team2_id or ($team1_id == $team2_id)){
			//~ echo "Debe elegir 2 equipos distintos para generar un partido";
		//~ }
		//~ else{
			//~ 
			//~ $this->admin_model->generate_match($team1_id,$team2_id,$tournament_id,$fecha_id);
		//~ 
			//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//~ $this->load->view('auth/create_match_ok_view', $this->data);
		//~ }
	//~ }
	
	function generar_campeones_grupos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}

		$type_precondicion = 'fase';
		$tournament_precondicion = 'liga';
		
		$type_actual = 'campeones';
		$tournament = 'liga';
		$category = 'grupo';
		
		#0 si es ida solo y 1 si es ida y vuelta
		$ida_vuelta = 0;
		
		#ACA TENGO QUE PONER = 0
		if ($this->admin_model->get_cargados($type_precondicion,$tournament_precondicion) == 0){
			foreach($this->posiciones_model->get_nro_grupo($tournament,$type_actual,$category) as $group):
				$tournament_id = $group->id; //de aca obtengo el id de los grupos
				#ACA TENGO QUE PONER = 0
				if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
								
					$this->admin_model->generate_campeones_grupo($tournament_id,$ida_vuelta);
					$this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
										
					#$fase  = 2;
					#$this->data['teams'] = $this->admin_model->generate_table_positions_campeones($tournament_id, $fase);
					$generado =  0;
				}
				else{
					$generado =  1;
					#"ya estan generados";
				}	
			endforeach;
			
			if ($generado == 0){
				$this->data['message'] = "La fase de grupos de copa de campeones fue creada";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);		
			}	
			else{
				$this->data['message'] = "El torneo fue generado anteriormente";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);
				}	
			
		}
		else{
				$this->data['message'] = "Faltan partidos para terminar";
			$this->load->view('auth/generar_torneos_mensajes', $this->data);	
		}
	}
	
	
	function generar_repechaje_grupos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}

		$type_precondicion = 'fase';
		$tournament_precondicion = 'liga';
		
		$type_actual = 'repechaje';
		$tournament = 'liga';
		$category = 'grupo';
		
		#0 si es ida solo y 1 si es ida y vuelta
		$ida_vuelta = 0;
		
		#ACA TENGO QUE PONER = 0
		if ($this->admin_model->get_cargados($type_precondicion,$tournament_precondicion) == 0){
			foreach($this->posiciones_model->get_nro_grupo($tournament,$type_actual,$category) as $group):
				$tournament_id = $group->id; //de aca obtengo el id de los grupos
				#ACA TENGO QUE PONER = 0
				if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
								
					$this->admin_model->generate_campeones_grupo($tournament_id,$ida_vuelta);
					$this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
										
					#$fase  = 2;
					#$this->data['teams'] = $this->admin_model->generate_table_positions_campeones($tournament_id, $fase);
					$generado =  0;
				}
				else{
					$generado =  1;
					#"ya estan generados";
				}	
			endforeach;
			
			if ($generado == 0){
				$this->data['message'] = "La fase de grupos de copa repechaje fue creada";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);		
			}	
			else{
				$this->data['message'] = "El torneo fue generado anteriormente";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);
				}	
			
		}
		else{
				$this->data['message'] = "Faltan partidos para terminar";
			$this->load->view('auth/generar_torneos_mensajes', $this->data);	
		}
	}
	
	
	function generar_campeonato_grupos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$type_precondicion = 'fase';
		$tournament_precondicion = 'liga';
		
		#Genero todo juntos usando las funciones de copa de campeones
		$type_actual = 'campeonato';
		$tournament = 'liga';
		#0 si es ida solo y 1 si es ida y vuelta
		$ida_vuelta = 0;
		if ($this->admin_model->get_cargados($type_precondicion,$tournament_precondicion) == 0){
			foreach($this->admin_model->get_nro_grupos_campeonato($tournament,$type_actual) as $group):
				$tournament_id = $group->id; //de aca obtengo el id de los grupos
				if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
					$this->admin_model->generate_campeones_grupo($tournament_id,$ida_vuelta);
					$this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
					
					#$fase  = 2;
					#$this->data['teams'] = $this->admin_model->generate_table_positions_campeones($tournament_id, $fase);
					$generado =  0;
				}
				else{
					$generado =  1;
				}	
			endforeach;
			
			if ($generado == 0){
				$this->data['message'] = "La fase de grupos de zona campeonato fue creada";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);		
			}	
			else{
				$this->data['message'] = "El torneo fue generado anteriormente";
				$this->load->view('auth/generar_torneos_mensajes', $this->data);
				}	
		}
		else{
				$this->data['message'] = "Faltan partidos para terminar";
			$this->load->view('auth/generar_torneos_mensajes', $this->data);	
		}
	}
	
	
	//~ function generar_descenso()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $type_precondicion = 'fase';
		//~ $tournament_precondicion = 'liga';
		//~ #Genero todo juntos usando las funciones de copa de campeones
		//~ $type_actual = 'descenso';
		//~ $tournament = 'liga';
//~ 
		//~ #0 si es ida solo y 1 si es ida y vuelta
		//~ #tiene que ir 1 pero las fechas la segunda vuelta tiene que arrancar de mas adelante
		//~ $ida_vuelta = 1;
		//~ 
		//~ if ($this->admin_model->get_cargados($type_precondicion,$tournament_precondicion) == 0){
			//~ foreach($this->admin_model->get_nro_grupos_descenso($tournament,$type_actual) as $group):
				//~ $tournament_id = $group->id; //de aca obtengo el id de los grupos
				//~ if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
					//~ $this->admin_model->generate_campeones_grupo($tournament_id,$ida_vuelta);
					//~ $this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
					//~ #$fase  = 2;
					//~ #$this->data['teams'] = $this->admin_model->generate_table_positions_campeones($tournament_id, $fase);
					//~ $generado =  0;
				//~ }
				//~ else{
					//~ $generado =  1;
				//~ }	
			//~ endforeach;
			//~ 
			//~ if ($generado == 0){
				//~ $this->data['message'] = "El torneo de Zona de Descenso fue generado";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);		
			//~ }	
			//~ else{
				//~ $this->data['message'] = "El torneo fue generado anteriormente";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);
				//~ }	
		//~ }
		//~ else{
				//~ $this->data['message'] = "Faltan partidos para terminar";
			//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);	
		//~ }
	//~ }
	//~ 
	//~ function generar_campeones_cuartos()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $type_precondicion = 'campeones';
		//~ $tournament_precondicion = 'liga';
		//~ 
		//~ #Genero todo juntos usando las funciones de copa de campeones
		//~ $type_actual = 'campeones';
		//~ $tournament = 'eliminatoria';
		//~ $category = 'cuarto';
		//~ 
		//~ if ($this->admin_model->get_cargados($type_precondicion,$tournament_precondicion) == 0){
			//~ foreach($this->posiciones_model->get_nro_grupo($tournament,$type_actual,$category) as $group):
				//~ $tournament_id = $group->id; //de aca obtengo el id de los grupos
				//~ if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
				//~ 
					//~ $this->admin_model->generate_cc_cuartos($tournament_id);
					//~ $this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
					//~ 
					//~ $generado =  0;
				//~ }
				//~ else{
					//~ $generado =  1;
				//~ }	
			//~ endforeach;
			//~ 
			//~ if ($generado == 0){
				//~ $this->data['message'] = "Los partidos de cuartos de final para copa de campeones fue creada";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);		
			//~ }	
			//~ else{
				//~ 
				//~ $this->data['message'] = "El torneo fue generado anteriormente";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);
				//~ }
					//~ 
		   //~ }
		   //~ else{
				//~ $this->data['message'] = "Faltan partidos para terminar";
			//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);	
		//~ }
//~ 
	//~ }
	//~ 
	//~ function generar_campeonato_semis(){
	//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $type = 'campeonato';
		//~ #$tournament = 'eliminatoria';
		//~ #$name = 'semi';
		//~ 
		//~ $this->data['categories'] = $this->admin_model->get_categories_campeonato($type); //para el combo box
		 //~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->load->view('auth/generar_campeonato_semis', $this->data);
	//~ }
	//~ 
	//~ function generar_campeonato_semis_ok (){
		//~ 
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $type_precondicion = 'campeonato';
		//~ $tournament_precondicion = 'liga';
		//~ $category_precondicion = $this->input->post('dropdown_category'); //cual tengo que mostrar
		//~ 
		//~ #Genero todo juntos usando las funciones de copa de campeones
		//~ $type_actual = 'campeonato';
		//~ $tournament = 'eliminatoria';
		//~ $category = $category_precondicion;
		//~ $name = 'semi';
		//~ 
		//~ #$category_precondicion = $this->admin_model->get_category_cat_by_id($tournament_id);
		//~ 
		//~ if ($this->admin_model->get_cargados_semis($type_precondicion,$tournament_precondicion,$category_precondicion) == 0){
			//~ 
			//~ foreach($this->admin_model->get_nro_grupo_semi($tournament,$type_actual,$category,$name) as $group):
				//~ $tournament_id = $group->id; //de aca obtengo el id de los grupos	
				//~ if ($this->admin_model->torneo_generado($tournament_id) == 0){#si es 0 es porque no esta generado
					//~ 
					//~ $this->admin_model->generate_cc_cuartos($tournament_id);
					//~ $this->data['categoria'] = strtoupper($this->admin_model->get_category_by_id($tournament_id));
					//~ 
					//~ $generado =  0;
				//~ }
				//~ else{
					//~ $generado =  1;
				//~ }	
			//~ endforeach;
			//~ if ($generado == 0){
				//~ $this->data['message'] = "Los partidos de semi para  copa de campeones fue creada";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);		
			//~ }	
			//~ else{
				//~ 
				//~ $this->data['message'] = "El torneo fue generado anteriormente";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);
				//~ }
					//~ 
		   //~ }
		   //~ else{
				//~ $this->data['message'] = "Faltan partidos para terminar";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);	
		//~ }
		//~ 
		//~ 
		//~ 
	//~ }
	//~ 
	//~ function generar_postfase()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->data['post_fase'] = $this->admin_model->get_postfase_temp();
		//~ 
		//~ $this->data['tournament'] = $this->admin_model->get_tournaments_postfase(); //para el combo box
			//~ 
		//~ $this->load->view('auth/postfase_view', $this->data);
	//~ }
	//~ 
	//~ function postfase_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['new_post'] = $this->input->post('dropdown');
		//~ $this->data['new_post_id'] = $this->input->post('hid');
		//~ 
		//~ $this->admin_model->update_postfase_temp($this->data['new_post'],$this->data['new_post_id']);
//~ 
		//~ $this->load->view('auth/generar_torneos_view', $this->data);
	//~ }
	//~ 
	//~ function generar_torneos_go(){
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = "Se generaron todos los torneos correctamente";
		//~ $fase = 2;
		//~ 
		//~ #Este es el que genera todo
		//~ if ($this->admin_model->torneos_postfase_generado()){
			//~ $this->admin_model->generar_torneo_post_fases($fase);
			//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);
		//~ }
		//~ else{
				//~ $this->data['message'] = "El torneo fue generado anteriormente";
				//~ $this->load->view('auth/generar_torneos_mensajes', $this->data);		}
//~ 
		//~ 
	//~ }
		//~ 
	//~ function set_results()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->data['tournament'] = $this->admin_model->get_tournaments_liga(); //para el combo box
		//~ $this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box
//~ 
		//~ $this->load->view('auth/set_results', $this->data);
		//~ 
	//~ }
	//~ 
	//~ function set_results_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['actual_tournament_id'] = $this->input->post('dropdown_category');
		//~ $this->data['actual_fecha_id'] = $this->input->post('dropdown_fechas');
		//~ $this->data['category_name'] = strtoupper($this->admin_model->get_category_by_id($this->data['actual_tournament_id']));
		//~ if ($this->admin_model->get_type_category_by_id($this->data['actual_tournament_id']) == 'fase' ){
			//~ $fase = 1;
			//~ } 
		//~ else{
			//~ $fase = 2;
			//~ }
		//~ $this->data['partidos'] = $this->admin_model->get_partidos($this->data['actual_tournament_id'],$this->data['actual_fecha_id'],$fase);
		//~ $this->load->view('auth/set_results_go', $this->data);
		//~ 
	//~ }
	
	//~ function set_goleadores($actual_tournament_id)
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['result1'] = $this->input->post('res1');	
		//~ $this->data['result2'] = $this->input->post('res2');	
		//~ $this->data['partidos_id'] = $this->input->post('part_id');	
		//~ $this->data['cargados'] = $this->input->post('cargados');
		//~ $this->data['perdidos'] = $this->input->post('perdidos');	
//~ 
//~ 
		//~ $matchs_id = $this->data['partidos_id'];
		//~ $teams1_res = $this->data['result1']; 
		//~ $teams2_res = $this->data['result2'];
		//~ $cargados = $this->data['cargados'];
		//~ $perdidos = $this->data['perdidos'];
		//~ #seteo los resultados y perdido es 1 entonces ambos pierden
		//~ $this->admin_model->set_results($matchs_id,$teams1_res,$teams2_res,$cargados,$perdidos);
		//~ #1 si es fase 2 si es campeones/campeonato/descenso
		//~ if ($this->admin_model->get_type_category_by_id($actual_tournament_id) == 'fase' ){
			//~ $fase = 1;
			//~ } 
		//~ else{
			//~ $fase = 2;
			//~ }
		//~ $i = 1;
		//~ foreach($matchs_id as $partido_id):
			//~ $partido = $this->admin_model->get_team_by_match($partido_id);
			//~ $this->data['equipo1_name'][$partido_id] = $partido->equipo1_name;
			//~ $this->data['equipo2_name'][$partido_id] = $partido->equipo2_name;
			//~ $this->data['players_team1'][$partido_id] = $this->admin_model->get_all_players_combo($partido->team1_id);
			//~ $this->data['players_team2'][$partido_id] = $this->admin_model->get_all_players_combo($partido->team2_id); 
			//~ 
			//~ $acutal_cargado = $this->data['cargados'][$i];
			//~ $acutal_perdido = $this->data['perdidos'][$i];
			//~ #actualizo posiciones pero solo de los que no estaban seteados
			//~ 
			//~ $this->admin_model->update_positions($partido,$fase,$acutal_cargado,$acutal_perdido);
			//~ $i++;
		//~ endforeach;
		//~ $this->load->view('auth/set_goleadores', $this->data);
	//~ }
	//~ 
	function set_results_elim()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['tournament'] = $this->admin_model->get_tournaments_elim(); //para el combo box

		$this->load->view('auth/set_results_elim', $this->data);
	}
	
	function set_results_elim_go(){
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['actual_tournament_id'] = $this->input->post('dropdown_category');
		$this->data['category_name'] = strtoupper($this->admin_model->get_category_by_id($this->data['actual_tournament_id']));
		
		$this->data['partidos'] = $this->admin_model->get_partidos_elim($this->data['actual_tournament_id']);
		$this->load->view('auth/set_results_elim_go', $this->data);
	}
	
	function set_results_elim_ok(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
		$this->data['result1'] = $this->input->post('res1');	
		$this->data['result2'] = $this->input->post('res2');	
		
		$this->data['penales1'] = $this->input->post('pen1');	
		$this->data['penales2'] = $this->input->post('pen2');	
		
		$this->data['partidos_id'] = $this->input->post('part_id');	
		$this->data['cargados'] = $this->input->post('cargados');
		$this->data['perdidos'] = $this->input->post('perdidos');	

		$matchs_id = $this->data['partidos_id'];
		$teams1_res = $this->data['result1']; 
		$teams2_res = $this->data['result2'];
		$team1_pen = $this->data['penales1'];
		$team2_pen = $this->data['penales2'];
		$cargados = $this->data['cargados'];
		$perdidos = $this->data['perdidos'];
		
		#seteo los resultados y perdido es 1 entonces ambos pierden
		$this->admin_model->set_results_elim($matchs_id,$teams1_res,$teams2_res,$team1_pen,$team2_pen,$cargados,$perdidos);
		$this->load->view('auth/set_results_elim_ok', $this->data);	
	}	
		
	function set_horario()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['tournament'] = $this->admin_model->get_tournaments_liga(); //para el combo box
		$this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box

		$this->load->view('auth/set_horarios', $this->data);
		
	}
	
	
	
	
	//~ function set_horarios_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['actual_tournament_id'] = $this->input->post('dropdown_category');
		//~ $this->data['actual_fecha_id'] = $this->input->post('dropdown_fechas');
		//~ $this->data['category_name'] = strtoupper($this->admin_model->get_category_by_id($this->data['actual_tournament_id']));
		//~ if ($this->admin_model->get_type_category_by_id($this->data['actual_tournament_id']) == 'fase' ){
			//~ $fase = 1;
			//~ } 
		//~ else{
			//~ $fase = 2;
			//~ }
		//~ $this->data['partidos'] = $this->admin_model->get_partidos($this->data['actual_tournament_id'],$this->data['actual_fecha_id'],$fase);
		//~ $this->load->view('auth/set_horarios_go', $this->data);
		//~ 
	//~ }
	
	function partidos_por_horario(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box
	
		$this->load->view('auth/partidos_por_horario', $this->data);

	}
	
	function partidos_por_horario_go(){

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$actual_fecha_id = $this->input->post('dropdown_fechas');
		$this->data['horarios'] = $this->admin_model->get_partidos_por_horario($actual_fecha_id); //para el combo box
		
		$this->load->view('auth/partidos_por_horario_go', $this->data);

	}
	

	
	function set_horario_elim()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['tournament'] = $this->admin_model->get_tournaments_elim(); //para el combo box
		$this->data['fechas'] = $this->admin_model->get_fechas(); //para el combo box

		$this->load->view('auth/set_horarios_elim', $this->data);
		
	}
	
	
	function set_horarios_elim_go()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['actual_tournament_id'] = $this->input->post('dropdown_category');
		$this->data['actual_fecha_id'] = $this->input->post('dropdown_fechas');
		$this->data['category_name'] = strtoupper($this->admin_model->get_category_by_id($this->data['actual_tournament_id']));
		if ($this->admin_model->get_type_category_by_id($this->data['actual_tournament_id']) == 'fase' ){
			$fase = 1;
			} 
		else{
			$fase = 2;
			}
		$this->data['partidos'] = $this->admin_model->get_partidos_elim($this->data['actual_tournament_id']);
		$this->load->view('auth/set_horarios_elim_go', $this->data);
		
	}
	
	function set_horarios_elim_last()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['dias'] = $this->input->post('dias');	
		$this->data['horarios'] = $this->input->post('horarios');	
		$this->data['canchas'] = $this->input->post('canchas');	
		$this->data['partidos_id'] = $this->input->post('part_id');	

		$matchs_id = $this->data['partidos_id'];
		$dias = $this->data['dias'];
		$horarios = $this->data['horarios']; 
		$canchas = $this->data['canchas'];
		
		#seteo los resultados
		$this->admin_model->set_horarios_elim($matchs_id,$dias,$horarios,$canchas);
		
		$this->load->view('auth/set_horarios_elim_ok', $this->data);
		
	}
	######################## IMPRIMIR PLANILLAS
	
	
	function print_form_elim($id_partido){

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$equipos = $this->admin_model->get_equipos_partidos_elimin($id_partido);
		
		foreach ($equipos as $equipo){
			$team1_id = $equipo->team1_id;
			$team2_id = $equipo->team2_id;
			$this->data['equipo1_name'] = $equipo->equipo1_name;
			$this->data['equipo2_name'] = $equipo->equipo2_name;
			$this->data['cancha'] = $equipo->court;
			$this->data['hora'] = $equipo->time;
            $tournament_id = $equipo->tournament_id;

		}
		
        $torneos = $this->admin_model->get_tipo_torneo_elimin($tournament_id);
    
        foreach ($torneos as $torneo){
			$this->data['type'] = $torneo->type;
            $this->data['category'] = $torneo->category;
            $this->data['name'] = " (" . $torneo->name . ")";
		}
        
		$this->data['players_team1'] = $this->admin_model_new->show_players_ficha($team1_id);
		$this->data['players_team2'] = $this->admin_model_new->show_players_ficha($team2_id);
		
	
		$this->load->view('auth/mostrar_planilla', $this->data);
	}
	
    function print_form_old($id_partido){
	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth/login', 'refresh');
			}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$results = $this->admin_model->to_excel_model($id_partido);
	}
	
	
	#######################################################################
	//~ function set_goleadores_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//~ 
		//~ $this->data['goleadores_id'] = $this->input->post('players');
		//~ 
		//~ $this->admin_model->set_goleadores($this->data['goleadores_id']); 
		//~ $this->load->view('auth/set_goleadores_ok', $this->data);
	//~ }
		
	function cargar_responsable()
	{	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}	
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$capitan =   $this->input->post('capitan');
		$delegado =   $this->input->post('delegado');
		$sub_delegado =   $this->input->post('sub_delegado');
		
		$responsables_ids = array(
               'capitan_id' => $capitan,
               'delegado_id' => $delegado,
               'sub_delegado_id' => $sub_delegado
            );
			
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		
		$this->admin_model->update_responsables($team_id,$responsables_ids);
		
		$this->load->view('auth/carga_jugador_success', $this->data);
	}
	
	function mostrar_categorias()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
			
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['categories'] = $this->admin_model->get_categories(); //para el combo box

		$this->load->view('auth/preinscriptos_view1', $this->data);

	}
	
	//~ function asignar_categorias()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			//~ {
				//~ redirect('auth', 'refresh');
			//~ }
			//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['categories'] = $this->admin_model->get_categories_ninguno(); //para el combo box
		//~ $this->data['orden'] = $this->admin_model->get_orden_ninguno(); //para el combo box
//~ 
		//~ 
 		//~ $this->data['teams'] = $this->admin_model->get_all_teams_nocategory();
//~ 
		//~ $this->load->view('auth/asignar_categorias_view1', $this->data);
//~ 
	//~ }
	//~ 
	//~ function asignar_categorias_go()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//~ {
			//~ redirect('auth/login', 'refresh');
		//~ }
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['new_post'] = $this->input->post('dropdown');
		//~ $this->data['new_post_id'] = $this->input->post('hid');
		//~ 
		//~ $this->data['new_post2'] = $this->input->post('dropdown2');
		//~ $this->data['new_post_id2'] = $this->input->post('hid2');
		//~ 
		//~ $this->admin_model->update_categorias($this->data['new_post'],$this->data['new_post_id']);
		//~ $this->admin_model->update_equipos($this->data['new_post2'],$this->data['new_post_id2']);
//~ 
//~ 
		//~ $this->load->view('auth/asignar_categorias_view2', $this->data);
	//~ }
	//~ 
	//~ function mostrar_equipos()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			//~ {
				//~ redirect('auth', 'refresh');
			//~ }
			//~ 
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ 
		//~ $this->data['team'] = $this->admin_model->get_teams_combo($this->input->post('categories')); //para el combo box
//~ 
		//~ $this->load->view('auth/preinscriptos_view2', $this->data);
//~ 
	//~ }
	//~ 
	//~ function pre_inscriptos()
	//~ {
		//~ if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			//~ {
				//~ redirect('auth', 'refresh');
			//~ }
		//~ $opcion = $this->input->post('submit');
		//~ $this->data['team_id'] = $this->input->post('team');
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->data['players'] = $this->admin_model->get_all_players($this->input->post('team')); 
		//~ 
		//~ $this->load->view('auth/preinscriptos_view3', $this->data);
	//~ }
	
	# Esta es nueva para que desde el admin se pueda inscribir un jugador
	function inscribir_jugador($team_id){
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
	
		$this->data['team_id'] = $team_id;
		
		//validate form input
		$this->form_validation->set_rules('name', 'Nombre', 'required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Apellido', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('birth', 'Fecha de Nacimiento', 'required|xss_clean');
		$this->form_validation->set_rules('phone', 'Telefono', 'required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('dni', 'Documento', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Domicilio', 'required|xss_clean');
		
		if ($this->form_validation->run() == true)
		{
			############## Para subir la foto del jugador ##################
						
			$config['upload_path'] = './uploads/jugadores/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
			$config['max_size']	= '0';
			$config['overwrite']	= FALSE;
			$config['encrypt_name']	= TRUE;
		
		
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$this->data['message'] = array('error' => $this->upload->display_errors());			
			}
			else
			{
				###### ACA VA TODO LO REFERIDO AL EXITO
				$data_img = $this->upload->data();
				$this->upload->data();
				$this->data['data_img'] = $data_img;
				
				if($data_img['image_width'] > 600 || $data_img['image_height'] > 364){
						   $config['image_library'] = 'gd2';
						   $config['source_image'] = $data_img['full_path'];
						   $config['maintain_ratio'] = TRUE;
						   $config['width'] = 600;
						   $config['height'] = 364;
	
						   $this->load->library('image_lib', $config);
						   
						   if( ! $this->image_lib->resize()){
								   #$error = array('error' => $this->image_lib->display_errors());
								   $this->data['message'] = array('error' => $this->image_lib->display_errors());
						   }else{
								  #exito
						   }
				   
				   }else{
						   #exito
				   }
				
				$url_imagen =  $data_img['file_name'];
			}

			$this->load->library('upload', $config);
			
			$additional_data = array('name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'birth' => $this->input->post('birth'),
				'phone' => $this->input->post('phone'),
				'dni' => $this->input->post('dni'),
				'address' => $this->input->post('address'),
				'obra_social' => $this->input->post('obra_social'),
				'team_id' => $team_id,
				'foto' => $url_imagen,
				'inscripto' => 1, #lo seteo como inscripto
			);

			$this->admin_model->subir_jugador($additional_data);
			redirect('auth/pre_inscriptos_by_team_id/' . $team_id, 'refresh');


		}
		
		else{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = validation_errors();

			$this->data['name'] = array('name' => 'name',
				'id' => 'name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('name'),
			);
			$this->data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			
			$this->data['dni'] = array('name' => 'dni',
				'id' => 'dni',
				'type' => 'text',
				'value' => $this->form_validation->set_value('dni'),
			);
			
			$this->data['birth'] = array('name' => 'birth',
				'id' => 'birth',
				'type' => 'text',
				'value' => $this->form_validation->set_value('birth'),
			);
			
			$this->data['phone'] = array('name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			
			$this->data['address'] = array('name' => 'address',
				'id' => 'address',
				'type' => 'text',
				'value' => $this->form_validation->set_value('address'),
			);
			
			$this->data['obra_social'] = array('name' => 'obra_social',
				'id' => 'obra_social',
				'type' => 'text',
				'value' => $this->form_validation->set_value('obra_social'),
			);

			$this->load->view('auth/inscribir_jugador_view', $this->data);

		}

	}
	
	function pre_inscriptos_by_team_id($team_id)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
	
		$this->data['team_id'] = $team_id;
		
		$opcion = $this->input->post('submit');
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['players'] = $this->admin_model->get_all_players($team_id); 
		
		$this->load->view('auth/preinscriptos_view3', $this->data);
	}
	
	function edit_player(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$id = $this->uri->segment(3);
		$this->data['player'] = $this->admin_model->get_player($id); 
	
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->load->view('auth/edit_player_view', $this->data);
		
	}
	
	function edit_user_go(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$id = $this->uri->segment(3);
		
		$datos = array(
						'name'		=> strip_tags($this->input->post('nombre')),
						'last_name'		=> strip_tags($this->input->post('apellido')),
						'goal'		=> strip_tags($this->input->post('goles')),
						'yellow'		=> strip_tags($this->input->post('yellow')),
						'red'		=> strip_tags($this->input->post('red')),
						'dni'		=> strip_tags($this->input->post('dni')),
						'address'		=> strip_tags($this->input->post('direccion')),
						'email'		=> strip_tags($this->input->post('email')),
						'obra_social'		=> strip_tags($this->input->post('obra_social')),
						'birth'		=> strip_tags($this->input->post('nacimiento')),
						'phone'		=> strip_tags($this->input->post('telefono')),
						
					);
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->admin_model->update_player($id,$datos); 
		$this->load->view('auth/edit_player_ok', $this->data);
		
	}
	
	function preview_mail()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['details'] = $this->admin_model->get_details();
			#foreach ($this->data['details'] as $detail){
				#if ($detail->email ){
					#Esto es para mandar mail a todos los delegados
					#$this->admin_model->send_mail_insc($detail);
				#}
			#}
			#$this->load->view('auth/enviar_mail_view', $this->data);
	}
	function inscribir()
		{
			if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			{
				redirect('auth', 'refresh');
			}
			
		$ids_elec = $this->input->post('electro');	
		$ids_cert = $this->input->post('certificado');
		$ids_deslinde = $this->input->post('deslinde');
		$ids_inscriptos = $this->input->post('inscripto');

		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->admin_model_new->update_jugadores($ids_elec,$ids_cert,$ids_deslinde,$ids_inscriptos);
		
		$this->load->view('auth/preinscripto_success', $this->data);
	}
	

		
	function asignar_responsables(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
				$user_logged = $this->ion_auth->get_user();
				$team_id = $user_logged->team_id;
				
				$this->data['title'] = 'Asignar responsables';
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->data['jugadores'] = $this->admin_model->get_players_combo($team_id,'0'); //para el combo box
				$this->load->view('auth/create_captain_view', $this->data);	
							
			
	}
		
	#Ver jugadores preinscriptos	
	function jugadores_preinscriptos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['title'] = 'Preinscripción';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		
		$this->data['players'] = $this->admin_model->get_players($team_id,'0');
		$this->load->view('auth/show_preinscriptos_view', $this->data);
	}
	
	function jugadores_habilitados()
	{
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->data['title'] = 'Habilitados';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		
		$this->data['players'] = $this->admin_model->get_players($team_id,'1');
		$this->load->view('auth/show_inscriptos_view', $this->data);
	}	
	function delete_player_temp($id_player_temp)
	{ 
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->admin_model->delete_player_temp($id_player_temp);
		$this->data['message'] = "El jugador ha sido eliminado";
		$this->load->view('auth/delete_player_ok', $this->data);
	}
	
	/*function upload_foto_equipo(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$this->load->view('auth/carga_foto_equipo_view', array('error'=>''));
	}*/
	
	
	/*function do_upload_foto_equipo(){
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
		$config['max_size']	= '0';
		$config['overwrite']	= FALSE;
		$config['encrypt_name']	= TRUE;

		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			#$this->data['message'] = array('error' => $this->upload->display_errors());
			$this->load->view('auth/carga_foto_equipo_view', $error);
			#$this->load->view('auth/carga_foto_equipo_view', $this->data);

		}
		else
		{
			$data_img = $this->upload->data();
			$this->upload->data();
			
			
			if($data_img['image_width'] > 370 || $data_img['image_height'] > 208){
					   $config['image_library'] = 'gd2';
					   $config['source_image'] = $data_img['full_path'];
					   $config['maintain_ratio'] = TRUE;
					   $config['width'] = 370;
					   $config['height'] = 208;

					   $this->load->library('image_lib', $config);
					   
					   if( ! $this->image_lib->resize()){
							   $error = array('error' => $this->image_lib->display_errors());
					   }else{
							  #exito
					   }
			   
			   }else{
					   #exito
			   }
			
			$url_imagen =  $data_img['file_name'];
			$datos = array(
						'title'		=> strip_tags($this->input->post('title')),
						'text'		=> strip_tags($this->input->post('text')),
						'image'		=> strip_tags($url_imagen),
					);
			$this->admin_model->subir_foto($datos);
			$this->load->view('auth/upload_foto_equipo_ok', $data_img);
		}
	}
	*/
	####################################################################################
	//redirect if needed, otherwise display the user list
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('base_url'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->get_users_array();
			


			$this->load->view('auth/index', $this->data);
		}
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{ //if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect($this->config->item('base_url'), 'refresh'); asi estaba antes
				$group_name = 'inscriptions';
				if ($this->ion_auth->is_group($group_name)){ //if the login is successful for an user that it's not an admin user
					$this->load->view('auth/preinscripcion');//redirect them back to the ventas page
				} else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('auth', 'refresh');
				}
			}
		
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->load->view('auth/login', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them back to the page they came from
		redirect('auth', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', 'Old password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		$user = $this->ion_auth->get_user($this->session->userdata('user_id'));

		if ($this->form_validation->run() == false)
		{ //display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['old_password'] = array('name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array('name' => 'new',
				'id' => 'new',
				'type' => 'password',
			);
			$this->data['new_password_confirm'] = array('name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
			);
			$this->data['user_id'] = array('name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->load->view('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{ //if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);
			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/forgot_password', $this->data);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten)
			{ //if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code)
	{
		$reset = $this->ion_auth->forgotten_password_complete($code);

		if ($reset)
		{  //if the reset worked then send them to the login page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth/login", 'refresh');
		}
		else
		{ //if the reset didnt work then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//activate the user
	function activate($id, $code=false)
	{
		$activation = $this->ion_auth->activate($id, $code);

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		// no funny business, force to integer
		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->get_user($id);
			$this->load->view('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_404();
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	//create a new user
	function create_user()
	{
		$this->data['title'] = "Create User";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$additional_data = array('first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, '0'))
		{ //check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', "User Created");
			redirect("auth", 'refresh');
		}
		else
		{ //display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array('name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array('name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone1'] = array('name' => 'phone1',
				'id' => 'phone1',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone1'),
			);
			$this->data['phone2'] = array('name' => 'phone2',
				'id' => 'phone2',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone2'),
			);
			$this->data['phone3'] = array('name' => 'phone3',
				'id' => 'phone3',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone3'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array('name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$this->load->view('auth/create_user', $this->data);
		}
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
				$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
		
	function edit_user()
	{
		$this->data['title'] = "Edit";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
		{
		//validate form input
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[20]');

			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email = $this->input->post('email');

			$additional_data = array('first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
			);
		
			$id = $this->input->post('id');
			$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'username' => $username,
					'email' => $email,
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3')
					 );
			$this->ion_auth->update_user($id, $data);

		 //display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array('name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['phone1'] = array('name' => 'phone1',
				'id' => 'phone1',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone1'),
			);
			$this->data['phone2'] = array('name' => 'phone2',
				'id' => 'phone2',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone2'),
			);
			$this->data['phone3'] = array('name' => 'phone3',
				'id' => 'phone3',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone3'),
			);
			$this->data['id'] = array('name' => 'id',
				'id' => 'id',
				'type' => 'text',
				'value' => $this->form_validation->set_value('id'),
			);
			
			$this->load->view('auth/edit_user', $this->data);
		
		}
	}
	
	function cargar_noticia(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Cargar algo";
		$this->data['error'] = '';
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		$this->load->view('auth/carga_noticia',$this->data);
	}

	function do_upload(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('auth/carga_noticia', $error);
		}
		else
		{
			$data = $this->upload->data();
			$url_imagen =  $data['file_name'];
			$datos = array(
						'title'		=> strip_tags($this->input->post('title')),
						'text'		=> strip_tags($this->input->post('text')),
						'image'		=> strip_tags($url_imagen),
					);
			$this->admin_model->subir_noticia($datos);
			$this->load->view('auth/carga_noticia_success', $data);
		}
	}
	
	function pre_clean_db(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Borrar la base de datos";
		$this->data['message'] = '';
		
		$clausura = 0;
		

		$this->load->view('auth/pre_clean_db',$this->data);
	}
	############################# BORRAR LA DB
	function clean_db(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Borrar la base de datos";
		$this->data['message'] = '';
		
		$clausura = 0;
		
		$this->admin_model_new->clean_db($clausura);

		$this->load->view('auth/clean_db',$this->data);
	}
	
	function clean_db_total(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Borrar la base de datos";
		$this->data['message'] = '';
		
		$clausura = 1;
		
		$this->admin_model_new->clean_db($clausura);

		$this->load->view('auth/clean_db',$this->data);
	}
	
	
   ############agregada por bibi
	 function cargar_nota() 
    {
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
            redirect('auth', 'refresh');
        }
        $this->data['title'] = "Cargar Nota"; //fecha titulo texto audio id_user foto
        //validate form input
        $this->form_validation->set_rules('titulo', 'Título de la nota', 'required|xss_clean');

        if ($this->form_validation->run() == true)
        {
            
            if (!empty($_FILES['foto']['name']))
            {
                // Configuracion para la 'foto'
                $config['upload_path'] = 'uploads/notas/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
                $config['max_size'] = '0';
                $config['overwrite']= FALSE;  
                $config['encrypt_name']    = TRUE;
     
                // Initialize config for 'foto'
                $this->load->library('upload', $config);
     
                // Upload 'foto'
                if ($this->upload->do_upload('foto'))
                {
                    $data_foto = $this->upload->data();
					if($data_foto['image_width'] > 370 || $data_foto['image_height'] > 280){
                       $config['image_library'] = 'gd2';
                       $config['source_image'] = $data_foto['full_path'];
                       $config['maintain_ratio'] = TRUE;
                       $config['width'] = 370;
                       $config['height'] = 280;

                       $this->load->library('image_lib', $config);
                       
                       if( ! $this->image_lib->resize()){
                               #$error = array('error' => $this->image_lib->display_errors());
                               $this->data['message'] = array('error' => $this->image_lib->display_errors());
                       }
					   else{
                              #exito
							  $foto_name = $data_foto['file_name'];
                      }
           		    }

                 }
                 else
                {
					$foto_name = "";
                    $this->data['message'] = $this->upload->display_errors();
					$this->load->view('auth/carga_nota_error',$this->data);
					return;
                }
            } // aca finaliza el IF para la 'foto'
             
			elseif (empty($_FILES['foto']['name'])){$foto_name = "";}
         
            // Do we have a second file?
            if (!empty($_FILES['audio']['name']))
            {
				
				// Configuracion para el audio
                $config2['upload_path'] = 'uploads/notas/';
                $config2['allowed_types'] = 'mp3|MP3|wav|WAV';
                $config2['overwrite']= FALSE;  
                $config2['encrypt_name']    = TRUE;
                // Initialize config for 'audio'
                $this->load->library('upload', $config2);
                // Upload the second file
                if ($this->upload->do_upload('audio'))
                {
                    $data_audio = $this->upload->data();
					$audio_name = $data_audio['file_name'];
                }
                else
                {
					$audio_name = "";
                    $this->data['message'] = $this->upload->display_errors();
					$this->load->view('auth/carga_nota_error',$this->data);
					return;
                }
            }
            elseif (empty($_FILES['audio']['name'])){$audio_name = "";}
	
            $user_logged = $this->ion_auth->get_user();
            $id_user = $user_logged->id;
            $data = array(
                'id_user' => $id_user,
                'titulo' => $this->input->post('titulo'),
                'fecha' => date("Y-m-d"),
                'texto' => $this->input->post('texto'),
                'foto' => $foto_name,
                'audio' => $audio_name,
            );
            
			$this->notas_model->subir_nota($data);     
			$this->data['message'] = "Tu nota ha sido cargada con éxito!";
           	$this->load->view('auth/carga_nota_success',$this->data);
        }
        else
        {
        $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
        
        $this->data['titulo'] = array('name' => 'titulo',
            'id' => 'titulo',
            'type' => 'text',
            'value' => $this->form_validation->set_value('titulo'),
        );
        $this->data['texto'] = array('name' => 'texto',
            'id' => 'texto',
            'type' => 'text',
            'value' => $this->form_validation->set_value('texto'),
        );
        
        $this->data['fecha'] = array('name' => 'fecha',
            'id' => 'fecha',
            'type' => 'text',
            'value' => $this->form_validation->set_value('fecha'),
        );
        
        $this->data['foto'] = array('name' => 'foto',
            'id' => 'foto',
            'type' => 'file',
            'value' => $this->form_validation->set_value('foto'),
        );
        
		 $this->load->view('auth/cargar_nota_view',$this->data);
        }
    }
	
	function  set_tournament(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Cambiar el tipo de torneo para mostrar";
		$this->data['message'] = '';
		
		$this->data['torneo_actual'] = $this->data['categories'] = $this->admin_model->get_show_tournament();
	
		$this->load->view('auth/change_show_tournament_view',$this->data);

	}
	
	function set_tournament_go($torneo_actual){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "";
		$this->data['message'] = 'Se ha cambiado el tipo de torneo a mostrar con exito';
		
		$this->data['torneo_actual'] = $this->data['categories'] = $this->admin_model->set_show_tournament($torneo_actual);
			$this->load->view('auth/change_show_tournament_view_ok',$this->data);

	}

}
