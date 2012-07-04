<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Vamos al super :: Instalación paso 2</title>
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
			<h1>Instalación paso 2 de 2</h1>
		</header>
		
		<?php
		if (isset($_POST['submit'])) {
			$dbHost = htmlspecialchars(strip_tags($_POST['bbdd_host']));
			$dbName = htmlspecialchars(strip_tags($_POST['bbdd_name']));
			$dbUser = htmlspecialchars(strip_tags($_POST['bbdd_user']));
			$dbPassword = htmlspecialchars(strip_tags($_POST['bbdd_password']));
			
			//$db = &new MySQL($dbHost,$dbUser,$dbPassword,$dbName);
			$db = mysql_connect($dbHost,$dbUser,$dbPassword);
			if (!$db) {
			  die('<div class="alert alert-error">No podemos conectar con la base de datos: "' . mysql_error() . '"</div>');
			}
			
			// 
			// creamos las tablas e insertamso el usuario por defecto:
			//
			
			mysql_select_db($dbName, $db);
			
			mysql_query("SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";
				SET time_zone = \"+00:00\";
			");
			
			//tablas básicas de Vamos al Super:
			
			// tabla: `lists`
			mysql_query("DROP TABLE IF EXISTS `lists`;
			");
			mysql_query("CREATE TABLE IF NOT EXISTS `lists` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(255) NOT NULL,
				`description` text NOT NULL,
				`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				`status` int(11) NOT NULL DEFAULT '0',
				`picture` varchar(255) NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			");
			
			// tabla: `products`
			mysql_query("DROP TABLE IF EXISTS `products`;
			");
			mysql_query("CREATE TABLE IF NOT EXISTS `products` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`idList` int(11) NOT NULL,
				`name` varchar(255) NOT NULL,
				`quantity` int(11) NOT NULL,
				`description` text,
				`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				`status` int(11) NOT NULL DEFAULT '0',
				`picture` varchar(255) NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
			");
			
			// tablas de Ion Auth:
			
			// tabla: `groups`
			mysql_query("DROP TABLE IF EXISTS `groups`;
			");
			mysql_query("CREATE TABLE `groups` (
				`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
				`name` varchar(20) NOT NULL,
				`description` varchar(100) NOT NULL,
				PRIMARY KEY (`id`)
				);
			");
			mysql_query("INSERT INTO `groups` (`id`, `name`, `description`) VALUES
				(1,'admin','Administradores'),
				(2,'members','Usuarios generales')
			");
			
			// tabla: `users`
			mysql_query("DROP TABLE IF EXISTS `users`;
			");
			mysql_query("CREATE TABLE `users` (
				`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
				`ip_address` varbinary(16) NOT NULL,
				`username` varchar(100) NOT NULL,
				`password` varchar(40) NOT NULL,
				`salt` varchar(40) DEFAULT NULL,
				`email` varchar(100) NOT NULL,
				`activation_code` varchar(40) DEFAULT NULL,
				`forgotten_password_code` varchar(40) DEFAULT NULL,
				`forgotten_password_time` int(11) unsigned DEFAULT NULL,
				`remember_code` varchar(40) DEFAULT NULL,
				`created_on` int(11) unsigned NOT NULL,
				`last_login` int(11) unsigned DEFAULT NULL,
				`active` tinyint(1) unsigned DEFAULT NULL,
				`first_name` varchar(50) DEFAULT NULL,
				`last_name` varchar(50) DEFAULT NULL,
				`company` varchar(100) DEFAULT NULL,
				`phone` varchar(20) DEFAULT NULL,
				PRIMARY KEY (`id`)
				);
			");
			mysql_query("INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
				('1',0x7f000001,'administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');
			");
			
			// tabla: `users_groups`
			mysql_query("DROP TABLE IF EXISTS `users_groups`;
			");
			mysql_query("CREATE TABLE `users_groups` (
				`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
				`user_id` mediumint(8) unsigned NOT NULL,
				`group_id` mediumint(8) unsigned NOT NULL,
				PRIMARY KEY (`id`)
				);
			");
			mysql_query("INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
				(1,1,1),
				(2,1,2);
			");

			// tabla: `login_attempts`
			mysql_query("DROP TABLE IF EXISTS `login_attempts`;
			");
			mysql_query("CREATE TABLE `login_attempts` (
				`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
				`ip_address` varbinary(16) NOT NULL,
				`login` varchar(100) NOT NULL,
				`time` int(11) unsigned DEFAULT NULL,
				PRIMARY KEY (`id`)
				);
			");
			
			echo "<div class=\"alert alert-success\"><strong>Vamos al super</strong> se ha instalado corectamente.</div>";
			echo "<h2>Gracias por instalar ¡Vamos al Super!</h2>";
			echo "<p>Por seguridad elimina el directorio /install inmediatamente.</p>";
			echo "<p>Para visitar tu nueva instalación haz <a href=\"../\">clic aquí</a></p>";
			echo "<p>Los datos de acceso son:<br /><strong>usuario:</strong> admin@admin.com<br /><strong>Contraseña:</strong> password</p>";
			echo "<p>Una vez logado en el sistema te recomendamos que edites el usuario por defecto con tus datos y cambies la contraseña</p>";
			echo "<div class=\"well\">";
			echo "<h3>Debes modificar el archivo <strong>/application/config/database.php</strong> y poner los valores de la conexión a la base de datos:</h3>";		
			echo "&#36;db['default']['hostname'] = '".$dbHost."';<br />&#36;db['default']['username'] = '".$dbUser."';<br />&#36;db['default']['password'] = '".$dbPassword."';<br />&#36;db['default']['database'] = '".$dbName."';";
			echo "</div>";
		}	
		?>
		
	</div>
</div>
</body>
</html>

