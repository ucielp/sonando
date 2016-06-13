<?php $this->load->view('auth/header'); ?>

    <div class='mainInfo'>
        <div id="header_cargar">
            <h1 id="tituloPrincipalCargar" class="indented">CARGÁ <span>TU NOTICIA</span></h1>
        </div>
        <?php 	$attributes = array('id' => 'form-noticia');
				echo form_open_multipart('auth/do_upload', $attributes);
		?>
        	<label for="title" class="error">Título<br /></label>
            <input name="title" id="title" class="input_col required" placeholder="Titulo de la noticia" />
            <label for="text" class="error">Texto<br /></label>
			<textarea name="text" id="text" class="input_col required" placeholder="Texto de la noticia" ></textarea>
            <input type="file" name="userfile" size="20" />
            <input type="submit" value="upload" class="submit" />    
        </form>

	    <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

  	</div>


</body>
</html>