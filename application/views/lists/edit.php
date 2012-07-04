<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Edita la lista <small><?= $row->name;?></small></h1>
	<?= anchor("lists/", '<i class="icon-arrow-left icon-white"></i> Volver', array('title' => 'Volver a mis lista', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if(validation_errors()) : ?>
	<div class="alert alert-error">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= validation_errors() ?></p>
	</div>
<?php endif; ?>
 
<form method="post" action="<?php echo site_url('lists/edit')?>" class="well" enctype="multipart/form-data">
    <p>
	    <label>Nombre</label>
	    <input type="text" name="title" value="<?= $row->name;?>" class="input-xlarge" />
    </p>
    <p>
	    <label>Descripción</label>
	    <textarea name="description" rows="3" cols="" class="input-xlarge"><?= $row->description;?></textarea>
	</p>
	<p>
		<?php if($row->picture) : ?><img src="<?= $row->picture;?>" alt="Foto de la lista" /><?php endif; ?>
	    <label><?php if($row->picture) : ?>¿Quieres cambiar la foto?<?php else : ?>¿Quieres añadir una foto personalizada?<?php endif; ?></label>
	    <input type="file" class="input-file" name="userfile" id="userfile" value="<?= $row->picture;?>" />
	    <br /><small>Máx.: 1024x768 y 1Mb o la foto no se subirá</small>
    </p>
    <p><label>¿Marcada como hecha?</label></p>
    <div class='toggle basic' data-enabled="Hecho" data-disabled="Sin hacer" data-toggle="toggle">
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
	    <input type="submit" value="Edita mi lista" class="btn btn-primary" />
	    <input type="reset" value="Cancelar" class="btn" />
	</div>
</form>

<?php $this->load->view('includes/footer'); ?>