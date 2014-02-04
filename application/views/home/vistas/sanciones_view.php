		<div class="header_page">
            <h1>Sanciones</h1>
            <h2>&nbsp;</h2>
        </div>
       <div class="sanciones_contenedor">
        	
            <table class="sanciones">
                    <thead>
                        <tr>
                            <th class="t">Jugador</th>
                            <th class="t">Equipo</th>
                            <th class="t">Torneo (nro fecha)</th>
                            <th class="t">Sanción</th>
                            <th class="t">Observaciones</th>
                        </tr>
                     </thead>
                    <tbody>
						<?php $i=1; foreach ($sanciones as $jugador): ?>
                        	<tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
							<td class="t"><span class="change_may_min"><?php echo $jugador->nombre_jugador ; ?></span> <span class="change_may_min"><?php echo $jugador->apellido; ?></span></td>
                            <td class="t"><?php echo $jugador->nombre_equipo; ?></td>
                            <td class="t"><?php echo $jugador->type . " ".  $jugador->category  . " (" .$jugador->fecha  . ")" ;  ?></td>
                            <td class="t"><?php 
							$label = " fecha";
							if ($jugador->sancion > 1){
								$label = " fechas";
								}
							echo $jugador->sancion . $label ;
							?></td>
  							 <td class="t"><?php echo $jugador->observacion; ?></td>

                       </tr>
						<?php $i++; endforeach;?>
                    </tbody>
			</table>
            </div>
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
        
        