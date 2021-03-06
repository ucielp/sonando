<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion extends CI_Controller {

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
		$this->data['title'] = "So&ntilde;ando con el gol - Inscripcion";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['main_content'] = 'home/vistas/inscripcion';
		$this->load->view('home/temp/template', $this->data);
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
