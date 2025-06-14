<?php
include  'conexion.php';
/*
session_start();
session_destroy();


echo 'Buen dia';
echo '<script> window.location="index.php"; </script>';
*/

// se Inicia la sesion 

session_start();

// se crea la variable sesion 

$_SESSION = array();

// Borra la cookie de sesión para evitar q
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


//liberar variables de la sesion
session_unset();
//destruir la sesion
session_destroy();

// Header evitan cache y guardar datos que permitan regresar a la pagina una vez cerrada la seison 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Location: index.php");
exit();
?>