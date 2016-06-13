<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Generar torneo o volver y cambiar</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/generar_torneos_go");?>
    
     <p><?php echo form_submit('submit', 'Generar Torneo');?></p>

	 <p><a href="<?php echo site_url('auth/generar_postfase');?>"><u>Hacer algun otro cambio</u></a></p>

     
    <?php echo form_close();?>

</div>

</body>
</html>