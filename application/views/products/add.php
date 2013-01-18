<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Añade un producto a tu lista: </h1>
	<?= anchor("lists/view/$idList", '<i class="icon-arrow-left icon-white"></i> Volver a mi lista', array('title' => 'Volver a la lista', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if(validation_errors()) : ?>
	<div class="alert alert-error">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= validation_errors() ?></p>
	</div>
<?php endif; ?>
 
<form method="post" action="<?php echo site_url('products/add')?>" class="well" enctype="multipart/form-data">
    <p>
    	<label>Título</label>
    	<input type="text" name="title" value="<?php echo set_value('title'); ?>" class="input-xlarge" />
    </p>
    <p>
    	<label>Cantidad</label>
    	<input type="text" name="quantity" value="<?php $quantity = set_value('quantity'); if($quantity) : echo $quantity; else : echo "1"; endif; ?>"  class="span1" />
    </p>
    <p>
    	<label>Descripción</label>
    	<textarea name="description" rows="3" cols="" class="input-xlarge"><?php echo set_value('description'); ?></textarea>
    </p>
    <div class="form-actions">
    	<input type="hidden" name="idList" value="<?= $idList?>" />
	    <input type="submit" value="Añade un producto a la lista" class="btn btn-primary" />
	    <input type="reset" value="Cancelar" class="btn" />
    </div>
</form>


<?php $this->load->view('includes/footer'); ?>