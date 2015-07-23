<div class="modal fade" id="modal-goleadores">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">GOLEADORES<span><?php echo $event_name;?></span></h4>
			</div>
			<div class="modal-body">
				<table class="tablascg">
					<thead>
						<tr>
							<th>Jugador</th><th>Equipo</th><th>Goles</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($goleadores as $goleador): ?>
						<tr class="<?php echo "" . ( ($i & 1) ? '' : 'alt' );?>">
							<td>
								<?php echo $goleador->name_jugador; ?> <?php echo $goleador->last_name; ?>
							</td>
							<td>
								<?php echo $goleador->name_equipo; ?>
							</td>
							<td>
								<strong><?php echo $goleador->goal; ?></strong>
							</td>
						</tr>
						<?php $i++; endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="boxgoleadores">
		<a href="#" data-toggle="modal" data-target="#modal-goleadores"><img src="img/pelota.png"/> Ver Goleadores</a>
	</div>
	<div class="tablastorneo">
		<h2><?php echo $event_name;?></h2>
		<table class="tablascg">
			<thead>
				<tr>
					<th>Pos</th>
					<th>Equipo</th>
					<th>Pts</th>
					<th>PJ</th>
					<th>PG</th>
					<th>PE</th>
					<th>PP</th>
					<th>GF</th>
					<th>GC</th>
					<th>DG</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach($posiciones as $posicion):?>
				<tr class="<?php echo "" . ( ($i & 1) ? 'alt' : '' );?>">
					<td><?php $i++; echo $i; ?></td>
					<td><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $posicion->id_equipo;?>"><?php echo $posicion->name_equipo;?></a></td>
					<td><strong><?php echo $posicion->ptos;?></strong></td>
					<td><?php echo $posicion->pj;?></td>
					<td><?php echo $posicion->pg;?></td>
					<td><?php echo $posicion->pe;?></td>
					<td><?php echo $posicion->pp;?></td>
					<td><?php echo $posicion->gf;?></td>
					<td><?php echo -$posicion->gc;?></td>
					<td><?php echo $posicion->dg;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>