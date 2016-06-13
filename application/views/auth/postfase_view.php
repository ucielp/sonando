<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Definir equipo y torneo</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/postfase_go");?>
	  <table cellpadding=0 cellspacing=5>
                <tr>
                    <th>ID</th>
					<th>Equipo</th>
                    <th>Torneo</th>
                    <th>Categ</th>
                    <th>Nombre</th>
                     <th>Nuevo Torneo</th>

                </tr>
                <?php $i = 0; 
				if ($post_fase){
					foreach ($post_fase as $fase):?>
						<tr> 
                        	<td><?php echo $fase->f_id;?></td>
							<td><?php echo $fase->e_name;?></td>
                            <td><?php echo $fase->t_type;?></td>
                            <td><?php echo $fase->t_category;?></td>
                            <td><?php echo $fase->t_name;?></td>
                            
                            <td><?php $name  = 'dropdown[' . $fase->f_id . ']';
							echo form_dropdown($name,$tournament,$fase->t_id);
                            
							$elec_name = 'hid[' . $fase->f_id .  ']';
							$f_id = array(
							'name'  => $elec_name,
							'value' => $fase->f_id,
							'checked'     =>  'true',
							'type'     =>  'hidden',
						);
						?> <td><?php echo form_input($f_id);?>
                            
                            </td>
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