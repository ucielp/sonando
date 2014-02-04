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
	
	public function index() //ver que hacer aca, si disparar alguna otra cosa al llamar al index, alguna predeterminada puede ser
	{
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones";
		
		$mostrar_torneo = $this->data['categories'] = $this->admin_model->get_show_tournament();
		if ($mostrar_torneo == 0){
			$data['categories'] = $this->equipos_model->get_all_categories();
			#Esta es la nueva para el Apertura y para la copa de verano???
			$data['main_content'] = 'home/posiciones/posiciones_apertura_view';
		}
		elseif ($mostrar_torneo == 1)  {
			#Esta es la de antes cuando habia varios torneos
			$data['main_content'] = 'home/posiciones/posiciones_view';
		}	
		else{
		}
		
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('home/temp/template', $data);
		
	}
	/*****************FASE************************/
	public function fase(){
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase";
		$type = 'fase';
		$data['main_content'] = 'home/posiciones/fase';
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$this->load->view('home/temp/template', $data);
	}
	
	public function ver_fase(){
		$type = 'fase';
		$tournament = 'liga';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		$actual_fase1_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del torneo
		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		$data['posiciones'] = $this->posiciones_model->get_positions_fase1($actual_fase1_id); //genero la tabla de posiciones

		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		$data['main_content'] = 'home/posiciones/ver_fase';
		$this->load->view('home/temp/template', $data);
	}

	#Esta la agregue y la cambie por ver_fase que sigue funcionando igualmente
	public function ver_fase_apertura($category_id){
		
		$type = 'fase';
		$tournament = 'liga';
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $category_id;

		$actual_fase1_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);//obtengo el id del torneo
		$data['category_name'] = $actual_tournament_category; //para imprimir el nombre por pantalla
		$data['posiciones'] = $this->posiciones_model->get_positions_fase1($actual_fase1_id); //genero la tabla de posiciones

		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Fase " . $data['category_name'];
		$data['main_content'] = 'home/posiciones/ver_fase';
		$this->load->view('home/temp/template', $data);
	}
	
	/*****************ZONA DESCENSO************************/
	/*****************ES IGUAL A FASE PERO SE LE PASAN DISTINTAS VARIABLES************************/
	
	public function descenso(){
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Descenso";
		$type = 'descenso';
		$data['categories'] = $this->posiciones_model->get_categories($type);
		$data['main_content'] = 'home/posiciones/descenso';
		$this->load->view('home/temp/template', $data);
	}
	public function ver_descenso(){
		#igual que ver_fase pero cambio fase por descenso
		$type = 'descenso';
		$tournament = 'liga';
		
		
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		$actual_fase2_id = $this->posiciones_model->get_id_by_category($type, $actual_tournament_category, $tournament);
		$data['category_name'] = $actual_tournament_category; 
		$data['posiciones'] = $this->posiciones_model->get_positions_fase2($actual_fase2_id);

		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Descenso " . $data['category_name'];
		$data['main_content'] = 'home/posiciones/ver_descenso';
		$this->load->view('home/temp/template', $data);

	}
	
	/*****************COPA DE CAMPEONES************************/
	/*****************Fase de GRUPO************************/
	
	public function campeones(){
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Copa de Campeones";
		$tournament = 'liga';
		$type = 'campeones';
		$category = 'grupo';
		
		$arr = array();
		foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$category) as $group):
				$arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id); //de aca obtengo el id de los grupos
		endforeach;
		$data['pos_grupos'] = $arr;

		$data['main_content'] = 'home/posiciones/campeones';
		$this->load->view('home/temp/template', $data);
	}
	
	
	/*****************COPA REPECHAJE************************/
	/*****************Fase de GRUPO************************/
	
	public function repechaje(){
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Repechaje";
		
		$tournament = 'liga';
		$type = 'repechaje';
		$data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
			
			
		$data['main_content'] = 'home/posiciones/repechaje_view';
		$this->load->view('home/temp/template', $data);		
	}
	
	public function ver_repechaje(){
		$tournament = 'liga';
		$type = 'repechaje';
		
		$data['categories'] = $this->posiciones_model->get_categories_by_type_tournament($type,$tournament); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		
		$data['category_name'] = $actual_tournament_category; 

		$arr = array();
		foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
				$arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id);
		endforeach;
		$data['pos_grupos'] = $arr;

		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato " . $data['category_name'];
		$data['main_content'] = 'home/posiciones/ver_repechaje';
		$this->load->view('home/temp/template', $data);
	}
	
	/*****************COPA CAMPEONATO************************/
	/*****************Fase de GRUPO************************/
	/*****************Es como copa de campeones pero se le pasa la category en el combo box como arriba************************/
	
	
	public function campeonato(){
		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato";
		$type = 'campeonato';
		$data['main_content'] = 'home/posiciones/campeonato';
		$data['categories'] = $this->posiciones_model->get_categories($type);
		$this->load->view('home/temp/template', $data);		
	}
	
	public function ver_campeonato(){
		$type = 'campeonato';
		$tournament = 'liga';
		$data['categories'] = $this->posiciones_model->get_categories($type); //para el combo box
		$actual_tournament_category = $this->input->post('dropdown_category'); //cual tengo que mostrar
		
		$data['category_name'] = $actual_tournament_category; 

		$arr = array();
		foreach($this->posiciones_model->get_nro_grupo($tournament,$type,$actual_tournament_category) as $group):
				$arr[$group->id] = $this->posiciones_model->get_positions_fase2($group->id);
		endforeach;
		$data['pos_grupos'] = $arr;

		$data['title'] = "So&ntilde;ando con el Gol - Posiciones Zona Campeonato " . $data['category_name'];
		$data['main_content'] = 'home/posiciones/ver_campeonato';
		$this->load->view('home/temp/template', $data);
	}
	
}
