<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/modify_events");?>
      <h1>Modificar eventos</h1>
		<div class='inscription'>
		<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría <?php echo (anchor("auth/create_modify_category_new/", '(ID de la categoría)'));?></th>
                    <th>Eliminar evento</th>

                </tr>
                <?php $i = 0; 
				if ($events){
					$i=1; foreach ($events as $event):?>
						<tr>
							<td><?php echo $event['id']?></td>
							<?php $name0  = 'event[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $event['id']?>">
						<!-- Esto es para name_event -->
                        <td>
						<?php $name0  = '	[' . $i. ']';?>
						<?php 
							$name1  = 'res1[' . $i . ']';
							echo form_input($name1,$event['name_event']);
						?>
						</td>
							
						<!-- Esto es para category_id -->
                        <td>
						<?php $categories[0] = 'No asignada'; 
                         $name  = 'dropdown_category[' . $i . ']';
						echo form_dropdown($name, $categories, $event['category_id']);
						
						?>
						</td>
						
						<!-- Esto es para show -->						
						<?php 
						$show_name = 'show[' . $i . ']';
						?> 
                      	 
                      	 <td><?php echo (anchor("auth/delete_event/".$event['id'], 'Eliminar'));?></td>
													
						</tr>
					<?php $i++; endforeach;?>
               <?php } ?>
            </table>
		</div>
	  <p><?php echo form_submit('submit', 'Modificar eventos');?>

    <?php echo form_close();?>

	<p><?php echo (anchor("auth/create_new_event/", 'Crear un nuevo evento'));?></td>

</div>

</body>
</html>
