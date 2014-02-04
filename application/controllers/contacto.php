<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
		$this->data['title'] = "So&ntilde;ando con el Gol - Contacto";
		$this->data['asuntos']	= $this->contacto_model->get_asuntos(); //para el combo box
		$this->form_validation->set_rules('lastname', 'Nombre', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('tel', 'Teléfono', 'required');
		$this->form_validation->set_rules('asunto', 'Asunto', 'required');
		//$this->form_validation->set_rules('comments', 'Mensaje', 'required');
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
			if ($this->form_validation->run() == true)
			{
					if ( $this->input->post('asunto') == 'nulo')
					{
						$this->data['message'] = 'Debe elegir un asunto';
						$this->data['main_content'] = 'home/vistas/contacto';
						$this->load->view('home/temp/template', $this->data);
					}
					else{
						$nombre = $this->input->post('lastname');
						$email = $this->input->post('email');
						$tel = $this->input->post('tel');
						$comments = 'Teléfono: ' . nl2br($tel . "\n"). $this->input->post('comments');
						$to = $this->input->post('asunto');
						$subject = 'Web - '. $this->contacto_model->get_asunto_from_email($to);
						
						$this->load->library('email');
						
						$this->email->from($email, $nombre);
						$this->email->to($to);
						$this->email->subject($subject);
						$this->email->message($comments);
						$this->email->send();
						$this->data['title'] = "Soñando con el Gol - Mensaje enviado";
						$this->data['main_content'] = 'home/vistas/contacto_envio_ok';
						$this->load->view('home/temp/template', $this->data);
					}
			}else
			{
				$this->data['message'] = validation_errors();
				$this->data['main_content'] = 'home/vistas/contacto';
				$this->load->view('home/temp/template', $this->data);
			}		
	}

}