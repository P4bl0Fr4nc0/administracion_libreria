
<?php
header('Content-Type: text/html; charset= UTF-8');

session_start();

include 'conexion.php';

?>
 

 <!DOCTYPE html>
	 
	<html lang="es">
	 
	<head>
	 <meta charset="UTF-8">	
	 <title>Bienvenido</title>	
	 
	 <link rel="stylesheet" href="style/estilo_frame.css"/>
	</head>
	 
	<body>
	
	<section id= login>
 <h1>Iniciar de sesión</h1>
	<hr />
	<img src="img/libro.png">
	 
	<form action="validar_sesion.php" method="post" >
	 
	<label>Nombre Usuario:</label><br>
	<input name="username" type="text" id="username" required>
	<br><br>
	 
	<label>Password:</label><br>
	<input name="password" type="password" id="password" required>
	<br><br>
	 
	<input type="submit" name="ingresar" value="Login" id="ingresar">
	 
	</form>
	<hr />
        </section>
	 
	<footer>
	 <a> v 1.5   </a>
    </footer>
	 
	 </body>
	</html>
