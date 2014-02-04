
<?php 
		#esto para fixture comun
			echo 'Fecha '. $fixture[0]->nro_fecha;	
				echo "<br>";

	foreach($fixture as $partido):
				echo $partido->name_equipo1;
				echo " ";
				echo $partido->team1_res;
				echo " vs ";
				echo $partido->name_equipo2;
				echo " ";
				echo $partido->team1_res;
				echo $partido->date;
				echo " ";
				echo $partido->time;
				echo " ";
				echo $partido->court;
				echo " ";
				echo "<br>";
		endforeach;
	  
	  
	   ?>
       
      
	   
      <div class="posiciones_wrapper">
<?php 
#esto para fixture de GRUPO
$j = 1; foreach($fixture_grupos as $fixture):?>
	<div class="group_name">
		<p><?php echo "Grupo " . $j; ?></p>
    </div>
    <?php $i = 0; ?>
	<?php foreach($fixture as $partido):
				echo $partido->name_equipo1;
				echo " ";
				echo $partido->team1_res;
				echo " vs ";
				echo $partido->name_equipo2;
				echo " ";
				echo $partido->team1_res;
				echo $partido->date;
				echo " ";
				echo $partido->time;
				echo " ";
				echo $partido->court;
				echo " ";
				echo "<br>";
     endforeach; $j++;?>
    
<?php endforeach;?> 