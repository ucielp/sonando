        <div class="header_page">
            <h1>Goleadores</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
            <div class="tabla_goleadores">
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
		
       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->