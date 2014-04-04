<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<div id="menues">
<h1>Panel</h1>
		<div id="infoMessage"><?php echo $message;?></div>
		<h1>Nuevos items</h1>
		<p><a href="<?php echo site_url('auth/create_modify_category_new'); ?>">Crear, modificar y eliminar <b>categorías</b></a></p>
		<p><a href="<?php echo site_url('auth/create_modify_events'); ?>">Crear, modificar y eliminar <b>eventos</b></a></p>
		<p><a href="<?php echo site_url('auth/asignar_categorias_new'); ?>">Asignar evento a cada equipo</a></p>	
        <p><a href="<?php echo site_url('auth/generar_torneos'); ?>">Generar Torneo (todos contra todos)</a></p>
        <p><a href="<?php echo site_url('auth/create_team_new'); ?>">Crear equipos</a></p>
		<p><a href="<?php echo site_url('auth/set_horario_new'); ?>">Definir horario de eventos</a></p>
		<p><a href="<?php echo site_url('auth/set_results_new'); ?>">Cargar Resultados de eventos</a></p>
		<p><a href="<?php echo site_url('auth/swap_teams'); ?>">Intercambiar equipos </a></p>
		<p><a href="<?php echo site_url('auth/mostrar_categorias_new'); ?>">Inscribir jugadores</a></p>


        <h1>Comienzo del torneo</h1>
		<p><a href="<?php echo site_url('auth/create_category'); ?>">Crear categoría <b>OBSOLETO</b></a></p>
		<p><a href="<?php echo site_url('auth/mostrar_categorias'); ?>">Inscribir jugadores</a></p>
        <p><a href="<?php echo site_url('auth/create_team'); ?>">Crear equipos</a></p>
		<p><a href="<?php echo site_url('auth/asignar_categorias'); ?>">Asignar Categoría <b>OBSOLETO</b></a></p>	
        <p><a href="<?php echo site_url('auth/generar_fases'); ?>">Generar Torneo de Fases <b>OBSOLETO</b></a></p>
        <p><a href="<?php echo site_url('auth/change_name_teams'); ?>">Cambiar nombre equipo</a></p>
		<p><a href="<?php echo site_url('auth/create_match'); ?>">Generar partido manualmente (T verano) <b>OBSOLETO</b></a></p>


        
        <h1>Segunda parte del torneo</h1>
         <p><a href="<?php echo site_url('auth/set_tournament'); ?>">Modificar que mostrar en Fixture y Posiciones para las distintas partes del torneo <b>OBSOLETO</b></a></p>
        <p><a href="<?php echo site_url('auth/generar_campeones_grupos'); ?>">Generar Copa de Campeones temporal <b>OBSOLETO</b></a></p>
		<p><a href="<?php echo site_url('auth/generar_campeonato_grupos'); ?>">Generar Zona Campeonato temporal <b>OBSOLETO</b></a></p>
		<p><a href="<?php echo site_url('auth/generar_descenso'); ?>">Generar Zona Descenso temporal <b>OBSOLETO</b></a></p>
        <p><a href="<?php echo site_url('auth/generar_repechaje_grupos'); ?>">Generar Repechaje temporal <b>OBSOLETO</b></a></p>
        <p><a href="<?php echo site_url('auth/generar_postfase'); ?>">Generar Torneos de Grupo para CC Camp Rpechaje y Desc <b>OBSOLETO</b></a></p>
        
        <h1>Tercera parte del torneo (eliminatoria)</h1>
		<p><a href="<?php echo site_url('auth/generar_campeones_cuartos'); ?>">Generar cuartos de final de Copa de Campeones <b>OBSOLETO</b></a></p>
		<p><a href="<?php echo site_url('auth/generar_campeonato_semis'); ?>">Generar semifinales Campeonatos <b>OBSOLETO</b></a></p>

        <h1>Para todas las fechas (horarios, resultados y goles)</h1>
		<p><a href="<?php echo site_url('auth/fecha_actual'); ?>">Definir Fecha actual</a></p>
		<p><a href="<?php echo site_url('auth/set_horario'); ?>">Definir horario de liga</a></p>
		<p><a href="<?php echo site_url('auth/set_horario_elim'); ?>">Definir horario de eliminatoria</a></p>

        <p><a href="<?php echo site_url('auth/set_results_elim'); ?>">Cargar Resultados de eliminatoria</a></p>
		<p><a href="<?php echo site_url('auth/modificar_tabla'); ?>">Modificar tabla posiciones  <b>(caso excepcional)</b></a></p>
	   	<p><a href="<?php echo site_url('auth/partidos_por_horario'); ?>">Ver cantidad de partidos por horario</a></p>

        
		<h2>Fin del torneo (CUIDADO, se van a borrar todos los datos del torneo)</h2>
       
       	<p><a href="<?php echo site_url('auth/pre_clean_db'); ?>">Borrar todos los datos del torneo</a></p>


        <h1>Notas</h1>
        <p><a href="<?php echo site_url('auth/cargar_nota'); ?>">Cargar una nota</a></p>
		<p><a href="<?php echo site_url('auth/cargar_sanciones_equipo'); ?>">Cargar sanciones</a></p>
        
        <h1>Otros</h1>
        <p><a href="<?php echo site_url('auth/preview_mail'); ?>">Enviar Mail de PreInscripcion</a></p>
		<p><a href="<?php echo site_url('auth/change_password'); ?>">Change Password</a></p>
        
		
			<table cellpadding=0 cellspacing=10>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo $user['first_name']?></td>
                        <td><?php echo $user['last_name']?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php echo $user['group_description'];?></td>
                        <td><?php echo ($user['active']) ? anchor("auth/deactivate/".$user['id'], 'Active') : anchor("auth/activate/". $user['id'], 'Inactive');?></td>
                        <td><?php echo (anchor("auth/edit_user/".$user['id'], 'Edit'));?></td>
                    </tr>
                <?php endforeach;?>
            </table>
		<p><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a></p>
		
		<p><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></p>
        
	</div>
	<br />
	<br />
	
	
	
</div>

</body>
</html>
