<div class="fase_header">
	<h1> ZONA CAMPEONATO <?php echo $category_name;?></h1>
    <p>Fase de Grupo</p>
</div>
<?php echo form_open('fixture/ver_campeonato');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Fixture');
	
		echo form_close();
	   ?>

<div class="fixture_wrapper">
<?php $j = 1; foreach($fixture_grupos as $fixture):?>
	<div class="fixture_table_titles">
        <div class="fixture_col_1 pos_col"><p><?php echo "Grupo " . $j; ?></p></div>
        <div class="fixture_col_2 pos_col"><p>Resultado</p></div>
        <div class="fixture_col_3 pos_col"><p>Fecha</p></div>
        <div class="fixture_col_4 pos_col"><p>Horario</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha</p></div>
	 </div>
    <?php $i = 0; ?>
	<?php foreach($fixture as $partido): ?>
	<div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p><?php echo $partido->name_equipo1;?> <span style="color:#D1D1CF">vs</span> <?php echo $partido->name_equipo2;?></p></div>
        <div class="fixture_col_2 pos_col"><p><?php echo $partido->team1_res;?>: <?php echo $partido->team2_res;?></p></div>
        <div class="fixture_col_3 pos_col"><p><?php echo $partido->date;?></p></div>
        <div class="fixture_col_4 pos_col"><p><?php echo $partido->time;?></p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha <?php echo $partido->court;?></p></div>
    </div>
    <?php endforeach; $j++;?>
    
<?php endforeach;?>
</div>

<div class="fase_header">
	<h1>ZONA CAMPEONATO</h1>
    <p>Fase Eliminatoria</p>
</div>

<div class="fixture_wrapper">	
	<div class="fixture_table_titles">
        <div class="fixture_col_1 pos_col"><p>Semi-Final</p></div>
        <div class="fixture_col_2 pos_col"><p>Resultado</p></div>
        <div class="fixture_col_3 pos_col"><p>Fecha</p></div>
        <div class="fixture_col_4 pos_col"><p>Horario</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha</p></div>
	</div>
    <div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p>1º Grupo1 <span style="color:#D1D1CF">vs</span> 2º Grupo2</p></div>
        <div class="fixture_col_2 pos_col"><p>- : -</p></div>
        <div class="fixture_col_3 pos_col"><p>27-08-2011</p></div>
        <div class="fixture_col_4 pos_col"><p>13:00hs</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha 4</p></div>
    </div>
    <div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p>1º Grupo1 <span style="color:#D1D1CF">vs</span> 2º Grupo2</p></div>
        <div class="fixture_col_2 pos_col"><p>- : -</p></div>
        <div class="fixture_col_3 pos_col"><p>27-08-2011</p></div>
        <div class="fixture_col_4 pos_col"><p>13:00hs</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha 4</p></div>
    </div>
    
    <div class="fixture_table_titles">
        <div class="fixture_col_1 pos_col"><p>Final</p></div>
        <div class="fixture_col_2 pos_col"><p>Resultado</p></div>
        <div class="fixture_col_3 pos_col"><p>Fecha</p></div>
        <div class="fixture_col_4 pos_col"><p>Horario</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha</p></div>
	</div>
    <div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p>1º Grupo1 <span style="color:#D1D1CF">vs</span> 2º Grupo2</p></div>
        <div class="fixture_col_2 pos_col"><p>- : -</p></div>
        <div class="fixture_col_3 pos_col"><p>27-08-2011</p></div>
        <div class="fixture_col_4 pos_col"><p>13:00hs</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha 4</p></div>
    </div>
    
    <div class="fixture_table_titles">
        <div class="fixture_col_1 pos_col"><p>3er-4to Puesto</p></div>
        <div class="fixture_col_2 pos_col"><p>Resultado</p></div>
        <div class="fixture_col_3 pos_col"><p>Fecha</p></div>
        <div class="fixture_col_4 pos_col"><p>Horario</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha</p></div>
	</div>
    <div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p>1º Grupo1 <span style="color:#D1D1CF">vs</span> 2º Grupo2</p></div>
        <div class="fixture_col_2 pos_col"><p>- : -</p></div>
        <div class="fixture_col_3 pos_col"><p>27-08-2011</p></div>
        <div class="fixture_col_4 pos_col"><p>13:00hs</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha 4</p></div>
    </div>
</div>	   