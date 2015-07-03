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