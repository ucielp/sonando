				<div class="combo_box_wrapper">
				<?php echo form_open('posiciones/ver_fase');
									   $options = $categories;
								
									
					  echo form_dropdown('dropdown_category', $options);
				
					  	  $data_submit = array(
								  'name'        => 'mysubmit',
								  'class'          => 'submit_posiciones',
								  'value'       => 'Ver Posiciones',
								);
                      echo form_submit($data_submit);

					
						echo form_close();
					   ?>
	   
                </div> <!-- END COMBO_BOX_WRAPPER -->	   
		</div> <!-- END CONTAINER -->
	</div> <!-- END WRAPPER -->