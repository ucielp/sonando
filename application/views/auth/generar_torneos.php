<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Generar Torneo</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/generar_torneos_ok");?>
	<div class="catmenu"><?php echo $categoryTree ?></div>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

</div>

</body>
</html>
