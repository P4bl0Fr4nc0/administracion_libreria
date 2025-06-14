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
    <title>categorias</title>
</head>
<body>
   <section id="contenedor5"> 
      <div id="subtitulo"> <h1>Categorias</h1></div>
      
            
            <table id='datos'>            
             
         
             
              
                <tr >
                         <td id ='title2'>Codigo Categoria</td>
                         <td id ='title2'>Nombre Categoria</td>
                    
                                   
                         
                         
                     </tr>
               <?php
                    
       
          /*Codigo obsoleto mantenido como referencia
           $result = mysql_query("select * from tema");
             
             while($row = mysql_fetch_array($result)){ 
            */

            $result = $conexion->query("select * from tema"); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

              ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["CODIGO_TEMA"]; ?></td>
                    <td id= "fila"><?php echo $row["NOMBRE_TEMA"]; ?></td>
                   
                  
                </tr>
                <?php 
             }
           
       ?>
                                   
      </table>
      
        <button id="agregar">Agregar</button>
     
      <div id= "formulario">
           <form action="insertar_categoria.php" method="POST" name="form" >
           
          
           
           <input type="text" name="codigo_categoria" placeholder="Codigo Categoria" id="txt" required >
           
           <input type="text" name="nombre_categoria" placeholder="Nombre Categoria"  id="txt" required   >
           
           <input type="submit" value="Insertar" id="boton2">
      
          
       </form>
       
               <div  id="cancelar"> <button  id="boton">Cancelar</button> </div>       
      
       </div>
       
         <div id=delete>
       <button id="eliminar">Eliminar</button>
       </div>
       
          <div id ="formulario2">
          
          <form action="eliminar_categoria.php" method="POST" name="form2" id="form2">
          <input type="text" name="eliminar" placeholder="Ingrese codigo categoria"  id="select" >
          
              <button type="submit" value="Aceptar" id="boton_form2">Aceptar</button>
           </form>
            <div  id="cancelar2"> <button  id="boton_cancelar">Cancelar</button> </div>       
      
       </div>

       
   </section>
    
</body>