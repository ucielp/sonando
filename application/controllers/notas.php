<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
	}
	
	public function index($offset = 0)
	{
		$this->data['title'] = "Soñando con el Gol - Notas";
				
		//Declaramos offset y limit para la paginación
		$limit = 10;
		$total_rows = $this->notas_model->num_notas();
		$this->load->library('pagination');
		$config = array(
				'base_url'		=> base_url().'notas/index/',
				'total_rows'	=> $total_rows,
				'per_page'		=> $limit,
				'full_tag_open'	=> '<div id="paginacion">',
				'full_tag_close' => '</div><div class="clear"></div>',
				'first_link'	=>	'Inicio',
				'last_link'		=>	'Fin',
				'cur_tag_open'	=>	'<strong>',
				'cur_tag_close'	=>	'</strong>'
			);
		$this->pagination->initialize($config);
		
		$this->data['notas'] = $this->notas_model->get_notas($limit, $offset);
				
		$this->data['main_content'] = 'home/vistas/notas';
		$this->load->view('home/temp/template', $this->data);
		
	}
	}