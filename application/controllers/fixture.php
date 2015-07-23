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
	
	function index()
	{

		$url_link = 'fixture/show/';
		$data['categoryTree'] = $this->fixture_model_new->parse_category_tree($url_link); # Category Tree
		
		$data['title'] = "So&ntilde;ando con el Gol";
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$data['main_content'] = 'home/vistas/fixture';
		$this->load->view('home/temp/template', $data);
	}

	function show($event_id,$fecha_arg=NULL)
	{
	
	# Esto lo hago por si se lo quiero pasar como argumento
	# Por ahora está obsoleto
	if ($fecha_arg){
		$current_fecha = $fecha_arg;
	}	
	else{
		$current_fecha = $this->fixture_model_new->get_fecha_defecto($event_id);
	}
	
	$data['current_fecha'] = $current_fecha;

	
	# Tomo las fechas por evento
	$fechas_por_evento = $this->fixture_model_new->get_fechas_por_evento($event_id);
	
	# El torneo tiene partidos
	if($fechas_por_evento){
		$count_fechas = count($fechas_por_evento);
		
		# Quedan partidos sin cargar
		if ($current_fecha){
			$data['fixture_actual'] = $this->fixture_model_new->get_partidos($event_id,$current_fecha);
		}
		# Los partidos están todos cargados entonces muestro todo el fixture
		else{
			$data['fixture_actual'] = '';
		}
		
		foreach($fechas_por_evento as $fecha):
			$fecha = $fecha->nro_fecha_id;
			$data['fixtures'][$fecha] =  $this->fixture_model_new->get_partidos($event_id,$fecha);
		endforeach;
	}
			
	# El torneo no tiene partidos
	else{
		$data['fixture_actual'] = '';
		$data['fixtures'] = '';
	}


	$data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
	
	$data['title'] = "So&ntilde;ando con el Gol";
	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	
	$this->load->view('home/fixture/table_wrapper_view', $data);
	
	}
}
