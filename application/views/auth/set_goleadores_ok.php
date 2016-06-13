<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Goleadores cargados</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	 <p><a href="<?php echo site_url('auth/set_results_new');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>
