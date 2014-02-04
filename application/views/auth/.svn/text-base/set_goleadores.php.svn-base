<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Cargar Goleadores</h1>
	
	<div id="infoMessage"><?php echo $message;?></div>   
        <?php echo form_open("auth/set_goleadores_go");?>

    <table class="goleadores_admin" align="center">
    <thead>
                    <tr>
                        <th class="equipo">Equipo1</th>
                        <th class="goleador">Goles</th>
                        <th class="equipo">Equipo2</th>
                        <th class="goleador">Goles</th>
                        
                    </tr>
                 </thead>
    <?php 	$i = 1;
			$gol = 0; 
			foreach ($partidos_id as $partido_id)
	{
		if ($cargados[$i]){
				#"NO MOSTRAR NADA";
			}
			else{
				if ($perdidos[$i]){
					#"PERDIERON AMBOS";
				}
				else{
										?>
										<tr>  
							<td class="equipo"><?php echo $equipo1_name[$partido_id];?> </td>
							   <td class="goleador">
							  <?php 
								if ($result1[$i] > 0 ){ 
								$res1 = $result1[$i];
									for ($a= 0; $a < $res1; $a++){ 
										$name  = 'players[' . $gol . ']';
										
										?> 
										<?php echo form_dropdown($name,$players_team1[$partido_id],0);?> <br>
										 <?php
										$gol++;
									}
								}
									  
							 else {
								  echo "No hay goles";
							 }
								?>
								 </td>
					
							  <td class="equipo"><?php echo $equipo2_name[$partido_id];?> </td>
							 <td class="goleador">
							 <?php 
						   
								if ($result2[$i] > 0){ 
								$res2 = $result2[$i];
									for ($b= 0; $b < $res2; $b++){ 
										$name  = 'players[' . $gol . ']';
										?>
										<?php echo form_dropdown($name,$players_team2[$partido_id],0);?>  
										<?php
										$gol++;
									}
									
								}
								else {
									  echo "No hay goles";
									  }
									
								?>
									 </td>
							 <?php 
							 ?>
							</tr>
			
				<?php }
			}
		$i++
		?> 
		<?php
	};?>
    </table>
    
  
        <!-- <?php echo "" . ( ($i & 1) ? '"<br>"' : '  ' );?>-->
	
     <p><?php echo form_submit('submit', 'Cargar goleadores');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>
      
    <?php echo form_close();?>

</div>

</body>
</html>