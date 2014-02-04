<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style type="text/css">
table.tableizer-table {border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif; font-size: 10px;} .tableizer-table td {padding: 3px; margin: 3px; border: 1px solid #ccc;}
.tableizer-table th {background-color: #E6E6E6;  font-weight: bold;  font-size: 20px; height:30px }
.name td {background-color: #848484; color: #FFF; font-weight: bold ; }
.relleno td {height:20px}
.resultado td {height:20px; font-size: 15px; }


</style>

<table class="tableizer-table">
<!-- tr class="tableizer-firstrow"-->
 <tr>
    <th colspan = 12><?php echo $type . " " . $category . $name;?></th>
  </tr>
 <tr>
    <th colspan = 6><?php echo $equipo1_name;?></th>
    <th colspan = 6><?php echo $equipo2_name;?></th>
  </tr>
<tr class="name"><td>N°</td><td>Nombre</td><td>DNI</td><td>Fecha Nac</td><td>Elec/Cert</td><td>Firma</td><td>N°</td><td>Nombre</td><td>DNI</td><td>Fecha Nac</td><td>Elec/Cert</td><td>Firma</td></tr> 
<?php 

	$max_cant = max(count($players_team1),count($players_team2));
	if (count($players_team1) >= count($players_team2)){
		$k = 0;
		foreach($players_team1 as $player1):
			if ($player1->inscripto){
				$habilitado_open = "<b>";
				$habilitado_close = "</b>";
			}
			else 
			{
				$habilitado_open = "<strike>";
				$habilitado_close = "</strike>";		
			}	
			echo "<tr>";
			echo "<td>.</td><td>$habilitado_open " . ucfirst($player1->nombre) . " " . ucfirst ($player1->apellido) ."$habilitado_close</td><td>$player1->dni</td><td>$player1->birth</td><td>"; 
			if($player1->electro) { echo "Si";} else {echo "No";} 
			echo  "/";
			if($player1->certificado) { echo "Si";} else {echo "No";}
			echo "</td><td width = 100px>.</td><td>.</td>";
			if($k < count($players_team2)){
				if ($players_team2[$k]->inscripto){
					$habilitado_open = "<b>";
					$habilitado_close = "</b>";
				}
				else 
				{
					$habilitado_open = "<strike>";
					$habilitado_close = "</strike>";		
				}	
				echo "<td>$habilitado_open" . ucfirst($players_team2[$k]->nombre) . " " . ucfirst($players_team2[$k]->apellido) . "$habilitado_close</td>";
				echo "<td>" . $players_team2[$k]->dni . "</td><td>" . $players_team2[$k]->birth . "</td><td>";
				if($players_team2[$k]->electro) { echo "Si";} else {echo "No";} 
				echo  "/";
				if($players_team2[$k]->certificado) { echo "Si";} else {echo "No";}
				echo "</td><td width = 100px>.</td>";
			
				$k++;
			}
			else{
				echo "<td width = 100px>.</td><td width = 80px>.</td><td>.</td><td>.</td><td width = 100px>.</td></tr>";
			}	
		endforeach;
	}
	else{

		$k = 0;
		foreach($players_team2 as $player2):
			echo "<tr><td>.</td>";
			if($k < count($players_team1)){
				if ($players_team1[$k]->inscripto){
					$habilitado_open = "<b>";
					$habilitado_close = "</b>";
				}
				else 
				{
					$habilitado_open = "<strike>";
					$habilitado_close = "</strike>";		
				}	
				echo "<td>$habilitado_open" . ucfirst($players_team1[$k]->nombre) . " " . ucfirst($players_team1[$k]->apellido) . "$habilitado_close</td>";
				echo "<td>" . $players_team1[$k]->dni . "</td><td>" . $players_team1[$k]->birth . "</td><td>";
				if($players_team1[$k]->electro) { echo "Si";} else {echo "No";} 
				echo  "/";
				if($players_team1[$k]->certificado) { echo "Si";} else {echo "No";}
				echo "</td><td width = 100px>.</td>";
			
				$k++;
			}
			else{
				echo "<td width=100px>.</td><td width=80px>.</td><td>.</td><td>.</td><td width = 100px>.</td>";
			}
			if ($player2->inscripto){
				$habilitado_open = "<b>";
				$habilitado_close = "</b>";
			}
			else 
			{
				$habilitado_open = "<strike>";
				$habilitado_close = "</strike>";		
			}		
			echo "<td>.</td><td>$habilitado_open" . ucfirst($player2->nombre) . " " . ucfirst ($player2->apellido) ."$habilitado_close</td><td>$player2->dni</td><td>$player2->birth</td><td>"; 
			if($player2->electro) { echo "Si";} else {echo "No";} 
			echo  "/";
			if($player2->certificado) { echo "Si";} else {echo "No";}
			echo "</td><td width = 100px>.</td></tr>";
			
		endforeach;
	}		
	#genero filas vacias hasta completar 17
	for($i=0;$i<17-$max_cant;$i++){
		echo "<tr  class='relleno'><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td></tr>";
	}

	?>

<tr><td>Amar.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>Amar.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td></tr> 
<tr><td>Rojas</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>Rojas</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td></tr> 
<tr><td>Goles</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>Goles</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td></tr> 
<tr  class='resultado'><td>.</td><td colspan = 5>Resultado:</td><td>.</td><td colspan = 5>Resultado:</td></tr> 
</table>

<h3>
<?php
if ($cancha == 0){
	$cancha = "&nbsp;&nbsp;&nbsp;";
	}

echo "Cancha: $cancha - ";
	echo "Hora: $hora hs";
	?>	</p>

