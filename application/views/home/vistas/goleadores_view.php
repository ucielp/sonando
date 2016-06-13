    	<div class="container-fixture">
            <div class="catmenu"><?php echo $categoryTree ?></div>
            <div class="table-wrapper">
				<div class="table-header">
					<h1><?php echo $event_name;?></h1>
						<h2></h2>
				</div>
                		
                      
            <table class="fixture">

            <table class="goleadores">
                    <thead>
                        <tr>
                            <th class="t">Jugador</th>
                            <th class="t">Equipo</th>
                            <th class="o">Goles</th>
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
            </div> <!-- END table-wrapper -->
			</div> <!-- END CONTAINER-->
            </div> <!-- END WRAPPER-->
