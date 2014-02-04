	<div class="header_page">
     	 <h1>Jugadores Inscriptos</h1>
         <h2><?php echo $team_name;?></h2>
    </div>
        
	<div class="preinscripcion_contenedor">
    
        <div id="infoMessage"><?php echo $message;?></div>
           <?php if ($players) {?>
        <table cellpadding=0 cellspacing=10>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Obra Social</th>
                <th>Certificado</th>
                <th>Electro</th>
            </tr>
        <?php 
			foreach ($players as $user):?>
            <tr>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['last_name']?></td>
                <td><?php echo $user['dni'];?></td>
                <td><?php echo $user['birth'];?></td>
                <td><?php echo $user['address'];?></td>
                <td><?php echo $user['phone'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['obra_social'];?></td>
                <td><?php if ($user['certificado'] == 1){
                     echo "Si";
                    }
                    else{
                     echo "No";
                    }?>
                </td>
                <td><?php if ($user['electro'] == 1){
                         echo "Si";
                        }
                        else{
                         echo "No";
                        }?>
                </td>
            </tr>
        <?php endforeach;
		 }#termino el if
		 else{
         	 ?>  <p><h1>No hay jugadores habilitados</h1> </p>
					  <?php }	 
						 
		?> 
        </table>  
                

        <p><a href="<?php echo site_url('inscripcion/preinscribir');?>">Volver</a></p>

	</div>
    
	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->
