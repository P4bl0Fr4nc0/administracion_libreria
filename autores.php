<?php
session_start();
include'conexion.php';

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
      <script src="js/ocultardiv2.js"></script>
    <title>autores</title>
</head>
<body>
   <section id="contenedor2">
      
             <div id="subtitulo"> <h1>Autores</h1></div>
             
                   <table id='datos'>
             
             
             
             <tr >
                 
             </tr>
              
                     <tr >
                         <td id ='title2'>Codigo Autor</td>
                         <td id ='title2'>Nombre</td>
                         <td id ='title2'>Apellido Paterno</td>
                         <td id ='title2'>Apellido Materno</td>
                         <td id ='title2'>Fecha de Nacimiento</td>
                         <td id ='title2'>Pais</td>
                         <td id ='title2'>Ciudad</td>
                        
                         
                         
                     </tr>
               <?php

       
            /*Codigo obsoleto, mantenido para referencia
           $result = mysql_query("select * from autor");
             
             while($row = mysql_fetch_array($result)){
             */
            $result = $conexion->query("select * from autor"); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){   
                
                ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["CODIGO_AUTOR"]; ?></td>
                    <td id= "fila"><?php echo $row["NOMBRE"]; ?></td>
                    <td id= "fila"><?php echo $row["APELLIDO_P"]; ?></td>
                    <td id= "fila"><?php echo $row["APELLIDO_M"]; ?></td>
                    <td id= "fila"><?php echo $row["FECHA_NACIMIENTO"]; ?></td>
                    <td id= "fila"><?php echo $row["PAIS"]; ?></td>
                    <td id= "fila"><?php echo $row["CIUDAD"]; ?></td>
                   
                </tr>
                <?php 
             }
           
       ?>
                                   
      </table>
       
            <button id="agregar">Agregar</button>
     
      <div id= "formulario">
           <form action="insertar_autor.php" method="POST" name="form" >
           
          
           
           <input type="text" name="codigo_autor" placeholder="Codigo Autor" id="txt"  required>
           
           <input type="text" name="nombre" placeholder="Nombre"  id="txt"  required  >
                   
          
           
           <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"  id="select" required  >
           
           <input type="text" name="apellido_materno" placeholder="Apellido Materno"  id="txt"  required >
          
           <input type="date" name="fecha_nacimiento" id="fecha"   >
           
                 
           
           <input type="text" name="pais" placeholder="Pais"  id="txt"  required >
           
           <input type="text" name="ciudad" placeholder="Ciudad"  id="txt"   required>
           
                     
           
           
           <input type="submit" value="Insertar" id="boton2">
    
       </form>
       
        <div  id="cancelar"> <button  id="boton">Cancelar</button> </div>       
      
       </div>
       
          <div id=delete>
       <button id="eliminar">Eliminar</button>
       </div>
       
       <!-- formulario 2 -->
       
       <div id ="formulario2">
          
          <form action="eliminar_autor.php" method="POST" name="form2" id="form2">
          <input type="text" name="eliminar" placeholder="Ingrese Codigo Autor"  id="select" >
          
              <button type="submit" value="Aceptar" id="boton_form2">Aceptar</button>
           </form>
            <div  id="cancelar2"> <button  id="boton_cancelar">Cancelar</button> </div>       
      
       </div>

       
   </section>
    
</body>
</html>