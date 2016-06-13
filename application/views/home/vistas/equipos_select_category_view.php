        <div class="header_page">
            <h1>Equipos</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
        	<?php echo form_open("equipos/elegir_equipo");?>
    
             <p>Elija la categoría correspondiente al equipo<br/>
             
             <?php if ( $categories){
                 echo form_dropdown('dropdown_category', $categories);
                 } 
             ?>
             </p>
             
             <p><?php echo form_submit('submit', 'Elegir Equipo');?></p>
             
             <?php echo form_close();?>
             
        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->