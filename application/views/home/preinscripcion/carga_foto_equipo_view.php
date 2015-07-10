    <div class="header_page">
           <h1>Información</h1>
           <h2><?php echo $team_name;?></h2>
    </div>
        
	<div class="preinscripcion_contenedor">
        <div id="infoMessage"><?php echo $message;?></div>

        <div id="header_cargar">
            <h1 id="tituloPrincipalCargar" class="indented">Cargá la foto de tu equipo</h1><br />
        </div>
        <?php 	$attributes = array('id' => 'formID_upload_equipo');
				echo form_open_multipart('libres/do_upload_foto_equipo', $attributes);
				
		?>
         <?php
        foreach ($equipo_info as $info):
		
		?>
        
        	<?php if ($info->historia != "") {?>
				<label for="text" class="error">Historia del Equipo: (opcional)<br /></label>
				<textarea name="text" id="textarea_info_equipo" ><?php echo $info->historia;?></textarea><br /> 
			<?php }else{ ?>
                <label for="text" class="error">Historia del Equipo: (opcional)<br /></label>
				<textarea name="text" id="textarea_info_equipo" ><?php echo $info->historia;?></textarea><br /> 
            <?php } ?>
            <label for="text" class="error">Foto del equipo: (opcional).&nbsp; 
			<?php if ($info->foto != 'silueta.jpg'){ ?>
			<a style="font-size:13px;text-decoration:none;font-weight:700;" href="<?php echo base_url(); ?>uploads/<?php echo $info->foto; ?>" > Ver foto</a>
            <?php }?>
			<br /><br /></label>
			<input type="file" name="userfile" size="20" /><br />
            <div id="camisetas">
                <div id="colores_a_ingresar">
                    <label for="text" class="error">Color Camisetas (opcional)<br /><br /></label>
                    <label for="text" class="error">Titular:<br /><br /></label>
                    <input type="hidden" name="color1" class="colors" size="7" value="<?php echo $info->titular_color1;?>" />
                    <input type="hidden" name="color2" class="colors" size="7" value="<?php echo $info->titular_color2;?>" /><br /><br />
                    <label for="text" class="error">Alternativa:<br /><br /></label>
                    <input type="hidden" name="color3" class="colors" size="7" value="<?php echo $info->alternativa_color1;?>" />
                    <input type="hidden" name="color4" class="colors" size="7" value="<?php echo $info->alternativa_color2;?>" /><br /><br />
                </div>
                <div id="colores_ingresados">
                    <label>Color Camisetas ya ingresados<br /><br /></label>
					<?php 
					$first = '<div class="';
					$second = '" style="background-color:';
					$third = '"></div>';
					?>
                    <div id="colores_titulares">
                    	<p>Titular</p>
						<?php
							if (!$info->titular_color1 & !$info->titular_color2){
								echo $first . "no-shirt" . $second . "grey" .  $third;
							}
							else if ($info->titular_color1 & $info->titular_color2){
								echo $first . "shirt-left" . $second . $info->titular_color1 . $third;
								echo $first . "shirt-right" . $second . $info->titular_color2 . $third;
							}							
							else{
								if ($info->titular_color1)
								{echo $first . "shirt" . $second . $info->titular_color1 . $third;}
								else 
								{echo $first . "shirt" . $second . $info->titular_color2 . $third;}
							}
						?>
                    </div>
                    <div id="colores_alternativas">
                        <p>Alternativa</p>
                       <?php
							if (!$info->alternativa_color1 & !$info->alternativa_color2){
								echo $first . "no-shirt" . $second . "grey" . $third;
							}
							else if ($info->alternativa_color1 & $info->alternativa_color2){
								echo $first . "shirt-left" . $second . $info->alternativa_color1 . $third;
								echo $first . "shirt-right" . $second . $info->alternativa_color2 . $third;
							}
							else{
								if ($info->alternativa_color1)
								{echo $first . "shirt" . $second . $info->alternativa_color1 . $third;}
								else 
								{echo $first . "shirt" . $second . $info->alternativa_color2 . $third;}
							}							

						?>
                    </div>
                </div>
            </div>
            <input type="submit" value="Subir" class="submit" />    
        </form>
		<?php endforeach;?>
	    <p><a href="<?php echo site_url('libres/preinscribir');?>">Volver</a></p>

  	</div>

<script type="text/javascript">
			
$(document).ready( function() {
	$('.colors').miniColors({
		change: function(hex, rgb) {
			$('#console').prepend('HEX: ' + hex + ' (RGB: ' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ')<br />');
		}
	});
	$('textarea').placehold();
	
});

</script>

	</div> <!-- END CONTAINER-->
</div> <!-- END WRAPPER -->