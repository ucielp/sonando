<?php echo form_open('posiciones/ver_campeonato');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Tabla de Posiciones');
	
		echo form_close();
	   ?>