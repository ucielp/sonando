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

	function show($event_id,$fecha=NULL)
	{
	
	# Tomo las fechas por evento
	$fechas_por_evento = $this->fixture_model_new->get_fechas_por_evento($event_id);
	
	$count_fechas = count($fechas_por_evento);

	# Toma la fecha actual para mostrar
	if ($fecha){
		$current_fecha = $fecha;
	}	
	else{
		$current_fecha = $this->fixture_model_new->get_fecha_defecto($event_id);
	}
	
	$data['current_fecha'] = $current_fecha;
	
	foreach($fechas_por_evento as $fecha):
		$fecha = $fecha->nro_fecha_id;
		$data['fixtures'][$fecha] =  $this->fixture_model_new->get_partidos($event_id,$fecha);
	endforeach;
	

	
	$data['fixture_actual'] = $this->fixture_model_new->get_partidos($event_id,$current_fecha);
	$data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
	$data['event_id'] = $event_id;
	$url_link = 'fixture/show/';
	
	$data['title'] = "So&ntilde;ando con el Gol";
	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	
	$this->load->view('home/fixture/table_wrapper_view', $data);
	
	}
}
