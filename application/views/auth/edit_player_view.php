<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Editar Jugador</h1>
	<p>Ingresa la información del jugador que quieras cambiar o no apliques cambios en los campos.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/edit_user_go/".$this->uri->segment(3));?> 
      <p>Nombre:<br />
      <?php echo form_input('nombre',$player->name);?>
      </p>
      
      <p>Apellido:<br />
      <?php echo form_input('apellido',$player->last_name);?>
      </p>
      
	  <p>DNI:<br />
      <?php echo form_input('dni',$player->dni);?>
      </p>
      
      <p>Nacimiento<br />
      <?php echo form_input('nacimiento',$player->birth);?>
      </p>
      
      
      <p>Telefono<br />
      <?php echo form_input('telefono',$player->phone);?>
      </p>
      
      <p>Dirección<br />
      <?php echo form_input('direccion',$player->address);?>
      </p>
      
      <p>email<br />
      <?php echo form_input('email',$player->email);?>
      </p>
      
       <p>Obra Social<br />
      <?php echo form_input('obra_social',$player->obra_social);?>
      </p>


       <p>Goles<br />
      <?php echo form_input('goles',$player->goal);?>
      </p>
    
	 <p>Amarillas<br />
      <?php echo form_input('yellow',$player->yellow);?>
      </p>
    
	<p>Rojas<br />
      <?php echo form_input('red',$player->red);?>
      </p>
    
      
	  <?php echo form_hidden('id',$this->uri->segment(3)); ?>
 	  <?php echo form_submit('submit', 'Actualizar');?>

      
    <?php echo form_close();?>
	
    <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>


</div>

</body>
</html>