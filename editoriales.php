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
    <script src="js/ocultardiv2.js"></script>
    <title>editoriales</title>
</head>
<body>
   <section id="contenedor3">
       <div id="subtitulo"> <h1>Editoriales</h1></div>
       
       <table id='datos'>
             
             
             
             <tr >
                 
             </tr>
              
                     <tr >
                         <td id ='title2'>Codigo Editorial</td>
                         <td id ='title2'>Nombre editorial</td>
                         <td id ='title2'>Telefono</td>
                         <td id ='title2'>Contacto</td>
                         <td id ='title2'>Direccion</td>
                         <td id ='title2'>Ciudad</td>
                         <td id ='title2'>Pais</td>                     
                         
                         
                     </tr>
               <?php
        
       
           /* codigo obsoleto guardado para referencia
           $result = mysql_query("select * from editorial");
             
             while($row = mysql_fetch_array($result)){

             */
            $result = $conexion->query("select * from editorial"); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){   
                ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["CODIGO_EDITORIAL"]; ?></td>
                    <td id= "fila"><?php echo $row["NOMBRE"]; ?></td>
                    <td id= "fila"><?php echo $row["TELEFONO"]; ?></td>
                    <td id= "fila"><?php echo $row["CONTACTO"]; ?></td>
                    <td id= "fila"><?php echo $row["DIRECCION"]; ?></td>
                    <td id= "fila"><?php echo $row["CIUDAD"]; ?></td>
                    <td id= "fila"><?php echo $row["PAIS"]; ?></td>
                  
                </tr>
                <?php 
             }
           
       ?>
                                   
      </table>
      
       <button id="agregar">Agregar</button>
     
      <div id= "formulario">
           <form action="insertar_editorial.php" method="POST" name="form" >
           
                     
           <input type="text" name="codigo_editorial" placeholder="Codigo Editorial" id="txt" required >
           
           <input type="text" name="nombre_editorial" placeholder="Nombre editorial"  id="txt"   required >
                   
                     
           <input type="text" name="telefono" placeholder="Telefono"  id="select" required   >
           
           <input type="text" name="contacto" placeholder="Persona de contacto"  id="txt" required   >
         
           <input type="text" name="direccion" placeholder="Direccion"  id="txt"  required >
           
           <input type="text" name="ciudad" placeholder="Ciudad"  id="txt" required  >
           
           <input type="text" name="pais" placeholder="Pais"  id="txt"   required>         
           
           <input type="submit" value="Insertar" id="boton2">

    
       </form>
       
       <div  id="cancelar">  
           <button  id="boton">Cancelar</button></div>       
      
       </div>
       
       <div id=delete>
       <button id="eliminar">Eliminar</button>
       </div>
       
       <!-- formulario 2 -->
       
       <div id ="formulario2">
          
          <form action="eliminar_editorial.php" method="POST" name="form2" id="form2">
          <input type="text" name="eliminar" placeholder="Ingrese Codigo Editorial"  id="select" >
          
              <button type="submit" value="Aceptar" id="boton_form2">Aceptar</button>
             
           </form>
            <div  id="cancelar2"> <button  id="boton_cancelar">Cancelar</button>  </div>       
      
       </div>
       
       
       
   </section>
    
</body>
</html>