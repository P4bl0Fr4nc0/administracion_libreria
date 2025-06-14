<?php
header('Content-Type: text/html; charset= UTF-8');
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
    <title>clientes</title>
</head>
<body>
  
  
   <section id="contenedor4">
   
   <div id="subtitulo"> <h1>Clientes</h1></div>
 
  <table id='datos'>                  
             
            
              
                     <tr >
                         <td id ='title2'>Codigo cliente</td>
                         <td id ='title2'>Nombre </td>
                         <td id ='title2'>Correo electronico</td>
                         <td id ='title2'>Telefono</td>
                         <td id ='title2'>Direccion</td>
                                   
                         
                         
                     </tr>
               <?php
            
       
       
           /*codigo obsoleto guardado para referencia        
           $result = mysql_query("select * from clientes");
             
             while($row = mysql_fetch_array($result)){ 
             */   
            
            $result = $conexion->query("select * from clientes "); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                ?>

                <tr>
                    <td id= "fila"><?php echo $row["ID_CLIENTE"]; ?></td>
                    <td id= "fila"><?php echo $row["NOMBRE_CLIENTE"]; ?></td>
                    <td id= "fila"><?php echo $row["EMAIL"]; ?></td>
                    <td id= "fila"><?php echo $row["TELEFONO"]; ?></td>
                    <td id= "fila"><?php echo $row["DIRECCION"]; ?></td>
                   
                  
                </tr>
                <?php 
             }
           
       ?>
       </table>
       
       <button id="agregar">Agregar</button>
       
      <div id= "formulario">
           <form action="insertar_cliente.php" method="POST" name="form" >       
          
           
           <input type="text" name="nombre" placeholder="Nombre" id="txt" required >
           
           <input type="email" name="email" placeholder="E-mail"  id="txt" required >
           <input type="tel" name="telefono" placeholder="Telefono (55)xx-xx-xx-xx"  id="txt" required >
           <input type="text" name="direccion" placeholder="Direccion"  id="txt" required >
           
           <input type="submit" value="Insertar" id="boton2">
      
          
       </form>
       
               <div  id="cancelar"> <button  id="boton">Cancelar</button> </div>       
      
       </div>
       
      <div id=delete>
       <button id="eliminar">Eliminar</button>
       </div>
       
          <div id ="formulario2">
          
          <form action="eliminar_cliente.php" method="POST" name="form2" id="form2">
          <input type="text" name="eliminar" placeholder="Ingrese codigo cliente"  id="select" >
          
              <button type="submit" value="Aceptar" id="boton_form2">Aceptar</button>
           </form>
            <div  id="cancelar2"> <button  id="boton_cancelar">Cancelar</button> </div>       
      
       </div>
       
       
       
   </section>
    
</body>