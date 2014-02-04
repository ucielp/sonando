<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Definir horarios</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/partidos_por_horario_go");?>
    
      <p>Eligir la fecha para ver la cantidad de partidos por horario<br/>
     <?php echo form_dropdown('dropdown_fechas', $fechas);?>
     </p>
   
     <p><?php echo form_submit('submit', 'Ver partidos');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

     
    <?php echo form_close();?>

</div>

</body>
</html>