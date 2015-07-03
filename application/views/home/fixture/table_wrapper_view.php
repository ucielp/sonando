<h2><?php echo $event_name;?></h2>
<h3>Fecha <?php echo $fecha_nro;?></h3>
<table class="tablascg">
	<thead>
		<tr>
			<th>Equipo</th>
			<th>RESULTADOS</th>
			<th>Equipo</th>
			<th>Fecha</th>
			<th>Hora</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($fixture as $partido):?>
		<tr class="<?php echo "" . ( ($i & 1) ? 'alt' : '' );?>">
			<td><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
			<td><strong>
				<?php if ($partido->cargado){
					if ($partido->team1_pen){ 
						echo "(" . $partido->team1_pen . ") ";
					} echo $partido->team1_res;	?>:<?php echo $partido->team2_res;
					if ($partido->team2_pen){ 
						echo " (" . $partido->team2_pen . ")";}	?>
				</strong></td>
			<?php }else{ ?>- : -</strong></td> <?php }?>
			<td><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
			<td><?php echo $partido->date;?></td>
			<td><?php echo $partido->time;?></td>
		</tr>
	<?php $i++; endforeach;	?>
	</tbody>
</table>


<h3>Fecha <?php echo $fecha_nro;?></h3>
<table class="tablascg">
	<thead>
		<tr>
			<th>Equipo</th>
			<th>RESULTADOS</th>
			<th>Equipo</th>
			<th>Fecha</th>
			<th>Hora</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Ferrugem A.C.</td>
			<td><strong>2:2</strong></td>
			<td>Sacashispa</td>
			<td>12/07</td>
			<td>4:00</td>
		</tr>
		<tr class="alt">
			<td>Ferrugem A.C.</td>
			<td><strong>2:2</strong></td>
			<td>Sacashispa</td>
			<td>12/07</td>
			<td>4:00</td>
		</tr>
		<tr>
			<td>Ferrugem A.C.</td>
			<td><strong>2:2</strong></td>
			<td>Sacashispa</td>
			<td>12/07</td>
			<td>4:00</td>
		</tr>
		<tr class="alt">
			<td>Ferrugem A.C.</td>
			<td><strong>2:2</strong></td>
			<td>Sacashispa</td>
			<td>12/07</td>
			<td>4:00</td>
		</tr>
	</tbody>
</table>