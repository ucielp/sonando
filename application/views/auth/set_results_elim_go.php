<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Resultados</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
	
    <?php echo form_open("auth/set_results_elim_ok");?>     
     <div class="header_page">
				<h1>Partidos del torneo <span style="text-transform:uppercase;"><?php echo $category_name;?></span></h1>
			</div>
            <center>
			<table class="resultados_admin">
                <thead>
                    <tr>
                        <th class="e1">Equipo1</th>
                        <th class="r">Resultado (penales)</th>
                        <th class="e2">Equipo2</th>
                        <th class="i">Ya ingresado (tildar para ignorar partido)</th>
                         <th class="i">Dar perdido a ambos equipos</th>
                        
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i=1; foreach($partidos as $partido):?>
                        <td class="e1"><?php echo $partido->name_equipo1;?></td>
                        <td class="r">
						<?php $name0  = 'part_id[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $partido->p_id?>">
							<?php 
								$name1  = 'res1[' . $i . ']';
								$pen1  = 'pen1[' . $i . ']';
								if ($partido->cargado){
									echo "(";
									echo form_input($pen1,$partido->team1_pen);
									echo ") ";
									echo form_input($name1,$partido->team1_res);
								}
								else{
									echo "(";
									echo form_input($pen1,'');
									echo ") ";
									echo form_input($name1,'');


									}	
								?>
                        	:
							<?php 
								$name2  = 'res2[' . $i . ']';
								$pen2  = 'pen2[' . $i . ']';
								if ($partido->cargado){
									echo form_input($name2,$partido->team2_res);
									echo "(";
									echo form_input($pen2,$partido->team2_pen);
									echo ") ";
								}
								else{
									
									echo form_input($name2,'');
									echo "(";
									echo form_input($pen2,'');
									echo ") ";
									}	
							?></td>
                        <td class="e2"><?php echo $partido->name_equipo2;?></td>
                        
                         <?php 
						$cargado_name = 'cargados[' . $i . ']';
						if ($partido->cargado == 1){
							$checked = TRUE;
							#esto tendria que ser disabled
							$enabled_disabled = 'enabled' ;
							#$enabled_disabled = 'disabled' ;
							}
						else
						{
							$checked = FALSE;
							$enabled_disabled = 'enabled';
							
						}
						$cargado1 = array(
							'name'  => $cargado_name,
							'value' => '1',
							$enabled_disabled => TRUE,
							'checked'     =>  $checked,
						); 	
						$cargado2 = array(
							'name'  => $cargado_name,
							'value' => '0',
							$enabled_disabled => TRUE,
							'checked'     =>  $checked,
							'type'     =>  'hidden',
						); 	
						?> <td class="i">  <?php echo form_checkbox($cargado2);?><?php echo form_checkbox($cargado1);?> </td>
							
                            
                         <?php 
						$perdidos_name = 'perdidos[' . $i . ']';
						$perdido1 = array(
							'name'  => $perdidos_name,
							'value' => '1',
							'checked'     =>  FALSE,
						); 	
						$perdido2 = array(
							'name'  => $perdidos_name,
							'value' => '0',
							'checked'     =>  $checked,
							'type'     =>  'hidden',
						); 	
						?> <td class="i">  <?php echo form_checkbox($perdido2);?><?php echo form_checkbox($perdido1);?> </td>      
                            
                            
	               </tr>
                   <?php $i++; endforeach;?>
				</tbody>
			</table>    <br>
            <p>
            Los partidos que estan tildados en "Ya ingresado" es porque fueron ingresados anteriormente</br> 
            Se pueden tildar para omitir y cargar en otro momento (pero NO se pueden destildar si ya estan tildados)</br>
            Y si se tilda "Dar perdido ambos equipos" se le suma un partido pero nada de puntos y se deja el resultado en 0.
            </p>
		<?php echo form_submit('submit', 'Cargar resultados');?><br><br>
		<a href="<?php echo site_url('auth/set_results');?>"><u>Go Back</u></a>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>