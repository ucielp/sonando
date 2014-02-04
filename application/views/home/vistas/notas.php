		<div class="header_page">
            <h1>Notas</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="notas_contenedor">
        	<?php 
			if ($notas){
				foreach($notas as $nota): ?>
				<div class="nota" id ="nota_<?php echo $nota->id_nota;?>"> <!-- PRINCIPIO DE LA NOTA -->
					<div class="nota_info">
						<div class="nota_autor">
							<h2><?php echo $nota->username;?></h2>
						</div>
						<div class="nota_fecha">
							<h2><?php echo $nota->fecha; ?></h2>
						</div>
					</div>
					<div class="nota_header">
						<h1><?php echo $nota->titulo; ?></h1>
					</div>
					<div class="nota_imagen_audio">
						<div class="nota_imagen">
								<?php if($nota->foto == ''){
									echo "";
										}
								else {?>
									<img src="<?php
									echo base_url();?>uploads/notas/<?php echo $nota->foto; ?>" />
								<?php }?>
						</div>
						<div class="nota_audio">
								 <?php if($nota->audio == ''){
									echo "";
										}
								else {?>
							<a href="<?php echo base_url(); ?>uploads/notas/<?php echo $nota->audio; ?>"><img src="<?php echo base_url(); ?>images/notas/audio.png" /></a>
							  <?php }?>
						</div>
					</div>
					<div class="nota_texto">
						<?php echo $nota->texto;?>
					</div>
                        </br>

					<div class="fb-like" data-href="http://www.sonandoconelgol.com.ar/notas#nota_<?php echo $nota->id_nota;?>" data-send="false" data-width="450" data-show-faces="true" data-font="lucida grande"></div>
					<div class="nota_separador">
						<img src="<?php echo base_url(); ?>images/notas/separador.png" />
					</div>
				</div> <!-- FIN DE LA NOTA -->
				<?php endforeach;  ?>
           <?php  } 
			else {?> 
				<div class="nota_separador">
            	    <div class="nota_header">
						<h1><?php echo"" ?></h1>
					</div>
						<img src="<?php echo base_url(); ?>images/notas/separador.png" />
					</div>
			<?php } ?>
            
            <center><?php echo $this->pagination->create_links(); ?></center>
            

        </div>
        
        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
        