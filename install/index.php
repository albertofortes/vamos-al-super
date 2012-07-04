<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Vamos al super :: Instalación paso 1</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css" type="text/css" />
<link rel="stylesheet" href="../assets/css/install.css" type="text/css" />
</head>
<body>
<header class="header">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<span class="brand">¡Vamos al Super!</span>
			</div>
		</div>
	</div>
</header>
<div class="content">
	<div class="wrapper container">
		<header class="page-header">
			<h1>Instalación paso 1 de 2</h1>
		</header>
		
		<form class="well" action="install.php" method="post">
			<p>
				<label>Host:</label>
				<input type="text" class="input-largue" name="bbdd_host" value="localhost" />
				<small>Si tienes dudas no lo cambies. El 99% de las veces es localhost.</small>
			</p>
			<p>
				<label>Nombre de la base de datos:</label>
				<input type="text" class="input-largue" name="bbdd_name" />
				<small>Debes haberla creado antes, el programa instalador no puede crear la base de datos.</small>
			</p>
			<p>
				<label>Usuario de la base de datos:</label>
				<input type="text" class="input-largue" name="bbdd_user" />
			</p>
			<p>
				<label>Contraseña de la base de datos:</label>
				<input type="password" class="input-largue" name="bbdd_password" />
			</p>
			<div class="form-actions">
				<input type="submit" name="submit" class="btn btn-primary" value="Instalar" />
				<input type="reset" class="btn" value="Cancelar" />
			</div>
		</form>
		
	</div>
</div>
</body>
</html>

