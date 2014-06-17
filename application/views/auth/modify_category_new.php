<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/modify_category_new");?>
      <h1>Modificar categorías</h1>
		<div class='inscription'>
      <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>ID de la categoría padre</th>
                    <th>TipoTorneo<br> (Nodo es que no se juega)</th>
                    <th>Mostrar</th>
                    <th>Eliminar categoría</th>

                </tr>
                <?php $i = 0; 
				if ($categories){
					$i=1;
					 foreach ($categories as $category):?>
						<tr>
							<td><?php echo $category['id']?></td>
							<?php $name0  = 'category[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $category['id']?>">
						<!-- Esto es para name_category -->
                        <td>
						<?php $name0  = 'name_category[' . $i. ']';?>
						<?php 
							$name1  = 'res1[' . $i . ']';
							echo form_input($name1,$category['name_category']);
						?>
						</td>
							
						<!-- Esto es para parent_id -->
                        <td>
						<?php $name0  = 'name_parent_id[' . $i. ']';?>
						<?php 
							$name1  = 'res2[' . $i . ']';
							echo form_input($name1,$category['parent_id']);
						?>
						</td>
						
						  <td><?php $name  = 'dropdown_t_id[' . $i . ']';
							echo form_dropdown($name,$tipo_torneo,$category['tipo']);
                           
							$t_id = 'hid_i_id[' . $i .  ']';
							$e_id = array(
							'name'  => $t_id,
							'value' => $category['tipo'],
							'checked'     =>  'true',
							'type'     =>  'hidden',
						);
						?>  </td>
						
						
						<!-- Esto es para show -->						
						<?php 
						$show_name = 'show[' . $i . ']';
						 
						if ($category['show'] == 1){
							$checked = TRUE;
							}
						else
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
						?> <td><?php echo form_input($show2);?><?php echo form_checkbox($show);?>  </td>
                      	 
                      	 <td><?php echo (anchor("auth/delete_category/".$category['id'], 'Eliminar'));?></td>
													
						</tr>
					<?php $i++; endforeach;?>
               <?php } ?>
            </table>
		</div>
	  <p><?php echo form_submit('submit', 'Modificar');?>


	  <p><?php echo (anchor("auth/create_new_category/", 'Crear una nueva categoría'));?></td>

     
    <?php echo form_close();?>
</div>

</body>
</html>
