<?php
header('Content-Type: text/html; charset= UTF-8');
include'conexion.php';
$conexion->set_charset("utf8mb4");
// inicio de sesión.
session_start();
include'conexion.php';
if(isset($_SESSION['username'])){
     }

else {    
echo '<script>window.location= "index.php";</script>';

}
// Se asigna el usuario a la variable sesion.
$profile = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">   
      <link rel="stylesheet" href="style/estilo_frame.css"/> 
      <link rel="stylesheet" href="style/css/font-awesome.min.css"/>
    <title>Home</title>
    
</head>
<body style="overflow-y: hidden">
   
   <section id="contenedor_home">
   
   
   <div id= "bienvenida">
    <h1>BIENVENIDO</h1>
    
    <a href="documento.pdf" id="ayuda"> <i class="fa fa-file-pdf-o" ></i> Manual </a>
     
       <a id="ayuda2" > <i class="fa fa-question-circle" ></i> Ayuda </a>
     
     <div id="bienvenida2">
      
      
         <a>Bienvenido a <strong>Mis libros </strong>, una plataforma que te ayudara a mantener el registro y control de ventas de libros, con esta plataforma el proceso de administración es fácil y rápido. </a>
         
          <a>Todo listo para ponerte en marcha, es intuitivo y sencillo. Ahorra tiempo y optimiza ganancias.  </a>
       
          
          <ul>
             
             <li> <i class="fa fa-check-square-o"></i>Fácil e intuitivo</li>
             <br>
              <li> <i class="fa fa-check-square-o"></i>Acceso desde cualquier lugar con conexión a internet</li>
              <br>
              <li><i class="fa fa-check-square-o"></i>Compatibilidad con varios navegadores</li>
              <br>
              <li><i class="fa fa-check-square-o"></i> Control de ganancias</li>
              <br>
              <li><i class="fa fa-check-square-o"></i> Ayuda y Soporte técnico</li>
             
              
              
          </ul>
         
         
         

      
     </div>
     <div id= "bienvenida3">
     
     <img src="img/libros.png"/>
     
     </div>
      
      
  
       </div>
       
       
   

    </section>
    
     
     
    
</body>
</html>