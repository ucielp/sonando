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
		//validate form input
		#$this->form_validation->set_rules('email', 'Usuario', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');

		if ($this->form_validation->run() == true)
		{ //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{ //if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect($this->config->item('base_url'), 'refresh'); asi estaba antes
				$group_name = 'inscriptions';
				if ($this->ion_auth->is_group($group_name)){ //if the login is successful for an user that it's not an admin user
					
					redirect('inscripcion/preinscribir', 'refresh');
				} else{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('inscripcion', 'refresh');
				}
			}
		
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('inscripcion', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			
			// PARA EL SLIDER DE MARCAS HAGO ESTO
			#si subo esto no tiene que estar
			$this->data['marcas'] = $this->home_model->get_marcas();
			$this->data['main_content'] = 'home/vistas/inscripcion_view';
			$this->load->view('home/temp/template', $this->data);
		}
	}
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them back to the page they came from
		redirect('inscripcion', 'refresh');
	}
	function preinscribir()
	{
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		$url_imagen = '';
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		
		#devuelve 0 si no hay jugadores ingresados
		$this->data['jugador_ingresado'] = $this->admin_model->hay_jugadores($team_id,'0');
		$opcion = $this->input->post('submit');

		$this->data['title'] = 'Inscripción';
		//validate form input
		$this->form_validation->set_rules('name', 'Nombre', 'required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Apellido', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('birth', 'Fecha de Nacimiento', 'required|xss_clean');
		$this->form_validation->set_rules('phone', 'Telefono', 'required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('dni', 'Documento', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Domicilio', 'required|xss_clean');
		/*$this->form_validation->set_rules('obra_social', 'Obra Social', 'required|xss_clean');*/


		if ($this->form_validation->run() == true)
		{
			############## Para subir la foto del jugador ##################
						
			$config['upload_path'] = './uploads/jugadores/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
			$config['max_size']	= '0';
			$config['overwrite']	= FALSE;
			$config['encrypt_name']	= TRUE;
		
		
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$this->data['message'] = array('error' => $this->upload->display_errors());			
			}
			else
			{
				###### ACA VA TODO LO REFERIDO AL EXITO
				$data_img = $this->upload->data();
				$this->upload->data();
				$this->data['data_img'] = $data_img;
				
				if($data_img['image_width'] > 600 || $data_img['image_height'] > 364){
						   $config['image_library'] = 'gd2';
						   $config['source_image'] = $data_img['full_path'];
						   $config['maintain_ratio'] = TRUE;
						   $config['width'] = 600;
						   $config['height'] = 364;
	
						   $this->load->library('image_lib', $config);
						   
						   if( ! $this->image_lib->resize()){
								   #$error = array('error' => $this->image_lib->display_errors());
								   $this->data['message'] = array('error' => $this->image_lib->display_errors());
						   }else{
								  #exito
						   }
				   
				   }else{
						   #exito
				   }
				
				$url_imagen =  $data_img['file_name'];
			}
			
			#$this->data['url_img'] = $url_imagen;	
			#'foto'		=> $url_imagen,

			$this->load->library('upload', $config);

			
			################################################################
			$user_logged = $this->ion_auth->get_user();
			$team_id = $user_logged->team_id;
			$additional_data = array('name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'birth' => $this->input->post('birth'),
				'phone' => $this->input->post('phone'),
				'dni' => $this->input->post('dni'),
				'address' => $this->input->post('address'),
				'obra_social' => $this->input->post('obra_social'),
				'team_id' => $team_id,
				'foto' => $url_imagen,
			);

			$this->admin_model->subir_jugador($additional_data);
			redirect('inscripcion/preinscribir', 'refresh');
		}
		else{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = validation_errors();

			$this->data['name'] = array('name' => 'name',
				'id' => 'name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('name'),
			);
			$this->data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			
			$this->data['dni'] = array('name' => 'dni',
				'id' => 'dni',
				'type' => 'text',
				'value' => $this->form_validation->set_value('dni'),
			);
			
			$this->data['birth'] = array('name' => 'birth',
				'id' => 'birth',
				'type' => 'text',
				'value' => $this->form_validation->set_value('birth'),
			);
			
			$this->data['phone'] = array('name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			
			$this->data['address'] = array('name' => 'address',
				'id' => 'address',
				'type' => 'text',
				'value' => $this->form_validation->set_value('address'),
			);
			
			$this->data['obra_social'] = array('name' => 'obra_social',
				'id' => 'obra_social',
				'type' => 'text',
				'value' => $this->form_validation->set_value('obra_social'),
			);

			$this->data['main_content'] = 'home/preinscripcion/preinscripcion';
			$this->load->view('home/temp/template', $this->data);
		}
	}
		
	function asignar_responsables()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
	
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);

		$this->data['title'] = 'Asignar responsables';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['jugadores'] = $this->admin_model->get_players_combo($team_id,'0'); //para el combo box
		$this->data['main_content'] = 'home/preinscripcion/create_captain_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function jugadores_preinscriptos()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		$this->data['title'] = 'Preinscripción';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		
		$this->data['players'] = $this->admin_model->get_players($team_id,'0');
		$this->data['main_content'] = 'home/preinscripcion/show_preinscriptos_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function jugadores_habilitados()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		
		$this->data['title'] = 'Habilitados';
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		$this->data['players'] = $this->admin_model->get_players($team_id,'1');
		$this->data['main_content'] = 'home/preinscripcion/show_inscriptos_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function upload_foto_equipo()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;

		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		$this->data['title'] = 'Subir Foto';
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['equipo_info'] = $this->admin_model->get_equipo_info($team_id);
		$this->data['main_content'] = 'home/preinscripcion/carga_foto_equipo_view';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function do_upload_foto_equipo(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		$this->data['title'] = "So&ntilde;ando con el gol";
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
		$config['max_size']	= '0';
		$config['overwrite']	= FALSE;
		$config['encrypt_name']	= TRUE;

		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$this->data['message'] = array('error' => $this->upload->display_errors());			
			if ($this->input->post('text')){
				$datos = array(
							'titular_color1'		=> strip_tags($this->input->post('color1')),
							'titular_color2'		=> strip_tags($this->input->post('color2')),
							'alternativa_color1'		=> strip_tags($this->input->post('color3')),
							'alternativa_color2'		=> strip_tags($this->input->post('color4')),
							'historia'		=> $this->input->post('text'),
						);
			}
			else{
					$datos = array(
							'titular_color1'		=> strip_tags($this->input->post('color1')),
							'titular_color2'		=> strip_tags($this->input->post('color2')),
							'alternativa_color1'		=> strip_tags($this->input->post('color3')),
							'alternativa_color2'		=> strip_tags($this->input->post('color4')),
						);
			}	
					
			$this->admin_model->subir_foto($datos, $team_id);
			
			$this->data['main_content'] = 'home/preinscripcion/carga_foto_equipo_nofoto_view';
			$this->load->view('home/temp/template', $this->data);
		}
		else
		{
			$data_img = $this->upload->data();
			$this->upload->data();
			
			$this->data['data_img'] = $data_img;
			
			if($data_img['image_width'] > 600 || $data_img['image_height'] > 364){
					   $config['image_library'] = 'gd2';
					   $config['source_image'] = $data_img['full_path'];
					   $config['maintain_ratio'] = TRUE;
					   $config['width'] = 600;
					   $config['height'] = 364;

					   $this->load->library('image_lib', $config);
					   
					   if( ! $this->image_lib->resize()){
							   #$error = array('error' => $this->image_lib->display_errors());
							   $this->data['message'] = array('error' => $this->image_lib->display_errors());
					   }else{
							  #exito
					   }
			   
			   }else{
					   #exito
			   }
			
			$url_imagen =  $data_img['file_name'];
			if ($this->input->post('text')){
				$datos = array(
							'titular_color1'		=> strip_tags($this->input->post('color1')),
							'titular_color2'		=> strip_tags($this->input->post('color2')),
							'alternativa_color1'		=> strip_tags($this->input->post('color3')),
							'alternativa_color2'		=> strip_tags($this->input->post('color4')),
							'historia'		=> $this->input->post('text'),
							'foto'		=> $url_imagen,
						);
			}
			else{
					$datos = array(
							'titular_color1'		=> strip_tags($this->input->post('color1')),
							'titular_color2'		=> strip_tags($this->input->post('color2')),
							'alternativa_color1'		=> strip_tags($this->input->post('color3')),
							'alternativa_color2'		=> strip_tags($this->input->post('color4')),
							'foto'		=> $url_imagen,
						);
			}	
			$this->data['url_img'] = $url_imagen;	
			$this->admin_model->subir_foto($datos, $team_id);
			$this->data['main_content'] = 'home/preinscripcion/upload_foto_equipo_ok';
			$this->load->view('home/temp/template', $this->data);
		}
	}
	
	function cargar_responsable()
	{	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
	
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$capitan =   $this->input->post('capitan');
		$delegado =   $this->input->post('delegado');
		$sub_delegado =   $this->input->post('sub_delegado');
		
		$responsables_ids = array(
               'capitan_id' => $capitan,
               'delegado_id' => $delegado,
               'sub_delegado_id' => $sub_delegado
            );
			
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);

		$this->data['title'] = 'Asignar responsables';
		$this->admin_model->update_responsables($team_id,$responsables_ids);
		$this->data['main_content'] = 'home/preinscripcion/carga_jugador_success';
		$this->load->view('home/temp/template', $this->data);
	}
	
	function delete_player_temp($id_player_temp)
	{ 
	
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('inscriptions'))
		{
			redirect('inscripcion', 'refresh');
		}
		$user_logged = $this->ion_auth->get_user();
		$team_id = $user_logged->team_id;
		$this->data['team_name'] = $this->admin_model->get_team_name($team_id);
		
		
		$this->admin_model->delete_player_temp($id_player_temp);
		$this->data['message'] = "El jugador ha sido eliminado";
		$this->data['main_content'] = 'home/preinscripcion/player_temp_delete_ok';
		$this->load->view('home/temp/template', $this->data);
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */