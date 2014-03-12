        <div class="header_page">
            <h1>Equipos</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="equipos_all_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
        	<?php foreach ($categories as $category): ?>
            <table class="equipos_all">
                <thead>
                    <tr>
                        <th class="t"> <span style="text-transform:uppercase;"><?php echo $category->name; ?></span></th>
                    </tr>
                 </thead>
             	<tbody>
                	<?php $i = 0; ?>
                   
                    <?php for ($j = 0; $j < sizeof($equipos[$category->id]); $j++) {?>
                   <tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
                        <td class="t"><a href="<?php echo base_url();?>equipos/equipo/<?php echo  $equipos[$category->id][$j]->id;?>"><?php echo $equipos[$category->id][$j]->name; ?></a></td>
	               </tr>
                   <?php $i++; } ?>
                   
				</tbody>
			</table>
            
            <?php endforeach; ?>
            
        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
