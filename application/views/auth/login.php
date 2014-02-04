<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>
	<div id="menues">
        <div class="pageTitle"><h1>Ingresa al panel de Administración</h1></div>
        <div class="pageTitleBorder"></div>
            
        <div id="infoMessage"><?php echo $message;?></div>
        <?php $attributes = array('id' => 'form-login'); ?>
        <?php echo form_open("auth/login", $attributes);?>
            
          <p>
            <label for="email">Email:</label>
            <?php echo form_input($email);?>
          </p>
          
          <p>
            <label for="password">Password:</label>
            <?php echo form_input($password);?>
            <a href="<?php echo site_url('auth/forgot_password'); ?>"><u>Forgot Password</u></a>
          </p>
               
          <p>
              <label for="remember">Remember Me:</label>
              <?php echo form_checkbox('remember', '1', FALSE);?>
          </p>
          
          
          <p><?php echo form_submit('submit', 'Login');?></p>
    
          
        <?php echo form_close();?>
	</div>
</div>

</body>
</html>