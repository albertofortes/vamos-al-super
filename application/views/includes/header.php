<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>¡Vamos al super!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/ico/favicon.ico" type="image/x-icon" /> 
<link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-iphone4.png" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-toggle.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/add2home.css" />
<script src="<?php echo base_url()?>assets/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url()?>assets/js/json2.js"></script>
<script src="<?php echo base_url()?>assets/js/underscore-min.js"></script>
<script src="<?php echo base_url()?>assets/js/backbone-min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-toggle.js"></script>
<script src="<?php echo base_url()?>assets/js/add2home.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-dropdown.js"></script>
</head>
<body>
<header class="header">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>">Vamos al Super!</a>
				<ul class="nav pull-right">
					<li id="filterPending" class="lists"><?= anchor('lists', 'Mis listas', array('title' => 'Mis listas de la compra')); ?></li>
					<li class="addlist"><?= anchor('lists/add/', 'Nueva lista', array('title' => 'Crea una lista nueva')); ?></li>
					<?php if($this->ion_auth->is_admin()) : ?><li class="users"><?= anchor('auth/', 'Usuarios', array('title' => 'Gestión de usuarios')); ?></li><?php endif;  ?>
					<li class="user dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">User</a>
						<ul class="dropdown-menu">
				            <li><?= anchor('auth/edit_user/'.$you->id, '<i class="icon-user"></i> editar tus datos', array('title' => 'Editar tus datos')); ?></li>
				            <li><?= anchor('auth/change_password', '<i class="icon-pencil"></i> Cambiar contraseña', array('title' => 'Cambiar contraseña')); ?></li>
				            <li class="divider"></li>
				            <li><?= anchor('auth/logout', '<i class="icon-ban-circle"></i> Salir', array('title' => 'Salir de la aplicación')); ?></li>
				        </ul>
					</li>
				</ul>
			</div>
			<p id="smartphone-nav">
				<select>
					<option value="<?php echo base_url()?>">Mis listas</option>
					<option value="<?php echo base_url()?>index.php/lists/add">Nueva lista</option>
					<?php if($this->ion_auth->is_admin()) : ?><option value="<?php echo base_url()?>index.php/auth">Usuarios</option><?php endif;  ?>
					<option value="<?php echo base_url()?>index.php/auth/logout">salir</option>
				</select>
			</p>
		</div>
	</div>
</header>
<div class="content">
	<div class="wrapper container">