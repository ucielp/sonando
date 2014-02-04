<div class="fase_header">
	<h1>FASE <?php echo $category_name;?></h1>
</div>
<?php echo form_open('posiciones/ver_fase');
					   $options = $categories;
				
					
	  echo form_dropdown('dropdown_category', $options);

	  echo form_submit('mysubmit', 'Ver Tabla de Posiciones');
	
		echo form_close();
	   ?>
<div class="posiciones_wrapper">
	<div class="table_titles">
        <div class="col_1 pos_col"><p>Pos</p></div>
        <div class="col_2 pos_col"><p>Equipo</p></div>
        <div class="col_3 pos_col col_idem"><p>J</p></div>
        <div class="col_4 pos_col col_idem"><p>G</p></div>
        <div class="col_5 pos_col col_idem"><p>E</p></div>
        <div class="col_6 pos_col col_idem"><p>P</p></div>
        <div class="col_7 pos_col col_idem"><p>GF</p></div>
        <div class="col_8 pos_col col_idem"><p>GC</p></div>
        <div class="col_9 pos_col col_idem"><p>DG</p></div>
        <div class="col_10 pos_col"><p>Puntos</p></div>
    </div>
    <?php $i = 0; ?>
    <?php foreach($posiciones as $posicion):?>
    <div class="table_content">
		<div class="col_1 pos_col"><p><?php $i++; echo $i; ?></p></div>
        <div class="col_2 pos_col"><p><?php echo $posicion->name_equipo;?></p></div>
        <div class="col_3 pos_col col_idem"><p><?php echo $posicion->pj;?></p></div>
        <div class="col_4 pos_col col_idem"><p><?php echo $posicion->pg;?></p></div>
        <div class="col_5 pos_col col_idem"><p><?php echo $posicion->pe;?></p></div>
        <div class="col_6 pos_col col_idem"><p><?php echo $posicion->pp;?></p></div>
        <div class="col_7 pos_col col_idem"><p><?php echo $posicion->gf;?></p></div>
        <div class="col_8 pos_col col_idem"><p><?php echo $posicion->gc;?></p></div>
        <div class="col_9 pos_col col_idem"><p><?php echo $posicion->dg;?></p></div>
        <div class="col_10 pos_col"><p><?php echo $posicion->ptos;?></div>
    </div>
	<?php endforeach;?>
  <!--  
    <div class="table_content">
        <div class="col_1 pos_col"><p>1</p></div>
        <div class="col_2 pos_col"><p>La Gorda Mabel</p></div>
        <div class="col_3 pos_col col_idem"><p>1</p></div>
        <div class="col_4 pos_col col_idem"><p>1</p></div>
        <div class="col_5 pos_col col_idem"><p>1</p></div>
        <div class="col_6 pos_col col_idem"><p>1</p></div>
        <div class="col_7 pos_col col_idem"><p>1</p></div>
        <div class="col_8 pos_col col_idem"><p>1</p></div>
        <div class="col_9 pos_col col_idem"><p>1</p></div>
        <div class="col_10 pos_col"><p>3</div>
    </div>
     <div class="table_content">
        <div class="col_1 pos_col"><p>2</p></div>
        <div class="col_2 pos_col"><p>Wachiturros</p></div>
        <div class="col_3 pos_col col_idem"><p>1</p></div>
        <div class="col_4 pos_col col_idem"><p>1</p></div>
        <div class="col_5 pos_col col_idem"><p>1</p></div>
        <div class="col_6 pos_col col_idem"><p>1</p></div>
        <div class="col_7 pos_col col_idem"><p>1</p></div>
        <div class="col_8 pos_col col_idem"><p>1</p></div>
        <div class="col_9 pos_col col_idem"><p>1</p></div>
        <div class="col_10 pos_col"><p>6</div>
    </div>
    
     <div class="table_content">
        <div class="col_1 pos_col"><p>3</p></div>
        <div class="col_2 pos_col"><p>Rodilla y Hueso</p></div>
        <div class="col_3 pos_col col_idem"><p>1</p></div>
        <div class="col_4 pos_col col_idem"><p>1</p></div>
        <div class="col_5 pos_col col_idem"><p>1</p></div>
        <div class="col_6 pos_col col_idem"><p>1</p></div>
        <div class="col_7 pos_col col_idem"><p>1</p></div>
        <div class="col_8 pos_col col_idem"><p>1</p></div>
        <div class="col_9 pos_col col_idem"><p>1</p></div>
        <div class="col_10 pos_col"><p>2</div>
    </div>-->
</div>