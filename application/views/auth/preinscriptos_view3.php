<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>


	
    <?php echo form_open("auth/inscribir/");?>
      <h1>Modificar jugadores</h1>
		<div class='inscription'>
      <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Nacimiento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
       				<th>Email</th>
                    <th>Obra Social</th>
                    <th>Foto</th>                    
                    <th>Electro</th>
                    <th>Certificado</th>
                    <th>Deslinde</th>
					<th>Edit</th>
					<th>Eliminar</th>
                    <th>Inscribir</th>


                </tr>
                <?php $i = 0; 
				if ($players){
					foreach ($players as $user):?>
						<tr>
							<td><?php echo $user['name']?></td>
							<td><?php echo $user['last_name']?></td>
							<td><?php echo $user['dni'];?></td>
							<td><?php echo $user['birth'];?></td>
							<td><?php echo $user['address'];?></td>
							<td><?php echo $user['phone'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php echo $user['obra_social'];?></td>
                            <td>
                                	<?php if ($user['foto']){ ?>
                                	<a  href="<?php echo base_url(); ?>uploads/jugadores/<?php echo $user['foto']; ?>" >Ver</a>
                                	<?php } 
									else{ echo "";
										}?>

                                </td>
						<?php 
						$elec_name = 'electro[' . $user['id']. ']';
						 
						if ($user['electro'] == 1){
							$checked = TRUE;
							}
						else
						{
							$checked = FALSE;
						}
						$electro = array(
							'name'  => $elec_name,
							'value' => '1',
							'checked'     =>  $checked,
						); 	
						$electro2 = array(
							'name'  => $elec_name,
							'value' => '0',
							'checked'     =>  $checked,
							'type'     =>  'hidden',
						);
						?> <td><?php echo form_input($electro2);?><?php echo form_checkbox($electro);?>  </td>
                      	  
						
						<?php 
						$cert_name = 'certificado[' . $user['id']. ']';
						if ($user['certificado'] == 1){
							$checked = TRUE;
							}
						else
						{
							$checked = FALSE;
						}
						$certificado = array(
							'name'  => $cert_name,
							'value' => '1',
							'checked'     =>  $checked,
						); 	
						$certificado2 = array(
							'name'  => $cert_name,
							'value' => '0',
							'checked'     =>  $checked,
							'type'     =>  'hidden',

						); 	
						?> <td>  <?php echo form_checkbox($certificado2);?><?php echo form_checkbox($certificado);?>  </td>
						
	
						<?php 
						$deslinde_name = 'deslinde[' . $user['id']. ']';
						if ($user['deslinde'] == 1){
							$checked = TRUE;
							}
						else
						{
							$checked = FALSE;
						}
						$deslinde = array(
							'name'  => $deslinde_name,
							'value' => '1',
							'checked'     =>  $checked,
						); 	
						$deslinde2 = array(
							'name'  => $deslinde_name,
							'value' => '0',
							'checked'     =>  $checked,
							'type'     =>  'hidden',

						); 	
						?> <td>  <?php echo form_checkbox($deslinde2);?><?php echo form_checkbox($deslinde);?>  </td>
								 
					    <td><?php echo (anchor("auth/edit_player/".$user['id'], 'Edit'));?></td>
							<td><?php 
							echo (anchor("auth/delete_player_temp/".$user['id'], 'Eliminar'));?></td>
							
							 <?php 
						$inscripto_name = 'inscripto[' . $user['id']. ']';
						if ($user['inscripto'] == 1){
							$checked = TRUE;
							}
						else
						{
							$checked = FALSE;
						}
						$inscripto = array(
							'name'  => $inscripto_name,
							'value' => '1',
							'checked'     =>  $checked,
						); 	
						$inscripto2 = array(
							'name'  => $inscripto_name,
							'value' => '0',
							'checked'     =>  $checked,
							'type'     =>  'hidden',
						); 	
						?> <td>  <?php echo form_checkbox($inscripto2);?><?php echo form_checkbox($inscripto);?> </td>
							
						</tr>
					<?php endforeach;?>
               <?php } ?>
            </table>
		</div>
	  <p><?php echo form_submit('submit', 'Actualizar jugadores');?>
	  <p><?php echo (anchor("auth/inscribir_jugador/" . $team_id, 'Inscribir un nuevo jugador'));?></td>

     
    <?php echo form_close();?>
</div>

</body>
</html>
