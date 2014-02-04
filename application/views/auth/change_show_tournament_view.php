<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1><?php  echo $title ?></h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/set_tournament_go/$torneo_actual");?>
    
         <p>
     <?php 
	if ($torneo_actual == 0){
		echo "Se estra mostrando fixture y posiciones para torneo de fases";
			
		}
		elseif ($torneo_actual == 1)  {
			echo "Se estra mostrando fixture y posiciones para torneo de copas";
		}	
   	?>
     </p>
     
     <p><?php echo form_submit('submit', 'Cambiar tipo de torneo para mostrar');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>