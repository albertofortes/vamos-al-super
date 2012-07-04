<?php $this->load->view('includes/header'); ?>

<?php $idList = $this->uri->segment(4); ?>

<header class="page-header">
	<h1>Productos en mi lista: </h1>
	<?= anchor("lists/view/$idList", '<i class="icon-arrow-left icon-white"></i> Volver a mi lista', array('title' => 'Volver a la lista', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if(validation_errors()) : ?>
	<div class="alert alert-error">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= validation_errors() ?></p>
	</div>
<?php endif; ?>

 
<form method="post" action="<?php echo site_url('products/edit')?>" class="well">
    <p>
    	<label>Nombre</label>
    	<input type="text" name="title" value="<?= $row->name;?>" class="input-xlarge" />
    </p>
    <p>
    	<label>Cantidad</label>
    	<input type="text" name="quantity" value="<?php $quantity = $row->quantity; echo $quantity; ?>"  class="span1" />
    </p>
    <p>
    	<label>Descripción</label>
    	<textarea name="description" rows="3" cols="" class="input-xlarge"><?= $row->description;?></textarea>
    </p>
    <p><label>¿Marcar como comprado?</label></p>
    <div class='toggle basic' data-enabled="Comprado" data-disabled="Pendiente" data-toggle="toggle">
	    <input type="checkbox" value="<?= $row->status ?>" id="status" name="status" class="checkbox"<?php if($row->status==1) : ?> checked="checked"<?php endif; ?> />
	    <label class="check" for="myCheckbox"></label>
	</div>
	<script>
	  $('.basic').toggle({
        onClick: function (event, status) {
        	var foo = $('#status');
        	if(foo.val()=='1') {
	          foo.val('0');
	        } else {
	          foo.val(1);
	        }
        },
        style: {
        	disabled: false
        }
      });
      </script>
    <div class="form-actions">
	    <input type="hidden" name="id" value="<?= $row->id;?>" />
	    <input type="hidden" name="idList" value="<?= $row->idList;?>" />
	    <input type="submit" value="Edita el producto" class="btn btn-primary" />
	    <input type="reset" value="Cancelar" class="btn" />
    </div>
</form>


<?php $this->load->view('includes/footer'); ?>