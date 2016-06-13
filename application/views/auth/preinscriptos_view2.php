<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>


	
    <?php echo form_open("auth/pre_inscriptos");?>
      <h1>Elegir equipo</h1>

      <p>Equipos:
      <?php echo form_dropdown('team', $team);?>
      </p>

	  <p><?php echo form_submit('submit', 'Inscribir jugadores');?>
   
    <?php echo form_close();?>
</div>

</body>
</html>