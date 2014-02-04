<?php $this->load->view('auth/header'); ?>

    <div class='mainInfo'>
        <div id="header_cargar">
            <h1 id="tituloPrincipalCargar" class="indented">CARGÁ <span>TU NOTA</span></h1>
        </div>
        <div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart("auth/cargar_nota");?>
              <p>Título:<br />
              <?php echo form_input('titulo');?>
              </p>
              
              <p>Texto:<br />
              <textarea name="texto" id="texto"></textarea>
              </p>
       
              <p>Foto:<br />
              <?php echo form_upload('foto');?>
              </p>
        
              <p>Audio:<br />
              <?php echo form_upload('audio');?>
              </p>

      <p><?php echo form_submit('submit', 'Cargar');?></p>

     
    <?php echo form_close();?>

	    <p><a href="<?php echo site_url('auth');?>">Volver</a></p>

  	</div>


</body>
</html>

