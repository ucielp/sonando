<?php echo form_open('fixture/ver_fase');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Fixture');
	
		echo form_close();
	   ?>