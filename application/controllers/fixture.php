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
	
    # TODO arreglar este HACK que puse el event_id por defecto
	function index($event_id=26,$fecha=NULL)
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
			$event_id = $default_category;
		}
		
		
		//~ Aca me podria fijar dependiendo del torneo que se juega la cantidad de fechas
		$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
		
		$data['fecha_nro'] = $current_fecha;
		$this->load->library('pagination_torneo');
		
		$config = array(
				'base_url'		=> base_url().'fixture/show/' . $event_id ,
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
		$data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla

		$url_link = 'fixture/show/';
		$data['categoryTree'] = $this->fixture_model_new->parse_category_tree($url_link); # Category Tree
		
		$data['title'] = "So&ntilde;ando con el Gol";
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$data['main_content'] = 'home/vistas/fixture';
		$this->load->view('home/temp/template', $data);
	}

	function show ($event_id=26,$fecha=NULL)
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
		$event_id = $default_category;
	}
	
	
	//~ Aca me podria fijar dependiendo del torneo que se juega la cantidad de fechas
	$total_rows = $this->fixture_model->get_nros_fecha($fase) + 1;
	
	$data['fecha_nro'] = $current_fecha;
	$this->load->library('pagination_torneo');
	
	$config = array(
			'base_url'		=> base_url().'fixture/show/' . $event_id ,
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
	$data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla

	$url_link = 'fixture/show/';
	
	$data['title'] = "So&ntilde;ando con el Gol";
	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	
	$this->load->view('home/fixture/table_wrapper_view', $data);
}
 	
	
	
}
