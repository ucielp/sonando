<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

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
		$this->data['title'] = "So&ntilde;ando con el gol - Home";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->load->view('home/vistas/landing_view', $this->data);
	}
}