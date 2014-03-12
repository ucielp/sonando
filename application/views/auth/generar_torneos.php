<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Generar Torneo</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/generar_torneos_ok");?>
    
     <p>Eligir evento para generar el torneo <?php echo (anchor("auth/create_modify_category_new/", '(ID de la categoría)'));?><br/>
     
     <?php echo form_dropdown('dropdown_category', $categories);?>
     </p>
	     <p>Ida y vuelta?  
     <?php echo form_checkbox('idayvuelta', '1', FALSE);?>
     </p>
     <p><?php echo form_submit('submit', 'Generar Torneo todos contra todos');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>
