        <div class="header_page">
            <h1>Goleadores</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
        	<?php echo form_open("goleadores/ver_goleadores");?>
    
             
             <?php if ( $events){
                 echo form_dropdown('dropdown_category', $events);
                 } 
             ?>

             
             <?php $data_submit = array(
								  'name'        => 'submit',
								  'class'          => 'submit_goleadores',
								  'value'       => 'Ver Goleadores',
								);
                      echo form_submit($data_submit);?><p>
             
             <?php echo form_close();?>
             
        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
