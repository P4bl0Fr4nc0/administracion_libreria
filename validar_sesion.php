<?php
      
/* Codigo antiguo y obsoleto utilizado como referencia contiene vulnerabilidades

session_start();


include 'conexion.php';
if(isset($_POST['ingresar'])){
    
    $usuario = $_POST['username'];
    $password = $_POST ['password'];
    
    //$log = mysql_query("SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND pass = '$password'");
        
    if (mysql_num_rows($log)>0){
        $row = mysql_fetch_array($log);
        $_SESSION["username"] = $row['nombre_usuario'];
        //echo 'Inicio de sesion'; $_SESSION['nombre_usuario'].'<p>';
        echo '<script>window.location= "principal.php";</script>';
        
        
        
    }
    else {
        
        echo'<script> window.location= "index_error.php";</script>';
    }
}
*/

// Se Inicia la sesion 
session_start();
//se incliuyen los parametros de la conexion 
include 'conexion.php';


if (isset($_POST['ingresar'])) {
    $usuario = trim($_POST['username'],FILTER_SANITIZE_STRING);
    $password = trim($_POST['password'], FILTER_SANITIZE_STRING);

    //query para inicio de sesion
    $sql= "SELECT nombre_usuario, pass FROM usuarios WHERE nombre_usuario = ?";
    // se prepara la conexion y se le pasa el parametro $sql
    $stmt = $conexion->prepare($sql);
    // utilizamos bind param para evitar filtracion de datos
    $stmt->bind_param("s", $usuario);
    // se ejecuta el query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña hasheada 
        if (password_verify($password, $row['pass'])) {
            $_SESSION['username'] = $row['nombre_usuario'];
            // Seguridad extra, se regenera el ID de sesion y borra el anterior 
            session_regenerate_id(true);  
            header("Location: principal.php");
            exit();
        }
    }

    // Si falla login
    echo'<script> window.location= "index_error.php";</script>';
    $stmt->close();
    $conexion->close();
}












?>