<?php $this->load->view('auth/header'); ?>
<div class='mainInfo'>

	<?php echo form_open("auth/modificar_tabla_ok");?>   
        <div id="header_cargar">
         <h3><?php echo $message ;?></h3>
	        <h3></h3>
    		</div>
			<table class="posiciones_admin">
                <thead>
                    <tr>
                        <th class="o">Pos</th>
                        <th class="o">Equipo</th>
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
                	<?php $k = 0; ?>
    				<?php $j=1; foreach($posiciones as $posicion):?>
					<?php $name0  = 'pos_id[' . $j. ']';?>
					<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $posicion->position_id?>">
					
                    <tr class="<?php echo "" . ( ($j & 1) ? 'odd' : 'even' );?>">
                        <td class="o"><?php $k++; echo $k; ?></td>
                        <td class="t">
							<?php echo $posicion->name_equipo;?>
						</td>
                        <td class="o"><span style="font-weight:700;">
							<?php echo $posicion->ptos;?>
						</span></td>
                        <td class="o"><?php echo $posicion->pj;?></td>
                        <td class="o">
							<?php 
								$name_pg  = 'pg[' . $j . ']';
								echo form_input($name_pg,$posicion->pg);
							?>
						</td>
                        <td class="o">
							<?php 
								$name_pe  = 'pe[' . $j . ']';
								echo form_input($name_pe,$posicion->pe);
							?>
						</td>
                        <td class="o">
							<?php 
								$name_pp  = 'pp[' . $j . ']';
								echo form_input($name_pp,$posicion->pp);
							?>
						</td>
                        <td class="o">
							<?php 
								$name_gf  = 'gf[' . $j . ']';
								echo form_input($name_gf,$posicion->gf);
							?>
						</td>
                        <td class="o">
							<?php 
								$name_gc  = 'gc[' . $j . ']';
								echo form_input($name_gc,$posicion->gc);
							?>
						</td>
                        <td class="o"><?php echo $posicion->dg;?></td>
	               </tr>
                   <?php $j++; endforeach;?>
				</tbody>
			</table>   <br><br>
            		<p><a href="<?php echo site_url('auth/modificar_tabla_agregar_equipo/') . '/' . $tournament_id;?>"><u>Agregar a un equipo (para tablas de eliminatoria)</u></a></p>

<?php echo form_submit('submit', 'Modificar tabla');?><br><br>

		<a href="<?php echo site_url('auth/');?>"><u>Go Back</u></a>
        
            
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
