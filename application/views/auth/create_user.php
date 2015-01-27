<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Crear usuarios:</h1>
	<?= anchor("auth/", '<i class="icon-arrow-left icon-white"></i> Volver', array('title' => 'Volver al listado de usuarios', 'class' => 'btn btn-primary btn-large btn-top-right')); ?></header>

<?php if($message) : ?>
	<div class="alert alert-error" id="infoMessage">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= $message ?></p>
	</div>
<?php endif; ?>

	
    <?php echo form_open("auth/create_user");?>
      <p>
	      <label>Nombre:</label>
	      <?php echo form_input($first_name);?>
      </p>
      
      <p>
	      <label>Apellidos:</label>
	      <?php echo form_input($last_name);?>
      </p>
      
      <p>
	      <label>Empresa:</label>
	      <?php echo form_input($company);?>
      </p>
      
      <p>
      	<label>Email:</label>
      	<?php echo form_input($email);?>
      </p>
      
      <p>
      	<label>Teléfono:</label>
      	<?php echo form_input($phone);?>
      </p>
      
      <p>
      	<label>Contraseña:</label>
      	<?php echo form_input($password);?>
      </p>
      
      <p>
      	<label>Repite contraseña:</label>
      	<?php echo form_input($password_confirm);?>
      </p>
      
      <div class="form-actions">
      	<?php echo form_submit('submit', 'Crear usuario', 'class="btn btn-primary"');?>
      </div>
            
    <?php echo form_close();?>

<?php $this->load->view('includes/footer'); ?>
