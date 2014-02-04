<?php $this->load->view('auth/header'); ?>

    <div class='mainInfo'>
        <div id="header_cargar">
            <h1 id="tituloPrincipalCargar" class="indented">Elegir equipo</h1>
        </div>
     <?php echo form_open_multipart("auth/cargar_sanciones_go");?>
     
     <h1>Por favor, ingrese los datos de los jugadores a continuación<br /></h1>

     <p>Juugador a sancionar<br/> </p>
     
    <p><?php echo form_dropdown('dropdown_jugadores', $jugadores);?>     </p>

	<div class="sanciones_fecha">
    	 <p>Cantidad de fechas sancionado<br />
          <?php echo form_input('sancion');?>
          </p>
	</div>
    <div class="sanciones_fecha">
    	 <p>Número de Fecha del torneo actual (la segunda fase arranca de la fecha 1 nuevamente)<br />
          <?php echo form_input('fecha');?>
          </p>
	</div>
		<div class="sanciones_motivo">
              <p>Motivo de la sanción<br />
              <?php echo form_input('observacion');?>
              </p>
              
              
          </div>
          
     <p><?php echo form_submit('submit', 'Cargar sanción');?></p>

	 <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
    <?php echo form_close();?>

  	</div>


</body>
</html>