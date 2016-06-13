<?php $data = array('class' => 'fixture_form');
echo form_open('fixture/ver_descenso', $data);
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  $data_submit = array(
								  'name'        => 'mysubmit',
								  'class'          => 'submit_fixture',
								  'value'       => 'Ver Fixture',
								);
                      echo form_submit($data_submit);
	
		echo form_close();
	   ?>

			<div class="header_page">
				<h1>Zona Descenso <span style="text-transform:uppercase;"><?php echo $category_name;?></span></h1>
				<h2>Fecha <?php echo $fecha_nro;?></h2>
			</div>
			<table class="fixture">
                <thead>
                    <tr>
                        <th class="t">Grupo 1</th>
                        <th class="o">Resultado</th>
                        <th class="t"></th>
                        <th class="o">Fecha</th>
                        <th class="o">Horario</th>
                        <th class="o">Cancha</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i=1; foreach($fixture as $partido):?>
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
                   <?php $i++; endforeach;?>
				</tbody>
			</table>    
            <div class="controls">
                   <?php echo $this->pagination_torneo->create_links();
				   ?>
                   </div>
            <!--<div id="previous_date">
                <a href=""><img src="<?php echo base_url(); ?>images/fixture/previous_arrow.png"></a>
            </div>
            <div id="next_date">
                <a href=""><img src="<?php echo base_url(); ?>images/fixture/next_arrow.png"></a>
            </div>-->
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER-->
