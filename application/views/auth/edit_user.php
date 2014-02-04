<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	<h1>Editar Usuario</h1>
	<p>Ingresa la información del usuario que quieras cambiar o no apliques cambios en los campos.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	<?php
	// Estas 2 consultas las hago para llenar los campos del formulario por si no quiero cambiarlos y asi proveo de la info al usuario
	$this->db->select('email');
	$this->db->where('id', $this->uri->segment(3));
	$q1 = $this->db->get('users');
	foreach ($q1->result() as $row)
	{
   	   $email = $row->email;
	}
	
	$this->db->select('*');
	$this->db->where('id', $this->uri->segment(3));
	$q2 = $this->db->get('meta');
	foreach ($q2->result() as $row)
	{
	   $fname = $row->first_name;
	   $lname = $row->last_name;
   	   $cname = $row->company;
   	   $phone = $row->phone;
	}
	$phone1 = substr($phone, 0,3);
	$phone2 = substr($phone, 4, 3);
	$phone3 = substr($phone, 8);
		?>

    <?php echo form_open("auth/edit_user/".$this->uri->segment(3));?> 
      <p>First Name:<br />
      <?php echo form_input('first_name',$fname);?>
      </p>
      
      <p>Last Name:<br />
      <?php echo form_input('last_name',$lname);?>
      </p>
      
	  <p>Company Name:<br />
      <?php echo form_input('company',$cname);?>
      </p>
      
      <p>Email:<br />
      <?php echo form_input('email',$email);?>
      </p>
      
      <p>Phone:<br />
      <?php echo form_input('phone1',$phone1);?>-<?php echo form_input('phone2',$phone2);?>-<?php echo form_input('phone3',$phone3);?>
      </p>
      
     <!-- <p>
      	<input type=checkbox name="reset_password"> <label for="reset_password">Reset Password</label>
      </p> -->
      
	  <?php echo form_hidden('id',$this->uri->segment(3)); ?>
 	  <?php echo form_submit('submit', 'Actualizar');?>

      
    <?php echo form_close();?>
	
    <p><a href="<?php echo site_url('auth');?>"><u>Go Back</u></a></p>


</div>

</body>
</html>