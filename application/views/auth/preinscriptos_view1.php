<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>


	
    <?php echo form_open("auth/mostrar_equipos");?>
      <h1>Elegir categoria</h1>

      <p>Categoría:
      <?php echo form_dropdown('categories', $categories);?>
      </p>

	  <p><?php echo form_submit('submit', 'Ver equipos');?>

     
    <?php echo form_close();?>
</div>

</body>
</html>