<?php $this->load->view('includes/header'); ?>
<header class="page-header">

	<h1>Editar usuario: <?= $row->first_name ?></h1>
	<?= anchor("auth/", '<i class="icon-arrow-left icon-white"></i> Volver', array('title' => 'Volver al listado de usuarios', 'class' => 'btn btn-primary btn-large btn-top-right')); ?></header>

<?php if(validation_errors()) : ?>
	<div class="alert alert-error">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= validation_errors() ?></p>
	</div>
<?php endif; ?>
	
    <?php echo form_open("auth/edit_user");?>
      <p>
	      <label>Nombre:</label>
	      <input type="text" name="first_name" value="<?= $row->first_name?>" class="input-xlarge" />
      </p>
      
      <p>
	      <label>Apellidos:</label>
	      <input type="text" name="last_name" value="<?= $row->last_name?>" class="input-xlarge" />
      </p>
      
      <p>
	      <label>Empresa:</label>
	      <input type="text" name="company" value="<?= $row->company?>" class="input-xlarge" />
      </p>
      
      <p>
      	<label>Email:</label>
      	<input type="text" name="email" value="<?= $row->email?>" class="input-xlarge" />
      </p>
      
      <p>
      	<label>Teléfono:</label>
      	<input type="text" name="phone" value="<?= $row->phone?>" class="input-xlarge" />
      </p>
      
      <p>
      	<label>Grupos a los que pertenece:</label>
      	<ul>
      	<?php foreach ($userGroups as $group):?>
			<li><?php echo $group->name . " (" . $group->description . ")"?></li>
	    <?php endforeach?>
      	</ul>
      	<?php // var_dump($userGroups) ?>
      	<?php if(1==0) : ?>
	      	<?php foreach($groups as $group) : ?>
	      		<input type="checkbox" name="groups" value="<?= $group->id ?>" /> <?= $group->name ?>
	      	<?php endforeach; ?>
	    <?php endif; ?>
      </p>
      <?php if(1==0) : ?>
	      <p>
	      	<label>Rellena si quieres cambiar la contraseña:</label>
	      	<input type="password" name="password" class="input-xlarge" />
	      </p>
	      <p>
	      	<label>Repite la contraseña si la deseas cambiar:</label>
	      	<input type="password" name="password_confirm" class="input-xlarge" />
	      </p>
      <?php endif; ?>   
      <div class="form-actions">
      	<input type="hidden" name="id" value="<?= $row->id;?>" />
      	<?php echo form_submit('submit', 'Crear usuario', 'class="btn btn-primary"');?>
      	 <input type="reset" value="Cancelar" class="btn" />
      </div>
            
    <?php echo form_close();?>

<?php $this->load->view('includes/footer'); ?>
