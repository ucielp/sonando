<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posiciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('ion_auth');

	}
	
    # TODO arreglar este HACK que puse el event_id por defecto
	function index($event_id=26) {
		
		$this->data['title'] = "Posiciones";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox

		$this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
        $this->data['posiciones'] = $this->admin_model_new->get_positions($event_id); //genero la tabla de posiciones


   		$url_link = 'posiciones/show/';
        $this->data['categoryTree'] = $this->fixture_model_new->parse_tree($url_link); # Category Tree
			
		$this->data['main_content'] = 'home/posiciones/new_posiciones_view';
		$this->load->view('home/temp/template', $this->data);

	}
	
	function show($event_id=26) {
		
		$this->data['title'] = "Posiciones";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox

		$this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
        $this->data['posiciones'] = $this->admin_model_new->get_positions($event_id); //genero la tabla de posiciones


   		$url_link = 'posiciones/show/';
        $this->data['categoryTree'] = $this->fixture_model_new->parse_tree($url_link); # Category Tree

		$this->load->view('home/posiciones/table_wrapper_view', $this->data);
		
	}
	
	//~ public function show_positions(){
		//~ 
		//~ $data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox
		//~ 
		//~ $event_id = $this->input->post('dropdown_events'); //cual tengo que mostrar
//~ 
//~ 
		//~ $data['event_name'] = $this->fixture_model_new->get_event_name_by_id($event_id); //para imprimir el nombre por pantalla
		//~ $data['posiciones'] = $this->posiciones_model->get_positions($event_id); //genero la tabla de posiciones
//~ 
		//~ $data['title'] = "Posiciones";
		//~ $data['main_content'] = 'home/posiciones/ver_events_view_new.php';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ 
	//~ 
	//~ 
	//~ 
	//~ 
	//~ ############################################################################
	//~ ############################################################################
	//~ 
	//~ 
	//~ /*****************FASE************************/
	//~ public function fase(){
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase";
		//~ $type = 'fase';
		//~ $data['main_content'] = 'home/posiciones/fase';
		//~ $data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ 
	//~ public function ver_fase(){
		//~ $type = 'fase';
		//~ $tournament = 'liga';
		//~ 
		//~ $data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		//~ $actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		//~ $actual_fase1_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del torneo
		//~ $data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		//~ $data['posiciones'] = $this->posiciones_model->get_positions_fase1($actual_fase1_id); //genero la tabla de posiciones
//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		//~ $data['main_content'] = 'home/posiciones/ver_fase';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
//~ 
	//~ #Esta la agregue y la cambie por ver_fase que sigue funcionando igualmente
	//~ public function ver_fase_apertura($category_id){
		//~ 
		//~ $type = 'fase';
		//~ $tournament = 'liga';
		//~ 
		//~ $data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		//~ $actual_tournament_category = $category_id;
//~ 
		//~ $actual_fase1_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del torneo
		//~ $data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		//~ $data['posiciones'] = $this->posiciones_model->get_positions_fase1($actual_fase1_id); //genero la tabla de posiciones
//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		//~ $data['main_content'] = 'home/posiciones/ver_fase';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ 
	//~ /*****************ZONA DESCENSO************************/
	//~ /*****************ES IGUAL A FASE PERO SE LE PASAN DISTINTAS VARIABLES************************/
	//~ 
	//~ public function descenso(){
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Descenso";
		//~ $type = 'descenso';
		//~ $data['categories'] = $this->posiciones_model->get_categories($type);
		//~ $data['main_content'] = 'home/posiciones/descenso';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ public function ver_descenso(){
		//~ #igual que ver_fase pero cambio fase por descenso
		//~ $type = 'descenso';
		//~ $tournament = 'liga';
		//~ 
		//~ 
		//~ $data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		//~ $actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		//~ $actual_fase2_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
		//~ $data['category_name'] = $actual_tournament_category; 
		//~ $data['posiciones'] = $this->posiciones_model->get_positions_fase2($actual_fase2_id);
//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Descenso " . $data['category_name'];
		//~ $data['main_content'] = 'home/posiciones/ver_descenso';
		//~ $this->load->view('home/temp/template', $data);
//~ 
	//~ }
	//~ 
	//~ /*****************COPA DE CAMPEONES************************/
	//~ /*****************Fase de GRUPO************************/
	//~ 
	//~ public function campeones(){
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Copa de Campeones";
		//~ $tournament = 'liga';
		//~ $type = 'campeones';
		//~ $category = 'grupo';
		//~ 
		//~ $arr = array();
		//~ foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$category) as $group):
				//~ $arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id); //de aca obtengo el id de los grupos
		//~ endforeach;
		//~ $data['pos_grupos'] = $arr;
//~ 
		//~ $data['main_content'] = 'home/posiciones/campeones';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ 
	//~ 
	//~ /*****************COPA REPECHAJE************************/
	//~ /*****************Fase de GRUPO************************/
	//~ 
	//~ public function repechaje(){
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Repechaje";
		//~ 
		//~ $tournament = 'liga';
		//~ $type = 'repechaje';
		//~ $data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
			//~ 
			//~ 
		//~ $data['main_content'] = 'home/posiciones/repechaje_view';
		//~ $this->load->view('home/temp/template', $data);		
	//~ }
	//~ 
	//~ public function ver_repechaje(){
		//~ $tournament = 'liga';
		//~ $type = 'repechaje';
		//~ 
		//~ $data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
		//~ $actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		//~ 
		//~ $data['category_name'] = $actual_tournament_category; 
//~ 
		//~ $arr = array();
		//~ foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
				//~ $arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id);
		//~ endforeach;
		//~ $data['pos_grupos'] = $arr;
//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato " . $data['category_name'];
		//~ $data['main_content'] = 'home/posiciones/ver_repechaje';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	//~ 
	//~ /*****************COPA CAMPEONATO************************/
	//~ /*****************Fase de GRUPO************************/
	//~ /*****************Es como copa de campeones pero se le pasa la category en el combo box como arriba************************/
	//~ 
	//~ 
	//~ public function campeonato(){
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato";
		//~ $type = 'campeonato';
		//~ $data['main_content'] = 'home/posiciones/campeonato';
		//~ $data['categories'] = $this->posiciones_model->get_categories($type);
		//~ $this->load->view('home/temp/template', $data);		
	//~ }
	//~ 
	//~ public function ver_campeonato(){
		//~ $type = 'campeonato';
		//~ $tournament = 'liga';
		//~ $data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		//~ $actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		//~ 
		//~ $data['category_name'] = $actual_tournament_category; 
//~ 
		//~ $arr = array();
		//~ foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
				//~ $arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id);
		//~ endforeach;
		//~ $data['pos_grupos'] = $arr;
//~ 
		//~ $data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato " . $data['category_name'];
		//~ $data['main_content'] = 'home/posiciones/ver_campeonato';
		//~ $this->load->view('home/temp/template', $data);
	//~ }
	
}
