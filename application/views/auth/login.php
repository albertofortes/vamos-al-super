<?php $this->load->view('includes/header_login'); ?>


	<div class="page-header">
		<h1>Login</h1>
	</div>
    
    <div class="pageTitleBorder"></div>
	
	<?php if($message) : ?>
	<div id="infoMessage" class="alert alert-error">
		<p><?= $message;?></p>
	</div>
	<?php endif; ?>
	
    <?php echo form_open("auth/login");?>
    	
      <p>
      	<label for="identity">Email/Username:</label>
      	<?php echo form_input($identity);?>
      </p>
      
      <p>
      	<label for="password">Contraseña:</label>
      	<?php echo form_input($password);?>
      </p>
      
      <p>
	      <label for="remember">¿Recordar usuario?</label>
	      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
	  </p>
      
      <div class="form-actions">
      	<?php echo form_submit('submit', 'Login', 'class="btn btn-primary"');?>
      </div>

      
    <?php echo form_close();?>

    <p><a href="forgot_password">¿Has olvidado tu contraseña?</a></p>



<?php $this->load->view('includes/footer_login'); ?>
