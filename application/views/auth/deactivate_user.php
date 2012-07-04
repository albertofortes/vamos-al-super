<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Desactivar usuario: <small><?php echo $user->username; ?></small></h1>
	<?= anchor("auth/", '<i class="icon-arrow-left icon-white"></i> Volver', array('title' => 'Volver al listado de usuarios', 'class' => 'btn btn-primary btn-large btn-top-right')); ?></header>

    <?php echo form_open("auth/deactivate/".$user->id);?>
    	
      <p>
      	<label for="confirm">¿Quieres desactivar al usuario '<?php echo $user->username; ?>'?</label>
		<input type="radio" name="confirm" value="yes" checked="checked" /> Si
		<input type="radio" name="confirm" value="no" /> No
      </p>
      
      
      
      <div class="form-actions">
      	<?php echo form_hidden($csrf); ?>
      	<?php echo form_hidden(array('id'=>$user->id)); ?>
      	<?php echo form_submit('submit', 'Desactivar usuario', 'class="btn btn-primary"');?>
      </div>


    <?php echo form_close();?>


<?php $this->load->view('includes/footer_login'); ?>