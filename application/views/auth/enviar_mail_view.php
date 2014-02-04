<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

<div id="infoMessage"><?php echo $message;?></div>
	
    <?php #s echo form_open("auth/enviar_mail");?>
      <h1>Enviar mail</h1>
      <?php foreach ($details as $detail): ?>
           <?php echo "El mail fue enviado a:" . $detail->user . " " . $detail->email;
	?>
    <br>
       
     <?php endforeach; ?>
     <p><?php # echo form_submit('submit', 'Enviar');?>
    <?php #echo form_close();?>
</div>

</body>
</html>