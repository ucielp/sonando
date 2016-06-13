<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Partidos cargados</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
   
		<a href="<?php echo site_url('auth/set_results_elim');?>"><u>Go Back</u></a>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>