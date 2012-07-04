<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Productos en mi lista: <small><?= $listName ?></small></h1>
	<?= anchor("products/add/$idList", '<i class="icon-shopping-cart icon-white"></i> Añade un producto', array('title' => 'Nuevo producto', 'id' => 'addProduct', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if($flash_message) : ?>
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= $flash_message ?></p>
	</div>
<?php endif; ?>

<?php if($products): ?>
<ul class="productList">
    <?php foreach($products as $product): ?>
    <li>
    	<?php if($product->picture): ?><img src="<?= $product->picture ?>" alt="<?= $product->name ?>" class="imagen" /><?php endif ?>
    	<h3>
    		<?php if($product->status == 1) : ?> <del><?php endif; ?>
    		<?= $product->quantity ?> x <?= $product->name ?>
    		<?php if($product->status == 1) : ?> </del><?php endif; ?>
    	</h3>
        <?php if($product->description): ?><p><?= $product->description ?></p><?php endif ?>
        <div class="actions">
        	<p>
        		<?= anchor("products/edit/$product->id/$idList", '<span class="icon-pencil"></span> Editar', array('title' => 'Editar producto', 'class' =>'btn')); ?>
        		<?php if($product->status==0) : ?><?= anchor("products/complete/$product->id/$idList", '<span class="icon-ok icon-white"></span>Comprado', array('title' => 'Marcar como comprado', 'class' =>'btn btn-success')); ?><?php endif; ?>
        		<?= anchor("products/delete/$product->id/$idList", '<span class="icon-remove icon-white"></span> Eliminar', array('title' => 'Eliminar producto', 'class' =>'btn btn-danger')); ?>
        	</p>
        </div>
    </li>
    <?php endforeach ?>
</ul>
<?php else: ?>
<div class="alert alert-block">
	<p>La lista todavía está vacía.</p>
</div>
<?php endif ?>

<div class="modal hide" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Eliminar esta lista de la compra</h3>
	</div>
	<div class="modal-body">
		<p>¿Estás seguro que quieres eliminarla? Siempre puedes marcarla como <em>terminada</em> para poder consultarla más adelante o incluso volver a reutilizarla, rehabilitándola de nuevo.</p>
	</div>
	<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">No, me lo he pensado mejor</a>
	<a href="#" class="btn btn-primary">Si, elimínala</a>
</div>


<?php $this->load->view('includes/footer'); ?>