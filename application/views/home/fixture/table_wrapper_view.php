	<?php

	if (!$fixtures){
		return;
		}
				
	?>
<h2><?php echo $event_name;?></h2>

<?php 
# Me fijo si hay alguna fecha que no está cargada
if($fixture_actual){
?>
	<h3>Próxima fecha</h3>
	<h3><?php echo 'Fecha ' . $current_fecha;?></h3>
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
			<?php
			$i=1; foreach($fixture_actual as $partido):?>
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
		<?php $i++; endforeach;	
		?>
		</tbody>
	</table>
	<hr class="hr_fixture">
<?php 
}
?>

<h2>Fixture completo</h2>

		<?php
		foreach($fixtures as $nro_fecha => $fixture):
		?>
			
		
		<table class="tablascg">
			<thead>
				<h3>Fecha <?php echo $nro_fecha;?></h3>
				<tr>
					<th>Equipo</th>
					<th>RESULTADOS</th>
					<th>Equipo</th>
					<th>Fecha</th>
					<th>Hora</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$i=1; foreach($fixture as $partido):?>
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
	<?php $i++; endforeach;	
				endforeach;
	?>
	</tbody>
</table>
<h3>
					
</h3>

