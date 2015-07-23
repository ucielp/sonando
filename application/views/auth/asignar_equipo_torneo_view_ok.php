<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1><?php echo $titulo_mensage;?></h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	 <p><a href="<?php echo site_url('auth/mostrar_equipos_de_torneo') . "/" . $category_id;?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>

