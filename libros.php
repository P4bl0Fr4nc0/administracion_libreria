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
    <script src="js/ocultardiv.js"></script>
     <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>
    <title>libros</title>
</head>
<body>
   <section id="contenedor">

       <div id="subtitulo"> <h1>Libros</h1></div>
       
       
 
         <table id='datos'>
             
             
             
             <tr >
                 
             </tr>
              
                     <tr >
                         <td id ='title2'>ISBN</td>
                         <td id ='title2'>Titulo</td>
                         <td id ='title2'>Codigo Autor</td>
                         <td id ='title2'>Codigo Editorial</td>
                         <td id ='title2'>Edicion</td>
                         <td id ='title2'>Lugar de edicion</td>
                         <td id ='title2'>Numero de edicion</td>
                         <td id ='title2'>Precio</td>
                         <td id ='title2'>Cubierta</td>
                         <td id ='title2'>Paginas</td>
                         <td id ='title2'>Estanteria</td>
                         <td id ='title2'>Stock</td>
                         <td id ='title2'>Codigo de barras</td>
                         
                         
                     </tr>
                     

                     <style type="text/css">
                         .lightcoral {
                             background-color: red;
                         }
                         
                         .lightyellow {
                             background-color: yellow;
                         }    
                         
                         .green {
                             background-color: green;
                         }
                         
             
                    </style>
                     
                    
               <?php
             
             
             $array_colores = array (
             0 => 'lightcoral',
             1 => 'lightcoral',
             2 => 'lightcoral',
             3 => 'lightcoral',
             4 => 'lightyellow',
             5 => 'lightyellow',
             6 => 'lightyellow',
             7 => 'green',
             8 => 'green',
             9 => 'green',
             10 => 'green',
             11 => 'green',
             12 => 'green',
             13 => 'green',
             14 => 'green',
             15 => 'green',
             16 => 'green',
             17 => 'green',
             18 => 'green',
             19 => 'green',
             20 => 'green',
     
             );
             
             
                
       
    
           //$result = mysql_query("select * from libro");
           $result = $conexion->query("select * from libro ");                 
             while($row = $result->fetch_array(MYSQLI_ASSOC)){
                
                ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["ISBN"]; ?></td>
                    <td id= "fila"><?php echo $row["TITULO"]; ?></td>
                    <td id= "fila"><?php echo $row["CODIGO_AUTOR"]; ?></td>
                    <td id= "fila"><?php echo $row["CODIGO_EDITORIAL"]; ?></td>
                    <td id= "fila"><?php echo $row["EDICION"]; ?></td>
                    <td id= "fila"><?php echo $row["LUGAR_EDICION"]; ?></td>
                    <td id= "fila"><?php echo $row["NUMERO_EDICION"]; ?></td>
                    <td id= "fila"><?php echo $row["PRECIO_VENTA"]; ?></td>
                    <td id= "fila"><?php echo $row["TIPO_CUBIERTA"]; ?></td>
                    <td id= "fila"><?php echo $row["PAGINAS"]; ?></td>
                    <td id= "fila"><?php echo $row["ESTANTERIA"]; ?></td>
                   <td class=" <?php echo $array_colores[$row['NUMERO_EJEMPLARES']];?> "><?php echo $row["NUMERO_EJEMPLARES"]; ?></td>    
                   <td id= "fila"><?php echo $row["CODIGO_BARRAS"]; ?></td>
                </tr>
                <?php 
             }
           
       ?>
                                   
      </table>
      
      <table id = "tabla_alerta">
          <td id="color" style="background: red;"></td>
          <td id="texto">alerta de stock</td>
          <td id="color" style="background: yellow;"></td>
          <td id="texto"> Stock por terminarse</td>
          <td id="color" style="background: green;"></td>
          <td id="texto"> Sin problema de stock</td>
          
      </table>
      
      
      <button id="agregar">Agregar</button>
     
      <div id="formulario">
           <form action="insertar_libreria.php" method="POST" name="form" >
           
          
           
           <input type="text" name="isbn" placeholder="ISBN" id="txt" required >
           
           <input type="text" name="titulo" placeholder="Titulo"  id="txt"  required  >
           
           <select type="text" name="codigo_autor" placeholder="Codigo Autor"  id="txt" required  >
           
            <!-- SELECT (LISTA DESPLEGABLE) FORMULARIO PARA PODER ESCOGER CODIGO DE AUTOR-->
           <option value="0">Codigo Autor</option>
           
           <?php
                   include 'conexion.php';
                   
                   //$query = mysql_query("SELECT CODIGO_AUTOR FROM autor") or die (mysql_error());
                   $query = $conexion->query("SELECT CODIGO_AUTOR FROM autor");
                   
                   
                   //while ($valores = mysql_fetch_array($query))
                  
                  while($valores = mysqli_fetch_array($query, MYSQLI_ASSOC))
                   {
                       
                       ?>
                   <option value="<?php echo $valores['CODIGO_AUTOR']?>">
                   
                   <?php echo $valores['CODIGO_AUTOR'];?> </option>
                   <?php
                   }
                   ?>
                   
           
               </select>
               
                <!-- FIN SELECT-->
           <!-- SELECT (LISTA DESPLEGABLE) FORMULARIO PARA PODER ESCOGER CODIGO DE EDITORIAL-->
           <select type="text" name="codigo_editorial" placeholder="Codigo Editorial"  id="txt" required>
                  
                  
                   <option value="0">Codigo Editorial</option>
                   
                   <?php
                   include 'conexion.php';
                   
                  // $query = mysql_query("SELECT CODIGO_EDITORIAL FROM editorial") or die (mysql_error());
                  $query = $conexion->query("SELECT CODIGO_EDITORIAL FROM editorial");
                   
                   
                   
                   //while ($valores = mysql_fetch_array($query)){
                    while($valores = mysqli_fetch_array($query, MYSQLI_ASSOC))
                    {
                       
                       ?>
                   <option value="<?php echo $valores['CODIGO_EDITORIAL']?>">
                   
                   <?php echo $valores['CODIGO_EDITORIAL'];?> </option>
                   <?php
                   }
                   ?>
                   
               
                   
               </select>
               
               <!-- FIN DE LISTA DESPLEGABLE EDITORIAL-->
           
           <input type="text" name="edicion" placeholder="Edicion"  id="select"  required >
           
           <input type="text" name="lugar_edicion" placeholder="Lugar Edicion"  id="txt" required  >
          
           <input type="text" name="numero_edicion" placeholder="Numero Edicion"  id="txt" required  >                          
           
           <input type="number" name="precio" placeholder="Precio"  id="txt" required  >
           
           <input type="text" name="cubierta" placeholder="Cubierta"  id="txt" required  >
           
           <input type="number" name="paginas" placeholder="Paginas"  id="txt" required  >

           <input type="text" name="estanteria" placeholder="Estanteria"  id="txt" required  >

           <input type="number" name="ejemplares" placeholder="No. ejemplares"  id="txt"  required >

            <input type="text" name="barras" placeholder="Codigo de barras"  id="txt"  required >

           
           
           
           <input type="submit" value="Insertar" id="boton2">
    
       </form>
         <div  id="cancelar"> <button  id="boton">Cancelar</button> </div>       
      
       </div>
       
       <div id=delete>
       <button id="eliminar">Eliminar</button>
       </div>
       
       <!-- formulario 2 -->
       
       <div id ="formulario2">
          
          <form action="eliminar_libreria.php" method="POST" name="form2" id="form2">
          <input type="text" name="eliminar" placeholder="Ingrese ISBN"  id="select" >
          
              <button type="submit" value="Aceptar" id="boton_form2">Aceptar</button>
           </form>
            <div  id="cancelar2"> <button  id="boton_cancelar">Cancelar</button> </div>       
      
       </div>
         
         
         <h2>Agregar libros al Stock</h2> 
          
          <form action="agrega_stock.php" method="post" id="form3">
          
          <label>Cuantos libros queres agregar</label>
          
          <input type="text" name="numero" placeholder="No de libros"  id="select" required >
          
             <label id="segundo">¿Cual libro?</label>
          
          <input type="text" name="agregar" placeholder="Ingrese ISBN"  id="select" required>
      
         <button  id="agregar_stock"  type="submit" >Agregar Stock</button>        
      
       </form>
           
           
           
       
       
       
       
   </section>
    
</body>
</html>