<div class="fase_header">
	<h1>ZONA DESCENSO <?php echo $category_name;?></h1>
</div>
<?php echo form_open('fixture/ver_descenso');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Fixture');
	
		echo form_close();
	   ?>

<div class="fixture_wrapper">
	<div class="fixture_table_titles">
        <div class="fixture_col_1 pos_col"><p>Grupo 1</p></div>
        <div class="fixture_col_2 pos_col"><p>Resultado</p></div>
        <div class="fixture_col_3 pos_col"><p>Fecha</p></div>
        <div class="fixture_col_4 pos_col"><p>Horario</p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha</p></div>
	 </div>
    <?php foreach($fixture as $partido):?>
	<div class="fixture_table_content">
        <div class="fixture_col_1 pos_col"><p><?php echo $partido->name_equipo1;?> <span style="color:#D1D1CF">vs</span> <?php echo $partido->name_equipo2;?></p></div>
        <div class="fixture_col_2 pos_col"><p><?php echo $partido->team1_res;?>: <?php echo $partido->team2_res;?></p></div>
        <div class="fixture_col_3 pos_col"><p><?php echo $partido->date;?></p></div>
        <div class="fixture_col_4 pos_col"><p><?php echo $partido->time;?></p></div>
        <div class="fixture_col_5 pos_col"><p>Cancha <?php echo $partido->court;?></p></div>
    </div>
    <?php endforeach;?>
</div>