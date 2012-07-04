<?php $this->load->view('includes/header_login'); ?>

<div class="page-header">
	<h1>Recordar contraseña</h1>
</div>

<p>Por favor dinos tu Email y te enviaremos un correo electrónico para que puedas resetear tu contraseña</p>

<?php if($message) :?>
<div id="infoMessage" class="alert alert-block">
	<p><?= $message;?></p>
</div>
<?php endif; ?>

<?php echo form_open("auth/forgot_password");?>

      <p>Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <div class="form-actions">
      	<?php echo form_submit('submit', 'Enviar', 'class="btn btn-primary"');?>
      </div>
      
<?php echo form_close();?>

<?php $this->load->view('includes/footer_login'); ?>