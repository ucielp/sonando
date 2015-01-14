<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Crear nueva categoría</h1>
	   
	<div id="infoMessage"><?php echo $message;?></div>
    
	<?php echo form_open("auth/create_new_category_ok");?>
    
     <p>Nombre de la nueva categoría (o sub cateogoría)<br />
     <?php echo form_input('name_category');?>
     </p>
     
     <p> ID Padre (en caso de ser una subcategoría) - Ver tabla abajo<br />
     
     <?php 
		echo form_input('parent_id',0);
		?>

     </p>
     
       <p> Elija el tipo de torneo<br />
     
     <?php
	 echo form_dropdown('dropdown_tipo_torneo', $tipo_torneo, '0');?>
     </p>
      <p>Mostrar la categoría?<br />
     <?php
		$show = array(
			'name'    => 'mostrar',
			'value'   => '1',
			'checked' =>  TRUE,
		); 	
		echo form_checkbox($show);?>
     </p>
     
     <p><?php echo form_submit('submit', 'Crear nueva categoría');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

	 <?php echo $categories?>

    <?php echo form_close();?>

</div>

</body>
</html>
