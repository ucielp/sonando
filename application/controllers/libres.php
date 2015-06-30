<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Libres extends CI_Controller {

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
		$this->data['title'] = "So&ntilde;ando con el gol - Libres";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['marcas'] = $this->home_model->get_marcas();
		$this->data['main_content'] = 'home/vistas/libres';
		$this->load->view('home/temp/template', $this->data);
	}
}
