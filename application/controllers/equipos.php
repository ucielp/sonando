<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index()
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Equipos";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['categories'] = $this->fixture_model_new->get_all_events();
		$categories = $this->data['categories']; 
		foreach ($categories as $category):
			$this->data['equipos'][$category->id] = $this->equipos_model->get_all_teams($category->id);
		endforeach;
		$this->data['main_content'] = 'home/vistas/equipos_all_view';
		$this->load->view('home/temp/template', $this->data);
	}
	function elegir_equipo()
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Equipos";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$category_id = $this->input->post('dropdown_category');
		$this->data['teams'] = $this->admin_model->get_teams_combo($category_id); //para el combo box
		$this->data['main_content'] = 'home/vistas/equipos_select_team_view';
		$this->load->view('home/temp/template', $this->data);
	}
	function ver_equipo()
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Equipos";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$team_id = $this->input->post('dropdown_team');
		$this->data['equipo_infos'] = $this->admin_model->get_equipo_info($team_id);
		$this->data['players_infos'] = $this->admin_model->get_all_players($team_id);
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		$this->data['team_category'] = $this->admin_model->get_team_category($team_id);
		$this->data['main_content'] = 'home/vistas/equipo_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function equipo($team_id)
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Equipos";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['equipo_infos'] = $this->admin_model->get_equipo_info($team_id);
		$this->data['players_infos'] = $this->admin_model->get_all_players($team_id);
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		$this->data['team_category'] = $this->admin_model->get_team_category($team_id);
		$this->data['main_content'] = 'home/vistas/equipo_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
}
