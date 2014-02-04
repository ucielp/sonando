	<div class="header_page">
            <h1>PreInscripción</h1>
            <h2><?php echo $team_name;?></h2>
	</div>
	
    <div id="infoMessage"><?php echo $message;?></div>
    
    <div class="preinscripcion_contenedor">	
        <div id="menu_preinscripcion">
            <p>
				<?php if ($jugador_ingresado  > 0){?>
                <a href="<?php echo site_url('inscripcion/asignar_responsables'); ?>">Asignar responsables</a>
				<?php } ?>
                <a href="<?php echo site_url('inscripcion/jugadores_preinscriptos'); ?>">Jugadores preinscriptos</a>
                <a href="<?php echo site_url('inscripcion/jugadores_habilitados'); ?>">Jugadores inscriptos</a>
                <a href="<?php echo site_url('inscripcion/upload_foto_equipo'); ?>">Info del equipo</a>
            </p>
    
        <?php echo form_open_multipart("inscripcion/preinscribir");?>
          <h1>Por favor, ingrese los datos de los jugadores a continuación<br /></h1>
          
          <p>Nombre<br />
          <?php echo form_input($name);?>
          </p>
          
          <p>Apellido<br />
          <?php echo form_input($last_name);?>
          </p>
          
          <p>Documento<br />
          <?php echo form_input($dni);?>
          </p>
          
          <p >Fecha de Nacimiento<br />
          <?php echo form_input($birth);?>(dd/mm/aa)
          </p>
    
          <p>Teléfono<br />
          <?php echo form_input($phone);?>(ej: 341 155111111)
          </p>
    
          <p>Email<br />
          <?php echo form_input($email);?>(correo@example.com)
          </p>
    
          <p>Domicilio<br />
          <?php echo form_input($address);?>
          </p>
          
          <p>Obra Social<br />
          <?php echo form_input($obra_social);?>
          </p>
          
          <label for="text">Foto Carnet: (opcional)
          <br /><br />
			<input type="file" name="userfile" size="20" /><br /><br /><br />
            
          <p><?php echo form_submit('submit', 'Ingresar jugador');?></p>
	
          <p><a href="<?php echo site_url('inscripcion/logout');?>">Cerrar Sesión</a></p>
    
        <?php echo form_close();?>
    
    </div>
	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->