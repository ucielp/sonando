<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Intercambiar equipos en la etapa de fase</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/change_name_teams_go");?>
    
     <p>Cambiar nombre del equipo<br />     
     <?php 
	 echo form_dropdown('dropdown_team', $equipos, '0');?>
     </p>
      
       <p>Nuevo nombre (tambien cambia el usuario al cambiar el nombre)<br />
     <?php echo form_input('new_team');?>
     </p>
     
     <p><?php echo form_submit('submit', 'Cambiar nombre del equipo');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>