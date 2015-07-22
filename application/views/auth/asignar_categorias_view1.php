<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Definir categoría para cada equipo (o "Ninguna")</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/asignar_categorias_go_new");?>
	  <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>Equipo</th>
					<th>Categoría</th>
                    <th>Orden</th>
                    <th>Contraseña</th>


               </tr>
                <?php
				if ($teams){
					foreach ($teams as $team):?>
						<tr> 
                        	<td><?php echo $team->e_name;?></td>
                            
                            <td><?php $name  = 'dropdown[' . $team->e_id . ']';
							echo form_dropdown($name,$categories,$team->t_id);
                           
							$elec_name = 'hid[' . $team->e_id .  ']';
							$e_id = array(
							'name'  => $elec_name,
							'value' => $team->e_id,
							'checked'     =>  'true',
							'type'     =>  'hidden',
						);
						?>  </td><td><?php echo form_input($e_id);?></td>
                        <td><?php $name2  = 'dropdown2[' . $team->e_id . ']';
							echo form_dropdown($name2,$orden,$team->orden);
                            
							$elec_name = 'hid2[' . $team->e_id .  ']';
							$orden_id = array(
							'name'  => $elec_name,
							'value' => $team->e_id,
							'checked'     =>  'true',
							'type'     =>  'hidden',
						);
						?> <td><?php echo form_input($orden_id);?></td>
                         <td><?php echo  $team->psswd;?></td>
                        
						</tr>
					<?php endforeach;?>
               <?php } ?>
            </table>
	
     <p><?php echo form_submit('submit', 'Actualizar');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>
