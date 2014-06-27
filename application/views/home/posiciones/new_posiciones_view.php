        <div class="container-fixture">
			<div class="catmenu"><?php echo $categoryTree ?></div>
			<div class="table-wrapper">
				<div class="table-header">
					<h1><?php echo $event_name;?></h1>
				</div>
			<table class="posiciones">
                <thead>
                    <tr>
                        <th class="o">Pos</th>
                        <th class="t">Equipo</th>
                        <th class="o">Pts</th>
                        <th class="o">PJ</th>
                        <th class="o">PG</th>
                        <th class="o">PE</th>
                        <th class="o">PP</th>
                        <th class="o">GF</th>
                        <th class="o">GC</th>
                        <th class="o">DG</th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 0; ?>
    				<?php foreach($posiciones as $posicion):?>
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="o"><?php $i++; echo $i; ?></td>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $posicion->id_equipo;?>"><?php echo $posicion->name_equipo;?></a></td>
                        <td class="o"><span style="font-weight:700;"><?php echo $posicion->ptos;?></span></td>
                        <td class="o"><?php echo $posicion->pj;?></td>
                        <td class="o"><?php echo $posicion->pg;?></td>
                        <td class="o"><?php echo $posicion->pe;?></td>
                        <td class="o"><?php echo $posicion->pp;?></td>
                        <td class="o"><?php echo $posicion->gf;?></td>
                        <td class="o"><?php echo -$posicion->gc;?></td>
                        <td class="o"><?php echo $posicion->dg;?></td>
	               </tr>
                   <?php endforeach;?>
				</tbody>
			</table>            



            </div> <!-- END COMBO_BOX_WRAPPER -->	

            </div> 
            </div> 

<script type="text/javascript">
$('.catmenu li a').bind( "click", function(e) {
	e.preventDefault();
	$(".table-wrapper .posiciones").html('<h1 class="ajax-loader"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" /></h1>');
	var href = $(this).attr("href");
	$(".table-wrapper").load(href);
	$("body, html").animate({ 
            scrollTop: $( ".table-wrapper" ).offset().top 
    }, 600);
});
</script>
       

