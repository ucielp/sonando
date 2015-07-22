<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reglamento extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
	}
	
	public function index()
	{
		$this->data['title'] = "Soñando con el Gol - Relamento";
		
		$this->data['group_reglamento'] = $this->admin_model_new->get_reglamentos_by_group();
				
		$this->data['main_content'] = 'home/vistas/reglamento';
		$this->load->view('home/temp/template', $this->data);
		
		
		
	}
	
}
