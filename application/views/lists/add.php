<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Crea una lista nueva</h1>
	<?= anchor("lists/", '<i class="icon-arrow-left icon-white"></i> Volver', array('title' => 'Volver a mis lista', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if(validation_errors()) : ?>
	<div class="alert alert-error">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= validation_errors() ?></p>
	</div>
<?php endif; ?>

 
<form method="post" action="<?php echo site_url('lists/add')?>" class="well" enctype="multipart/form-data">
    <p>
	    <label>Título</label>
	    <input type="text" name="title" value="<?php echo set_value('title'); ?>" rows="3" cols="" class="input-xlarge" />
    </p>
    <p>
	    <label>Descripción</label>
	    <textarea name="description" rows="3" cols="" class="input-xlarge"><?php echo set_value('description'); ?></textarea>
    </p>
    <p>
	    <label>¿Quieres añadir una foto personalizada?</label>
	   <input type="file" class="input-file" name="userfile" id="userfile" />
	   <br /><small>Máx.: 1024x768 y 1Mb o la foto no se subirá</small>
    </p>
    <div class="form-actions">
    	<input type="submit" value="Crear lista!" class="btn btn-primary" />
	    <input type="reset" value="Cancelar" class="btn" />
	</div>
</form>

<?php $this->load->view('includes/footer'); ?>