<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Crear Nueva Categoría</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>
    <div id="infoMessage"><?php echo $mensaje; #solo se ve si saco el refresh del controlador?></div>
   
	
    <?php echo form_open("auth/create_category");?>
    
     <p>Categorías ya creadas<br/>
     
     <?php if ( $categories){
		 echo form_dropdown('dropdown_category', $categories);
		 } 
	 ?>
     </p>
    
     <p>Nueva Categoría (Ej: A o D1)<br />
     <?php echo form_input('category');?>
     </p>
      
     <p><?php echo form_submit('submit', 'Crear Categoría');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>