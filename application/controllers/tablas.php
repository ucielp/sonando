<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tablas extends CI_Controller {

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
		
		$this->data['title'] = "Tablas";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox

		$this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
        $this->data['posiciones'] = $this->admin_model_new->get_positions($event_id); //genero la tabla de posiciones
		$this->data['goleadores'] = $this->admin_model_new->get_goleadores_new($event_id);
		$this->data['event_id'] = $event_id;

   		$url_link = 'tablas/show/';
        $this->data['categoryTree'] = $this->fixture_model_new->parse_category_tree($url_link); # Category Tree
			
		$this->data['main_content'] = 'home/vistas/tablas';
		$this->load->view('home/temp/template', $this->data);

	}
	
	function show($event_id=26) {
		
		$this->data['title'] = "Posiciones";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['events'] = $this->fixture_model_new->get_events_combo_box(); # combobox

		$this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
        $this->data['posiciones'] = $this->admin_model_new->get_positions($event_id); //genero la tabla de posiciones
		$this->data['goleadores'] = $this->admin_model_new->get_goleadores_new($event_id);
		$this->data['event_id'] = $event_id;

   		$url_link = 'posiciones/show/';
        $this->data['categoryTree'] = $this->fixture_model_new->parse_category_tree($url_link); # Category Tree

		$this->load->view('home/posiciones/table_wrapper_view', $this->data);
		
	}
}
