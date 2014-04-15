<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>

    
    <div class="preinscripcion_contenedor">	
        <div id="menu_preinscripcion">

			<table class="fixture">
                <thead>
                    <tr>
						<th>Evento</th>
                        <th>Equipo1</th>
                        <th>Equipo2</th>
                        <th>Horario</th>
                        <th>Cancha</th>

                    </tr>
                 </thead>
             	<tbody>
                	<?php $i=1; foreach($partidos as $partido):?>
                    <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
						<td class="t"><?php echo $partido->name_event;?></td>
                        <td class="t"><?php echo $partido->equipo1;?></td>
                        <td class="t"><?php echo $partido->equipo2;?></td>
                        <td class="o"><?php echo $partido->horario;?></td>
                        <td class="o"><?php echo $partido->cancha;?></td>
	               </tr>
                   <?php $i++; endforeach;
				   ?>
				</tbody>
			</table>     
			    
    </div>
	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->

</body>
</html>
                   
          
