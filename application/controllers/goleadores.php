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
	
	function index()
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Goleadores";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['categories'] = $this->admin_model->get_categories(); //para el combo box
		$this->data['main_content'] = 'home/vistas/goleadores_select_category_view';
		$this->load->view('home/temp/template', $this->data);
	}

	function ver_goleadores()
	{
		$this->data['title'] = "So&ntilde;ando con el gol - Goleadores";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$category_id = $this->input->post('dropdown_category');
		$this->data['goleadores'] = $this->admin_model->get_goleadores($category_id);
/*		$this->data['players_infos'] = $this->admin_model->get_all_players($team_id);
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
*/		$this->data['main_content'] = 'home/vistas/goleadores_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
}