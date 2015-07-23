<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Seleccionar equipos para este torneo </h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/update_equipo_torneo_go/$category_id");?>
	  <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>Equipo</th>
                    <th>Orden</th>
					<th>Eliminar</th>

               </tr>
                <?php
				if ($teams){
					foreach ($teams as $team):?>
						<tr> 
                        	<td><?php echo $team->nombre_equipo;?></td>
                            	  
							<td><?php $name2  = 'dropdown2[' . $team->team_id. ']';
							echo form_dropdown($name2,$orden,$team->el_orden);
                            
							$elec_name = 'hid2[' . $team->team_id .  ']';
							$orden_id = array(
							'name'  => $elec_name,
							'value' => $team->team_id,
							'checked'     =>  'true',
							'type'     =>  'hidden',
						);
						?> <td><?php echo form_input($orden_id);?></td>
							
						<td><?php echo (anchor("auth/delete_team_from_category_display/".$category_id . "/" . $team->team_id, 'Eliminar'));?></td>
						</tr>
					<?php endforeach;?>
               <?php } ?>
            </table>
		<?php echo (anchor("auth/asignar_equipo_torneo_elegir/".$category_id , 'Asignar nuevo equipo'));?>

     <p><?php echo form_submit('submit', 'Actualizar');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>
	
