<div class="fase_header">
	<h1>COPA DE CAMPEONES</h1>
    <p>Fase de Grupo</p>
</div>

<div class="posiciones_wrapper">
<?php $j = 1; foreach($pos_grupos as $grupo):?>
	<div class="group_name">
		<p><?php echo "Grupo " . $j; ?></p>
    </div>
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
	<?php foreach($grupo as $posicion):?>
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
    <?php endforeach; $j++;?>
    
<?php endforeach;?>
</div>

<div class="fase_header">
	<h1>COPA DE CAMPEONES</h1>
    <p>Fase Eliminatoria</p>
</div>

<div id="campeones_elim">	
	<img id="campeones_chart" src="<?php echo base_url(); ?>img/campeones/campeones_elim.png" />
    <div id="first_row">
    	<div id="row1_col1">
        	<div id="row1_col1_1">
            	<p>1 G1</p>
            </div>
            <div id="row1_col1_2">
            	<p>2 G4</p>
            </div>
        </div>
        <div id="row1_col2">
        	<div id="row1_col2_1">
                <div id="row1_col2_1a">
                    <p>SEMI 1</p>
                </div>
                <div id="row1_col2_1b">
                    <p>SEMI 2</p>
                </div>
             </div>
            <div id="row1_col2_2">
            	<p>FINALISTA 1</p>
            </div>
        </div>
        <div id="row1_col3">
        	<div id="row1_col3_1">
            	<p>1 G1</p>
            </div>
            <div id="row1_col3_2">
            	<p>2 G4</p>
            </div>
        </div>
    </div>
    <div id="second_row">
    	<div id="row2_col1">
        	<div id="row2_col1_1">
            	<p>1 G1</p>
            </div>
            <div id="row2_col1_2">
            	<p>2 G4</p>
            </div>
        </div>
        <div id="row2_col2">
            <div id="row2_col2_1">
            	<p>FINALISTA 2</p>
            </div>
            <div id="row2_col2_2">
                <div id="row2_col2_2a">
                    <p>SEMI 1</p>
                </div>
                <div id="row2_col2_2b">
                    <p>SEMI 2</p>
                </div>
             </div>
             <div id="row2_col2_3">
             	<p>3ER PUESTO</p>
             </div>
        </div>
        <div id="row2_col3">
        	<div id="row2_col3_1">
            	<p>1 G1</p>
            </div>
            <div id="row2_col3_2">
            	<p>2 G4</p>
            </div>
        </div>
    </div>
    <div id="last_row">
    	<p>4TO PUESTO</p>
    </div>
</div>    
