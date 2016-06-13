                <div class="combo_box_wrapper">
                <?php $data = array('class' => 'fixture_form');
				echo form_open('fixture/ver_descenso', $data);
                                       $options = $categories;
                                
                                    
                      echo form_dropdown('dropdown_category', $options);
                
                      $data_submit = array(
								  'name'        => 'mysubmit',
								  'class'          => 'submit_fixture',
								  'value'       => 'Fixture',
								);
                      echo form_submit($data_submit);
                    
                        echo form_close();
                       ?>
                </div> <!-- END COMBO_BOX_WRAPPER -->	   
		</div> <!-- END CONTAINER -->
	</div> <!-- END WRAPPER -->