<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Tus listas de la compra:</h1>
</header>

<?php if($flash_message) : ?>
	<div class="alert alert-success">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= $flash_message ?></p>
	</div>
<?php endif; ?>

<div id="myLists">
	<div id="filter"></div>
</div>
<script id="lists" type="text/template">
	<% if(status==1) { %><div class="completada"><% } %>
		<a href="<?php echo base_url()?>index.php/lists/view/<%= id %>" title="ver tu lista"><img src="<%= picture %>" alt="<%= name %>" class="imagen" /></a>
		<h2><a href="<?php echo base_url()?>index.php/lists/view/<%= id %>" title="ver tu lista"><%= name %></a></h2>
		<% if(description !='') { %><p class="desc"><%= description %></p><% } %>
		<div class="actions">
			<p class="date"><%= date %></p>
			<?= anchor("lists/view/<%= id %>", '<span class="icon-eye-open"></span> Ver', array('title' => 'Ver esta lista', 'class' =>'btn no-Mobile')); ?>
			<% if(status==0) {%><?= anchor("lists/complete/<%= id %>", '<span class="icon-ok icon-white"></span>Hecha!', array('title' => 'Marcar como hecha', 'class' =>'btn btn-success')); ?><%} %>
			<?= anchor("lists/edit/<%= id %>", '<span class="icon-pencil"></span> Editar', array('title' => 'Editar esta lista', 'class' =>'btn')); ?>
			<?= anchor("lists/delete/<%= id %>", '<span class="icon-remove icon-white"></span> Eliminar', array('title' => 'Eliminar esta lista', 'class' =>'btn btn-danger')); ?>
			</p>
		</div>
	<% if(status==1) {%></div><%} %>
</script>

<?php $this->load->view('includes/footer'); ?>

<script>
(function ($) {
    theLists = <?= $lists ?>;
} (jQuery));
</script>
<script src="<?php echo base_url()?>assets/js/app.lists.js"></script>


