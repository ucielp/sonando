<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Crear nuevo evento</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/create_new_event_ok");?>
    
     <p>Nombre del nuevo evento<br />
     <?php echo form_input('name_event');?>
     </p>
     
     <p> Categoría a la que pertenece (tiene que ser una ultima subcategoria)<br />
     
     <?php $categories[0] = 'Elija la categoría'; 
	 echo form_dropdown('dropdown_category_id', $categories, '0');?>
     </p>
      
     
     
     <p><?php echo form_submit('submit', 'Crear nuevo evento');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>
