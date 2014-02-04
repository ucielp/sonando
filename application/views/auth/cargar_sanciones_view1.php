<?php $this->load->view('auth/header'); ?>

    <div class='mainInfo'>
        <div id="header_cargar">
            <h1 id="tituloPrincipalCargar" class="indented">Elegir equipo</h1>
        </div>
        <?php echo form_open("auth/cargar_sanciones_detalles");?>
    
     <p>Eligir equipo del del jugador a sancionar<br/>
     (estan ordenados por categoría original y luego por orden alfabético<br/><br/>
     <?php echo form_dropdown('dropdown_equipos', $equipos);?>
     </p>
   
     <p><?php echo form_submit('submit', 'Elegir jugador');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

  	</div>


</body>
</html>