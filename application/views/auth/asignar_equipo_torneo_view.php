<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<h1>	Seleccionar equipos para este torneo 
	</h1>	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/asignar_equipo_torneo_go/$category_id");?>
	  <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>Equipo</th>
					<th>Seleccionar</th>
               </tr>
                <?php $i = 1; 
				if ($teams){
					foreach ($teams as $team):?>
						<tr> 
                        	<td><?php echo $team->e_name;?></td>
						<td><?php echo $team->e_id?></td>
							<?php $name0  = 'ids_en_array[' . $i. ']';?>
                        	<input type="hidden" name="<?php echo $name0;?>" value="<?php echo $team->e_id?>">
                        	
						<!-- Esto es para show -->
						<?php 
						$show_name = 'show[' . $i . ']';
						 
						//~ if ($team['show'] == 1){
							//~ $checked = TRUE;
							//~ }
						//~ else
						//~ {
							//~ $checked = FALSE;
						//~ }
								
						$checked = FALSE;

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
                      	 			
						</tr>
					<?php $i++; endforeach;?>
               <?php } ?>
            </table>
	
     <p><?php echo form_submit('submit', 'Agregar');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>
	
