<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Eliminar equipo</h1>
	
	<div id="infoMessage"><?php echo "Se va a eliminar el equipo ". $team_name ." con el identidicador " . $team_id .", y se va a eliminar toda la información de este equipo, incluso la de partidos y posiciones. Estas seguro?";?></div>
        <?php echo form_open("auth/delete_team_go/$team_id");?>

	      <p><?php echo form_submit('submit', 'Estoy re seguro');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>


</body>
</html>
