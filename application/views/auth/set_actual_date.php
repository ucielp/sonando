<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Fecha Actual</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/set_actual_date_go");?>
    
      
      
     <?php if ($fechas){ ?>
	 <p>Eligir fecha ACTUAL <br/>
	 <?php echo form_dropdown('dropdown_fechas', $fechas)?>
	 
	 <?php  if (!$dia){
		 	$dia = "dd-mm";
			}
	 echo form_input('dia',$dia);?>
     </p>
   
      <p><?php echo form_submit('submit', 'Setear actual');?></p>
	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

	 <?php }
	 else { echo "No hay fechas cargadas. Debes generar los partidos de fase</br>";}?>
	
     
    <?php echo form_close();?>

</div>

</body>
</html>