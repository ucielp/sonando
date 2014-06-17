<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Definir categoría para cada equipo (o "Ninguna")</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/activar_equipos_go");?>
	  <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>Equipo</th>
					<th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Activado</th>
                    <th>Inscribir jugadores</th>
                    <th>Eliminar equipo</th>


               </tr>
                <?php
				if ($teams){
					$i = 0;
					foreach ($teams as $team):?>
						<tr> 
						
							<td><a href="<?php echo base_url(); ?>equipos/equipo/
								<?php echo $team->e_id;?>"><?php echo $team->e_name;?>
							</a></td>

							<td><?php echo $team->user;?></td>
							<td><?php echo  $team->psswd;?></td>
							
							<?php $name0  = 'equipo[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $team->e_id?>">
                        	
							<?php 
								$show_name = 'activate[' . $i . ']';
						 
								if ($team->activo == 1){
									$checked = TRUE;
								} else
								{
									$checked = FALSE;
								}
								$show = array(
									'name'    => $show_name,
									'value'   => '1',
									'checked' =>  $checked,
								); 	
								$show2 = array(
									'name'     => $show_name,
									'value'    => '0',
									'checked'  =>  $checked,
									'type'     =>  'hidden',
								);
							?> 
							<td><?php echo form_input($show2);?><?php echo form_checkbox($show);?>  </td>
													
							<td><?php echo (anchor("auth/pre_inscriptos_by_team_id/".$team->e_id, 'Inscribir jugador'));?></td>
							<td><?php echo (anchor("auth/delete_team_preguntar/".$team->e_id, 'Eliminar'));?></td>

						</tr>
					<?php $i++; endforeach;?>
               <?php } ?>
            </table>
	
     <p><?php echo form_submit('submit', 'Actualizar');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>
