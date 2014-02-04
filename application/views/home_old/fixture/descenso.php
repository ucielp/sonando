<?php echo form_open('fixture/ver_descenso');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Fixture');
	
		echo form_close();
	   ?>