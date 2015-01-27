<?php $this->load->view('includes/header'); ?>

<header class="page-header">
	<h1>Usuarios:</h1>
	<?= anchor("auth/create_user", '<i class="icon-user icon-white"></i> Crear nuevo usuario', array('title' => 'Nuevo usuario', 'class' => 'btn btn-primary btn-large btn-top-right')); ?>
</header>

<?php if($message) : ?>
	<div class="alert alert-success" id="infoMessage">
		<button data-dismiss="alert" class="close" type="button">×</button>
		<p><?= $message ?></p>
	</div>
<?php endif; ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th class="no-Mobile">Apellidos</th>
				<th>Teléfono</th>
				<th class="no-Mobile">Email</th>
				<th>Grupo</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user):?>
			<tr>
				<td>
					<?= anchor("auth/edit_user/$user->id", $user->first_name, array('title' => 'Editar usuario')); ?>
				</td>
				<td class="no-Mobile"><?php echo $user->last_name;?></td>
				<td><?php if($user->phone) : ?><a href="tel:"<?= $user->phone;?>"><?= $user->phone;?></a><?php endif; ?></td>
				<td class="no-Mobile"><?php echo $user->email;?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo $group->name;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	

<?php $this->load->view('includes/footer'); ?>
