<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Crear partido para el torneo:      <?php echo $tournament;?></h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/create_match_new_go/$tournament_id");?>
    
     <p>Equipo1<br />     
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('dropdown_team1', $equipos, '0');?>
     </p>
      
       <p>Equipo2<br />     
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('dropdown_team2', $equipos, '0');?>
     </p>
     
      <p>Eligir la fecha para cargar los resultados<br/>
     <?php echo form_dropdown('dropdown_fechas', $fechas);?>
     </p>
     <p><?php echo form_submit('submit', 'Crear partido');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>
