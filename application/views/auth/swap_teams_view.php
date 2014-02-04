<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Intercambiar equipos en la etapa de fase</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/swap_teams_go");?>
    
     <p>Equipo1 a intercambiar<br />     
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('dropdown_team1', $equipos, '0');?>
     </p>
      
       <p>Equipo2 a intercambiar<br />     
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('dropdown_team2', $equipos, '0');?>
     </p>
     
     <p><?php echo form_submit('submit', 'Intercambiar equipos');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>