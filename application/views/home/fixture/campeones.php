		<div class="header_page">
            <h1>Copa de Campeones</h1>
            <h2>Fase de Grupo - Fecha <?php echo $fecha_nro;?></h2>
			

        </div>
        	<?php $j = 1; 
			foreach($fixture_grupos as $fixture):
						if ($fixture){

			?>

            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"><?php echo "Grupo " . $j; ?></th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 1; ?>
                	<?php foreach($fixture as $partido):?> <!-- Aca tendria que iterar entre par e impar -->
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php if ($partido->cargado){echo $partido->team1_res;?>:<?php echo $partido->team2_res;?></td>
                        <?php }else{ ?>- : -</td> <?php }?>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
                        <td class="o"><?php echo $partido->date;?></td>
                        <td class="o"><?php echo $partido->time;?></td>
                        <td class="o">Cancha <?php echo $partido->court;?></td>
	               </tr>
                   <?php $i++; endforeach; $j++;
				   ?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php			 }

			endforeach;
			 ?>
             <div class="controls">
                   <?php echo $this->pagination_torneo->create_links();
				   ?>
                   
                   </div>
			
      <?php ?>  <?php ?><div class="header_page">
		<h2>Fase Eliminatoria</h2> 
        </div>
           <?php $j = 1; 
			?>
            <h1>Cuartos</h1> 
			<?php
		   foreach($fixture_grupos_cuartos as $fixture):
		   		   		 	if ($fixture){  
			?>
            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"><?php echo "Grupo " . $j; ?></th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 1; ?>
                	<?php foreach($fixture as $partido):?> <!-- Aca tendria que iterar entre par e impar -->
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php if ($partido->cargado){echo $partido->team1_res;?>:<?php echo $partido->team2_res;?></td>
                        <?php }else{ ?>- : -</td> <?php }?>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
                        <td class="o"><?php echo $partido->date;?></td>
                        <td class="o"><?php echo $partido->time;?></td>
                        <td class="o">Cancha <?php echo $partido->court;?></td>
	               </tr>
                   <?php $i++; endforeach; $j++;?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php }
			 endforeach;
			 ?>  
             
             <!-- SEMIFINALES -->
             <?php $j = 1; 
			?>
            <h1>Semifinales</h1> 
			<?php
		   foreach($fixture_grupos_semi as $fixture):
		   		 	if ($fixture){  
			?>
            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"><?php echo "Grupo " . $j; ?></th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 1; ?>
                	<?php foreach($fixture as $partido):?> <!-- Aca tendria que iterar entre par e impar -->
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php if ($partido->cargado){echo $partido->team1_res;?>:<?php echo $partido->team2_res;?></td>
                        <?php }else{ ?>- : -</td> <?php }?>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
                        <td class="o"><?php echo $partido->date;?></td>
                        <td class="o"><?php echo $partido->time;?></td>
                        <td class="o">Cancha <?php echo $partido->court;?></td>
	               </tr>
                   <?php $i++; endforeach; $j++;?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php }
			 endforeach;
			 ?>  
             
             
              <!-- FINALES -->
             <h1>Finales y 3er y 4to puesto</h1> 
             <?php $j = 1; 
			?>
			<?php
		   foreach($fixture_grupos_final as $fixture):
		   		 	if ($fixture){  
			?>
            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"><?php echo "Grupo " . $j; ?></th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 1; ?>
                	<?php foreach($fixture as $partido):?> <!-- Aca tendria que iterar entre par e impar -->
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php if ($partido->cargado){echo $partido->team1_res;?>:<?php echo $partido->team2_res;?></td>
                        <?php }else{ ?>- : -</td> <?php }?>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
                        <td class="o"><?php echo $partido->date;?></td>
                        <td class="o"><?php echo $partido->time;?></td>
                        <td class="o">Cancha <?php echo $partido->court;?></td>
	               </tr>
                   <?php $i++; endforeach; $j++;?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php }
			 endforeach;
			 ?>  
    	  <!-- 3er y 4to puesto -->
              <?php $j = 1; 
			?>
			<?php
		   foreach($fixture_grupos_tercer as $fixture):
		   		 	if ($fixture){  
			?>
            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"><?php echo "Grupo " . $j; ?></th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 1; ?>
                	<?php foreach($fixture as $partido):?> <!-- Aca tendria que iterar entre par e impar -->
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php if ($partido->cargado){echo $partido->team1_res;?>:<?php echo $partido->team2_res;?></td>
                        <?php }else{ ?>- : -</td> <?php }?>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
                        <td class="o"><?php echo $partido->date;?></td>
                        <td class="o"><?php echo $partido->time;?></td>
                        <td class="o">Cancha <?php echo $partido->court;?></td>
	               </tr>
                   <?php $i++; endforeach; $j++;?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php }
			 endforeach;
			 ?>  
	</div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER-->