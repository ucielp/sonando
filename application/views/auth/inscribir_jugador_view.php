<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>

    
    <div class="preinscripcion_contenedor">	
        <div id="menu_preinscripcion">

    
        <?php echo form_open_multipart("auth/inscribir_jugador/" . $team_id);?>
          <h1>Por favor, ingrese los datos de los jugadores a continuación<br /></h1>
          
          <p>Nombre<br />
          <?php echo form_input($name);?>
          </p>
          
          <p>Apellidssso<br />
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
	
    
        <?php echo form_close();?>
    
    </div>
	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->

</body>
</html>
