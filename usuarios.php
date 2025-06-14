<?php
header('Content-Type: text/html; charset= UTF-8');
session_start();
include'conexion.php';
$conexion->set_charset("utf8mb4");

if(isset($_SESSION['username'])){
     
}

else {
    
    echo '<script>window.location= "index.php";</script>';


}

$profile = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/estilo_frame.css"/>
    <title>usuarios</title>
</head>
<body>
   <section id="contenedor7">
      
      <div id="subtitulo"> <h1>Usuarios</h1></div>
      
         <table id='datos'>            
             
             
             
              
                     <tr >
                         <td id ='title2'>Codigo Usuario</td>
                         <td id ='title2'>Nombre Usuario</td>
                         <td id ='title2'>Password</td>
                                        
                         
                         
                     </tr>
               <?php
           
       
       
         /*Codigo obsoleto, mantenido como referencia
           $result = mysql_query("select * from usuarios");
             
             while($row = mysql_fetch_array($result)){
             */
            $result = $conexion->query("select * from usuarios"); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
             ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["id_usuario"]; ?></td>
                    <td id= "fila"><?php echo $row["nombre_usuario"]; ?>
                    <td id= "fila" >********
                    </td>
                   
                  
                </tr>
                <?php 
             }
           
       ?>
                                   
      </table>
      
      <div id="subtitulo2"> <h1><a>Si deseas dar de alta o eliminar usuarios favor de comunicarse con el administrador del sitio </a></h1></div>
       
   </section>
    
</body>