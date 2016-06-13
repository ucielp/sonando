<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Ver cantidad de partidos por horario</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
		
        <table class="horarios_admin">
                <thead>
                    <tr>
                        <th class="o">Hora</th>
                        <th class="o">Cant de Partidos</th>
                    </tr>
                 </thead>
             	<tbody>

                	<?php foreach($horarios as $horario):?>
					 <tr> 
                     	<td class="t"><?php echo $horario->time;?></td> 
                        <td class="t"><?php echo $horario->count_time;?></td> 

                     </tr>
                      	
                   <?php endforeach;?>
		<a href="<?php echo site_url('auth/partidos_por_horario');?>"><u>Go Back</u></a>

      			</center>

    <?php echo form_close();?>

</div>

</body>
</html>