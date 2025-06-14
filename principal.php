<?php
header('Content-Type: text/html; charset= UTF-8');

/*
Desarrollo de sistema de libreria Pablo Franco 2025.
*/

// inicio de sesión.
session_start();
include 'conexion.php';
$conexion->set_charset("utf8mb4");

// Borra el contenido para evitar que se pueda regresar a la pagina una vez cerrada la sesion 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


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
    <title>Tu_libreria v1.0</title>
    <link rel="stylesheet" href="style/estilo.css"/>
        <link rel="stylesheet" href="style/css/font-awesome.min.css"/>
        <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>
    
</head>
<body>
   
   
   <section id="contenedor">
   
   <section id="encabezado">
       <table>
           <td>
           

           </td>
           <td>
              <a>Mi librería</a>
               
           </td>
           <td>
              
               
           </td>
              <td>
              <i class="fa fa-user fa-1x" ></i><a id="sesion"><?php 
                  
                
                  // se muestra el usuario en la pagina
                  echo $_SESSION['username'];
                  
                  
                  
                  ?></a>
               
           </td>
              <td>
              <i class="fa fa-sign-out fa-1x" ></i><a id="sesion" href="logout.php">Cerrar Sesion</a>
              
               
           </td>
       </table>
       
       
    
       
   </section>
   
   <section id="menu">
          <ul id="nav">
              <li href="home.php"><i class="fa fa-home fa-2x" ></i><a href="home.php" target="paginas">Inicio</a></li>       
      
       <li><i class="fa fa-male fa-2x" ></i><a href="clientes.php" target="paginas">Clientes</a></li>
       
       <li><i class="fa fa-money fa-2x" ></i><a href="caja.php" target="paginas">Caja</a></li>
       
        <li><i class="fa fa-book fa-2x" ></i><a href="libros.php" target="paginas">Libros</a></li>
       <li><i class="fa fa-book fa-2x" ></i><a href="editoriales.php" target="paginas">Editoriales</a></li>
       <li><i class="fa fa-book fa-2x" ></i><a href="autores.php" target="paginas">Autores</a></li>
       <li><i class="fa fa-book fa-2x" ></i><a href="categorias.php" target="paginas">Categorias</a></li>
       <li><i class="fa fa-user fa-2x" ></i><a href="usuarios.php" target="paginas">Usuarios</a></li>
       
       <li><i class="fa fa-line-chart fa-2x" ></i><a href="finanzas.php" target="paginas">Finanzas</a></li>
  
   </ul>
   </section>
   
   <section id= "elementos" >
       
      <iframe  name ="paginas"  src="home.php" >
          
          
      </iframe>
   </section>
   
   <footer>
       
       <table >
        
           <td>
               <a id = "firma"> PAFR 2025. </a>
           </td>
           
       </table>
       
   </footer>
   
   
    </section>
    
</body>
</html>