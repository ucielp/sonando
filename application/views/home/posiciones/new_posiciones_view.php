 <div class="combo_box_wrapper">
            <?php $data = array('class' => 'fixture_form');
			echo form_open('posiciones/show_positions', $data);
                  echo form_dropdown('dropdown_events', $events);
            
                  $data_submit = array(
								  'name'        => 'mysubmit',
								  'class'          => 'submit_posiciones',
								  'value'       => 'Ver posiciones',
								);
                      echo form_submit($data_submit);
                
                    echo form_close();
                   ?>
                   
            </div> <!-- END COMBO_BOX_WRAPPER -->	

            </div> 
            </div> 


       
