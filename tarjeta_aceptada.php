<?php
// definiendo variables
/*
$total=$_POST['total'];
$cantidad_pagada  = $_POST['cantidad_pagada'];
$forma_pago =$_POST['tipo_pago'];
*/

include  'conexion.php';
$cambio = 0;

$query = "Select total, cantidad_pagada, cambio, tipo_pago FROM temporal_credito";
$result = $conexion->query($query);

if ($result->num_rows > 0 ){
    $row = $result->fetch_assoc();
    $total = $row['total'];
    $cantidad_pagada = $row['cantidad_pagada'];
    $forma_pago = $row['tipo_pago'];
}
else {
    echo "error inesperado";
}

//variable cambio
 
require 'conexion.php';
 date_default_timezone_set('America/Mexico_City');
$fecha_venta = date('y/m/d');

$query2 = "INSERT INTO ventas (total,cantidad_pagada,cambio, tipo_pago, venta_fecha ) VALUES (
          ?,
          ?,
          ?,
          ?,
          ?)";           
            $stmt2 = $conexion->prepare($query2);
             $stmt2 -> bind_param("sssss", $total, $cantidad_pagada, $cambio, $forma_pago, $fecha_venta);
          

    if($stmt2->execute()){

        ?>
     
    
     <script class = '.color_texto_mensaje '>        
         alert("Gracias por su compra");
         window.location.href='caja.php';
         
         
    // ventana para agregar cliente 
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("venta_cliente.php", "agregar", opciones);
    
</script> <?php 
    
         // eliminar datos de la tabla temporal_credito: tabla temporal de donde se obtienen los datos parta el pago con tarjeta de credito o debito
         
          $query3="TRUNCATE TABLE temporal_credito";
           $stmt3 = $conexion->prepare($query3);
             $stmt3 ->execute();
         
                if (!$stmt3->execute()){
                     ?><div id = "error"><a> Error al guardar</a></div> <?php 

                }
                else {

                }

           // eliminar datos de la tabla libros_venta: tabla temporal para hacer la suma  del precio de los libros que quiere comprar el cliente
          $query4="TRUNCATE TABLE libros_venta";
           $stmt4 = $conexion->prepare($query4);
             $stmt4 ->execute();
         
                if (!$stmt4->execute()){
                     ?><div id = "error"><a> Error al guardar</a></div> <?php 

                }
                else {

                }      

             
        $stmt2->close();
        $stmt3->close();
        $stmt4->close();

    }
  




/*
    
    $ejecutar=mysql_query($sql);
        
        //error de consulta
if(!$ejecutar){
    ?><div id = "error"><a> Error proceso de pago</a></div> <?php 
    mysql_error();
}
else {
    
    // si la consulta se hace de manera correcta

*
    ?>    
         
          <script> 
              
              alert("Gracias por su compra")
              window.location.href='caja.php';
              
                 // abrir ventana para agregar cliente          
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("venta_cliente.php", "agregar", opciones);
   

</script> 
          

 <?php 
    
         // eliminar datos de la tabla libros_venta: tabla temporal para hacer la suma  del precio de los libros que quiere comprar el cliente
}
    
//Consulta para eliminar datos temporal_credito con tarjeta

          $sql2="TRUNCATE TABLE temporal_credito";
         
         
         $ejecutar=mysql_query($sql2);
if(!$ejecutar){
    ?><div id = "error"><a> Error de proceso</a></div> <?php 
    mysql_error();
}
else { 
}

//Consulta para eliminar   libros_venta temporal  (Suma del precio de los lbros a comprar);
          $sql2="TRUNCATE TABLE libros_venta";
         
         
         $ejecutar=mysql_query($sql2);
if(!$ejecutar){
    ?><div id = "error"><a> Error de proceso</a></div> <?php 
    mysql_error();
}
else { 
}

*/
?>     
      
     <script> 
         window.location.href='caja.php';
         
 
         
</script> 

