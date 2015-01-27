<?php $this->load->view('includes/header_login'); ?>

<div class="page-header">
	<h1>Cambiar contraseña</h1>
</div>

<?php if($message) :?>
<div id="infoMessage" class="alert alert-block">
	<p><?= $message;?></p>
</div>
<?php endif; ?>

<?php echo form_open("auth/change_password");?>

      <p>
      	<label>Antigua contraseña:</label>
      	<?php echo form_input($old_password);?>
      </p>
      
      <p>
      	<label>Nueva contraseña <small>(Al menos <?php echo $min_password_length;?> caracteres)</small>:</label>
      	<?php echo form_input($new_password);?>
      </p>
      
      <p>
      	<label>Confirma nueva contraseña:</label>
      	<?php echo form_input($new_password_confirm);?>
      </p>
      
       <div class="form-actions">
      	<?php echo form_input($user_id);?>
      	<?php echo form_submit('submit', 'Cambiar', 'class="btn btn-primary"');?>
      </div>

      
<?php echo form_close();?>

<?php $this->load->view('includes/footer_login'); ?>
