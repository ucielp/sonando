<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Equipo Nuevo Creado</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    	<div id="infoMessage"><?php echo "Se creo el equipo " . $team_name . " en el evento " . $category_by_id  ;?></div>

		<p><a href="<?php echo site_url('auth/create_team_new');?>"><u>Go Back</u></a></p>

</div>

</body>
</html>
