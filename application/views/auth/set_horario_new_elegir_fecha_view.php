<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Horarios</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/set_horario_new_go/$tournament_id");?>     
     <div class="header_page">
                  <p>Eligir la fecha para cargar los horarios<br/>
     <?php echo form_dropdown('dropdown_fechas', $fechas);?>
     </p>
		<?php echo form_submit('submit', 'Cargar horarios');?><br><br>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>
