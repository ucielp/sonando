<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Información del torneo </h1>
	
	<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open("auth/generar_torneo_byid_go/$category_id");?>
    
     <h2>
          <?php
            echo "El torneo es de tipo: '$data_category->tipo'<br>";
            echo "Se va a generar la tabla de posiciones y el fixture con estos equipos."
          ?>
      </h2>
      <table cellpadding=0 cellspacing=5>
            <tr>
                <th>Equipo</th>
                <th>Orden</th>
           </tr>
            <?php
            if ($teams){
                foreach ($teams as $team):?>
                    <tr> 
                        <td><?php echo $team->nombre_equipo;?></td>
                        <td><?php echo $team->el_orden;?></td>
                        
                    </tr>
                <?php endforeach; }?>
        </table>
     <p><?php echo form_submit('submit', 'Generar torneo');?></p>
	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
     
    <?php echo form_close();?>

</div>

</body>
</html>
	
