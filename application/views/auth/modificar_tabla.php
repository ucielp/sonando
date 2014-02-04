<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Resultados</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/modificar_tabla_go");?>
    
     <p>Eligir torneo para modificar la tabla de posiciones<br/>
     <?php echo form_dropdown('dropdown_category', $tournament);?>
     </p>
   
     <p><?php echo form_submit('submit', 'Modificar tabla');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

     
    <?php echo form_close();?>

</div>

</body>
</html>