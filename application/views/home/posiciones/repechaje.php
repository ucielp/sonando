		<div class="header_page">
            <h1>Copa Repechaje</h1>
            <h2>Fase de Grupo</h2>
        </div>
        	<?php $j = 1; foreach($pos_grupos as $grupo):?>
            <table class="posiciones">
                <thead>
                    <tr>
                        <th class="o"><?php echo "Grupo " . $j; ?></th>
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
    				<?php foreach($grupo as $posicion):?>
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="o"><?php $i++; echo $i; ?></td>
                        <td class="t"><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $posicion->id_equipo;?>"><?php echo $posicion->name_equipo;?></a></td>
                        <td class="o"><span style="font-weight:700;"><?php echo $posicion->ptos;?></span></td>
                        <td class="o"><?php echo $posicion->pj;?></td>
                        <td class="o"><?php echo $posicion->pg;?></td>
                        <td class="o"><?php echo $posicion->pe;?></td>
                        <td class="o"><?php echo $posicion->pp;?></td>
                        <td class="o"><?php echo $posicion->gf;?></td>
                        <td class="o"><?php echo $posicion->gc;?></td>
                        <td class="o"><?php echo $posicion->dg;?></td>
	               </tr>
                   <?php endforeach; $j++;?>
				</tbody>
			</table>
            <div id="white_space"></div>
            <?php endforeach;?>
			
        <div class="header_page">
            <h1>Copa Repechaje</h1>
            <h2>Fase Eliminatoria</h2> <!-- Falta resolver esto para que me devuelva lo de semi-final, final, etc -->
        </div>
         <div id="campeones_elim_chart">
			<div id="chart">
                <div class="row1">
                    <div class="cuartos">
                    1 G1
                    </div>
                    <div class="blank1">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    1 G3
                    </div>
                </div>
                <div class="row2">
                    <div class="blank2">
                    &nbsp;
                    </div>
                    <div class="semi">
                    SEMI 1
                    </div>
                    <div class="blank3">
                    &nbsp;
                    </div>
                    <div class="semi">
                    SEMI 2
                    </div>
                    <div class="blank4">
                    &nbsp;
                    </div>
                </div>
                <div class="row3">
                    <div class="cuartos">
                    2 G4
                    </div>
                    <div class="blank1">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    2 G2
                    </div>
                </div>
                <div class="row4">
                    <div class="blank5">
                    &nbsp;
                    </div>
                    <div class="final">
                    FINALISTA 1
                    </div>
                    <div class="blank6">
                    &nbsp;
                    </div>
                </div>
                <div class="row5">
                    <div class="blank5">
                    &nbsp;
                    </div>
                    <div class="final">
                    FINALISTA 2
                    </div>
                    <div class="blank6">
                    &nbsp;
                    </div>
                </div>
                <div class="row6">
                    <div class="cuartos">
                    1 G2
                    </div>
                    <div class="blank1">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    1 G4
                    </div>
                </div>
                <div class="row7">
                    <div class="blank2">
                    &nbsp;
                    </div>
                    <div class="semi">
                    SEMI 1
                    </div>
                    <div class="blank3">
                    &nbsp;
                    </div>
                    <div class="semi">
                    SEMI 2
                    </div>
                    <div class="blank4">
                    &nbsp;
                    </div>
                </div>
                <div class="row8">
                    <div class="cuartos">
                    2 G3
                    </div>
                    <div class="blank1">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    2 G1
                    </div>
                </div>
                <div class="row9">
                    <div class="blank6">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    3ER PUESTO
                    </div>
                    <div class="blank6">
                    &nbsp;
                    </div>
                </div>
                <div class="row10">
                    <div class="blank6">
                    &nbsp;
                    </div>
                    <div class="cuartos">
                    4TO PUESTO
                    </div>
                    <div class="blank6">
                    &nbsp;
                    </div>
                </div>
			</div>                
                       
        </div>
            
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
