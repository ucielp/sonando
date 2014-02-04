<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Horarios</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
   
		<a href="<?php echo site_url('auth/set_horario');?>"><u>Go Back</u></a>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>