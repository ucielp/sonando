<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Goleadores extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index($event_id=26)
	{
		//~ $this->data['title'] = "So&ntilde;ando con el gol - Goleadores";
		//~ $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//~ $this->data['events'] = $this->admin_model_new->get_events_combo_box_2(); //para el combo box
		//~ $this->data['main_content'] = 'home/vistas/goleadores_select_category_view';
		//~ $this->load->view('home/temp/template', $this->data);
	//~ }
//~ 
	//~ function show()
	//~ {
        
        
		$this->data['title'] = "So&ntilde;ando con el gol - Goleadores";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		//~ $this->data['events'] = $this->admin_model_new->get_events_combo_box_2(); //para el combo box
        $this->data['event_name'] = $this->fixture_model_new->get_category_and_subcategory($event_id); //para imprimir el nombre por pantalla
        
        $url_link = 'goleadores/index/';
        $this->data['categoryTree'] = $this->fixture_model_new->parse_tree($url_link); # Category Tree

        
		$this->data['goleadores'] = $this->admin_model_new->get_goleadores_new($event_id);
		$this->data['main_content'] = 'home/vistas/goleadores_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
}
