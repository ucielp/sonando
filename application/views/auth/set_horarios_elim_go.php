<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Horarios</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/set_horarios_elim_last");?>     
     <div class="header_page">
				<h1>Partidos del torneo <span style="text-transform:uppercase;"></span></h1>
			</div>
            <center>
			<table class="horarios_admin">
                <thead>
                    <tr>
                        <th class="t">Equipo1</th>
                        <th class="o">Dia</th>
						<th class="o">Horario</th>
                        <th class="o">Cancha</th>

                        <th class="t">Equipo2</th>
						
						<th class="t">Planilla</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i=1; foreach($partidos as $partido):?>
                        <td class="t"><a href=""><?php echo $partido->name_equipo1;?></a></td>
                        <td class="o stg">
						<?php $name0  = 'part_id[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $partido->p_id?>">
							<?php 
								$name1  = 'dias[' . $i . ']';
								echo form_input($name1,$partido->date);
							?>
                        </td><td class="t">
							<?php 
								$name2  = 'horarios[' . $i . ']';
								echo form_input($name2,$partido->time);
							?></td>
	                      </td><td class="t">
	
    					 <?php 
								$name3  = 'canchas[' . $i . ']';
								echo form_input($name3,$partido->court);
							?></td>

                        <td class="t"><a href=""><?php echo $partido->name_equipo2;?></a></td>
						<td class="t"><a href="<?php echo site_url('auth/print_form_elim/' . $partido->p_id )?>"<u>Imprimir planilla</u></a></td>
	               </tr>
                   <?php $i++; endforeach;?>
				</tbody>
			</table>    <br>
		<?php echo form_submit('submit', 'Cargar horarios');?><br><br>
		<a href="<?php echo site_url('auth/set_horario');?>"><u>Go Back</u></a>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>