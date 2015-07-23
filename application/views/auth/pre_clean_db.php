<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>CUIDADO!!!! Se van a borrar todos los partidos, tabla de posiciones, estadísticas de jugadores, notas y sanciones</h1>
    
    
	
	<div id="infoMessage"><?php echo $message;?></div>

		<p><a href="<?php echo site_url('auth/clean_db'); ?>">Borrar datos a mitad de año</a></p>
       	<p><a href="<?php echo site_url('auth/clean_db_total'); ?>">Borrar datos a fin de año (+ seteo los certificados, electros y deslinde en 0)</a></p>
    <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

</div>

</body>
</html>
