	<div class="header_page">
            <h1>Responsables</h1>
            <h2><?php echo $team_name;?></h2>
    </div>

    <div class="preinscripcion_contenedor">
   		<div id="infoMessage"><?php echo $message;?></div>
	
		<?php echo form_open("libres/cargar_responsable");?>

          <p>Capitán:
          <?php echo form_dropdown('capitan', $jugadores);?>
          </p>
          
          <p>Delegado:
          <?php echo form_dropdown('delegado', $jugadores);?>
          </p>
          
          <p>Sub Delegado:
          <?php echo form_dropdown('sub_delegado', $jugadores);?>
          </p>
          
         
          
          
          <p><?php echo form_submit('submit', 'Cargar responsable');?>
    
         <p><a href="<?php echo site_url('libres/preinscribir');?>">Volver</a></p>
        <?php echo form_close();?>
	</div>

	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->