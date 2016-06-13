<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<?php if ($teams) {?>
	<div id="infoMessage"><?php echo "El torneo FASE para la categoría " . $categoria . " fue creado";?></div>   
    <h1>Equipos</h1>
   <table cellpadding=0 cellspacing=10>
    	<tr>
      	 <th>Nombre</th>
	</tr>
    
	<?php 
	foreach ($teams as $team):?>
	    <tr><td><?php echo $team['name']?></td> </tr>
	                
	<?php endforeach;
	}
	else{?> 
		  <h1>No hay ningun equipo. No se puede generar el torneo</h1>
	<?php	}
	?> 
   
    </table>
    
     
	 <p><a href="<?php echo site_url('auth/generate_tournament');?>"><u>Go Back</u></a></p>

      

</div>

</body>
</html>