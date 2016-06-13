
			
			
        <?php ?><div class="header_page">
            <h1>Promociones y ascensos</h1>
        </div>
           <?php $j = 1; foreach($fixture_grupos as $fixture):?>
            <table class="fixture">
                <thead>
                    <tr>
                        <th class="t"></th>
                        <th class="o"></th>
                        <th class="t"></th>
                        <th class="o"></th>
                        <th class="o"></th>
                        <th class="o"></th>
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
            <?php endforeach;?>  <?php ?>
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER-->