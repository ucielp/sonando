        <div class="container">
		<div class="header_page">
            <h1>Equipos</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="equipos_all_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
				<?php $j = 0; ?>
        		<?php $i = 0; ?>
			<table class="equipos_all">

        	<?php foreach ($equipos_activos as $equipo): ?>
				<tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url();?>equipos/equipo/<?php echo  $equipo->id;?>"><?php echo $equipo->e_name; ?></a></td>
	               </tr>
	               
        	<?php  $i++; endforeach; ?>
			

        	<table class="equipos_all">
				
	           			</table>    

        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
