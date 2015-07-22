<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Eliminar equipo</h1>
	
	<div id="infoMessage"><?php echo "Se eliminó el equipo ". $team_name ." con el identidicador " . $team_id;?></div>


	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>


</body>
</html>
