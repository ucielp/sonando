<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<h1>Change Password</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p>Old Password:<br />
      <?php echo form_input($old_password);?>
      </p>
      
      <p>New Password:<br />
      <?php echo form_input($new_password);?>
      </p>
      
      <p>Confirm New Password:<br />
      <?php echo form_input($new_password_confirm);?>
      </p>
      
      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', 'Change');?></p>
	  <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>

      
<?php echo form_close();?>

</div>
</body>
</html>