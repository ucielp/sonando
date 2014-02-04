        <div class="header_page">
            <h1>Goleadores</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
        	<?php echo form_open("goleadores/ver_goleadores");?>
    
             <p>Elija una categoría<br/>
             
             <?php if ( $categories){
                 echo form_dropdown('dropdown_category', $categories);
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