<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Crear Nuevo Equipo</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/create_team");?>
    
     <p>Nuevo Equipo<br />
     <?php echo form_input('team');?>
     </p>
     
     <p> Juega en la categoría<br />
     
     <?php $categories[0] = 'Elegir Categoría'; 
	 echo form_dropdown('dropdown_category', $categories, '0');?>
     </p>
      
     <p><?php echo form_submit('submit', 'Crear Equipo');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>