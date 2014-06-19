			<div class="container-fixture">
				<div class="catmenu"><?php echo $categoryTree ?></div>
				<div class="table-wrapper">
					<div class="table-header">
						<h1><?php echo $event_name;?></span></h1>
						<h2>Fecha <?php echo $fecha_nro;?></h2>
					</div>
					<table class="fixture">
						<thead>
							<tr>
								<th class="t"></th>
								<th class="o">Resultado</th>
								<th class="t"></th>
								<th class="o">Fecha</th>
								<th class="o">Horario</th>
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
						   </tr>
						   <?php $i++; endforeach;
						   ?>
						</tbody>
					</table>     
					
						   
					<div class="controls">
						   <?php echo $this->pagination_torneo->create_links();
						   ?>
					</div>
				</div> <!-- END table-wrapper -->
			</div> <!-- END CONTAINER-->
   	</div> <!-- END WRAPPER-->
	
<script type="text/javascript">
$('.fecha_posterior a').bind( "click", function(e) {
	e.preventDefault();
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
});
$('.fecha_anterior a').bind( "click", function(e) {
	e.preventDefault();
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
});
$('.catmenu li a').bind( "click", function(e) {
	e.preventDefault();
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
});
</script>      
