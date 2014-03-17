        <div class="header_page">
            <h1>Goleadores</h1>
            <h2>&nbsp;</h2>
        </div>
        
        <?php echo form_open("goleadores/ver_goleadores");?>
    
    
						  
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
            <div class="tabla_goleadores">
				         
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
            <table class="goleadores">
                    <thead>
                        <tr>
                            <th class="t">Jugador</th>
                            <th class="t">Equipo</th>
                            <th class="o">Total</th>
                        </tr>
                     </thead>
                    <tbody>
						<?php $i=1; foreach ($goleadores as $goleador): ?>
                        	<tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                            <td class="t"><span class="change_may_min"><?php echo $goleador->name_jugador; ?></span> <span class="change_may_min"><?php echo $goleador->last_name; ?></span></td>
                            <td class="t"><?php echo $goleador->name_equipo; ?></td>
                            <td class="o"><?php echo $goleador->goal; ?></td>
                       </tr>
						<?php $i++; endforeach;?>
                    </tbody>
				</table>
        </div>
		
	
             
             <?php echo form_close();?>
             
       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
