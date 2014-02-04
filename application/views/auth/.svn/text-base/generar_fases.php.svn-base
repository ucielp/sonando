<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Generar Torneo</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/generar_fases_ok");?>
    
     <p>Eligir categoría para generar el torneo<br/>
     <?php echo form_dropdown('dropdown_category', $categories);?>
     </p>
   
     <p><?php echo form_submit('submit', 'Generar Torneo de Fase');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>