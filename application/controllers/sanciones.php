<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanciones extends CI_Controller {

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
		$this->data['title'] = "Soñando con el Gol - Sanciones";
		
		$this->data['sanciones'] = $this->sanciones_model->get_sanciones();
		
        $this->data['titulo'] = "Ver las sanciones";
        $this->data['link'] = "https://docs.google.com/spreadsheet/ccc?key=0AuIBKvFOyc--dEpBZm80aXVfeTl3WFdKaTd2bHgyamc&usp=sharing#gid=0";
        
		$this->data['main_content'] = 'home/vistas/sanciones_view';
		$this->load->view('home/temp/template', $this->data);
		
	}
	}
