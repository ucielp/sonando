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

							<?php 
								if ($team->activo == 1){
									$checked = 'checked';
								} else
								{
									$checked = '';
								}
								
							?> 
							<td>
								<?php echo '<input type="checkbox" '.$checked.' name="activados['.$team->e_id.'][]" value="'.$team->e_id.'" />';?>
							</td>
							
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
