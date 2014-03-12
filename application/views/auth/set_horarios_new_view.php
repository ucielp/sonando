<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Definir horarios</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/set_horarios_go");?>
    
     <p>Eligir torneo para cargar los horarios<br/>
     <?php echo form_dropdown('dropdown_category', $events);?>
     </p>
     
      <p>Eligir la fecha para cargar los horarios<br/>
     <?php echo form_dropdown('dropdown_fechas', $fechas);?>
     </p>
   
     <p><?php echo form_submit('submit', 'Ver partidos');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

     
    <?php echo form_close();?>

</div>

</body>
</html>
