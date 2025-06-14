
<?php
session_start();
include 'conexion.php';
if (isset($_SESSION['username'])){
    echo'<script> window.location="principal.php";</script>';
}
?>
 

 <!DOCTYPE html>
	 
	<html lang="es">
	 
	<head>
	 <title>Bienvenido</title>
	 
	 <meta charset = "utf-8">
	 
	 <link rel="stylesheet" href="style/estilo_frame.css"/>
	</head>
	 
	<body>
	
	<section id= login>
 <h1>Iniciar de sesión</h1>
	<hr />
	<img src="img/libro.png">
	 
	 <h2>Error: usuario o contraseña incorrectos</h2>
	 
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
	 <a </a>
    </footer>
	 
	 </body>
	</html>
