			<div class="container-fixture">
				<div class="catmenu"><?php echo $categoryTree ?></div>
				<div class="table-wrapper">
					<div class="table-header">
						<h1><?php echo $event_name;?></h1>
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
									<?php 
									if ($partido->cargado){
										if ($partido->team1_pen){ echo "(" . $partido->team1_pen . ") ";}
										echo $partido->team1_res;

										?>:<?php 
										echo $partido->team2_res;
									if ($partido->team2_pen){ echo " (" . $partido->team2_pen . ")";}

									?>
								</td>
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
$('.fecha_posterior a').click( function(e) {
	e.preventDefault();
	$(".table-wrapper .fixture").html('<h1 class="ajax-loader"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" /></h1>');
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
	$("body, html").animate({ 
            scrollTop: $( ".table-wrapper" ).offset().top 
    }, 600);
});
$('.fecha_anterior a').click( function(e) {
	e.preventDefault();
	$(".table-wrapper .fixture").html('<h1 class="ajax-loader"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" /></h1>');
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
	$("body, html").animate({ 
            scrollTop: $( ".table-wrapper" ).offset().top 
    }, 600);
});
$('.catmenu li a').click( function(e) {
	e.preventDefault();
	$(".table-wrapper .fixture").html('<h1 class="ajax-loader"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" /></h1>');
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
	$("body, html").animate({ 
            scrollTop: $( ".table-wrapper" ).offset().top 
    }, 600);
});
</script>