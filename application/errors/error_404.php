<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>¡Vamos al super!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-responsive.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" type="text/css" />
</head>
<body>
<header class="header">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>">Vamos al Super!</a>
			</div>
		</div>
	</div>
</header>
<div class="content">
	<div class="wrapper container">
	
		<h1><?php echo $heading; ?></h1>
		<p><?php echo $message; ?></p>
		
	</div>
</div>
</body>
</html>