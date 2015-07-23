<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UnionyValores extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
	}
	
	public function index()
	{
		$this->data['title'] = "So&ntilde;ando con el Gol - Union y Valores";

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['message'] = validation_errors();
		$this->data['main_content'] = 'home/vistas/union_y_valores';
		$this->load->view('home/temp/template', $this->data);
			
	}

}