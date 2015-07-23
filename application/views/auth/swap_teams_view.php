<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Entra un equipo por otro: <?php echo $category_name?></h1>
	   
    
	<?php echo form_open("auth/swap_teams_new_go/$tournament_id");?>
    
     <p> 
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('team_out', $teams_from_tournament, '0');?>
     </p>
      
       <p>
     <?php $categories[0] = 'Ninguno'; 
	 echo form_dropdown('team_in', $teams_actives, '0');?>
     </p>
     
     <p><?php echo form_submit('submit', 'Entra un equipo por otro');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>
