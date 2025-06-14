	 <link rel="stylesheet" href="style/estilo_frame.css"/>

<?php

require 'suma_caja.php';

// definiendo variables

$cantidad_pagar=$_POST['cantidad_pagar'];
$forma_pago =$_POST['tipo_pago'];


//variable cambio
 $cambio = $cantidad_pagar - $total; 


// si el pago es en efectivo--------------------------------------------------------------------------

if ($forma_pago == 'Efectivo'){


// si el total es mayor a la cantidad a pagar el sistema no hace nada te regresa a la pagina de pago
if ($total > $cantidad_pagar ) {
    
  
?> <script> window.location.href='caja.php';

alert("La ingresada para pagar es menor");
</script> <?php   
}
    
    // si el pago es mayor que el total realiza el proceso de pago
    else {     
        date_default_timezone_set('America/Mexico_City');
       $fecha_venta = date('y/m/d');
       // $fecha_venta = "1990-06-28";       
   
        
      


          $query = "INSERT INTO ventas (total,cantidad_pagada,cambio, tipo_pago, venta_fecha ) VALUES (
          ?,
          ?,
          ?,
          ?,
          ?)";           
            $stmt = $conexion->prepare($query);
             $stmt -> bind_param("sssss", $total, $cantidad_pagar, $cambio, $forma_pago, $fecha_venta);
           

    if($stmt->execute()){

        ?>
     
    
     <script class = '.color_texto_mensaje '>
         alert("Cambio:  <?php  echo $cambio   ?>");
         alert("Gracias por su compra");
         window.location.href='caja.php';
         
         
    // ventana para agregar cliente 
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("venta_cliente.php", "agregar", opciones);
    
</script> <?php 
    
         // eliminar datos de la tabla libros_venta: tabla temporal para hacer la suma  del precio de los libros que quiere comprar el cliente
         
          $query2="TRUNCATE TABLE libros_venta";
           $stmt2 = $conexion->prepare($query2);
                $stmt2 ->execute();
         
                if (!$stmt2->execute()){
                     ?><div id = "error"><a> Error al guardar</a></div> <?php 

                }
                else {

                }
            
                 $stmt->close();
                 $stmt2->close();
    }

    else {
        ?><div id = "error"><a> Error al guardar</a></div> <?php 
    } }

   
}

//------------------------------------------------------------------------------------------
    
// forma de pago a credito //---------------------------------------------------------------
    elseif ($forma_pago=='Credito'){

        if ($total > $cantidad_pagar ) {
    
  
?> <script> window.location.href='caja.php';

alert("La ingresada para pagar es menor");
</script> <?php   
}
    elseif ($total == $cantidad_pagar){



         
          $query3 = "INSERT INTO temporal_credito (total,cantidad_pagada,cambio, tipo_pago ) VALUES (
          ?,
          ?,
          ?,
          ?)";           
            $stmt3 = $conexion->prepare($query3);
             $stmt3 -> bind_param("ssss", $total, $cantidad_pagar, $cambio, $forma_pago);
            $stmt3 ->execute();


          if($stmt3->execute()){

        ?>
     
    
     <script class = '.color_texto_mensaje '>
         
         alert("Se abrira la ventana del proceso de pago con tarjeta");
         window.location.href='caja.php';
         
         
    // ventana para agregar cliente 
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("venta_cliente.php", "agregar", opciones);

    window.location.href='proceso_credito.php';


</script>


 <script> window.location.href='caja.php';</script> 
    
    
    
</script> <?php 


    $stmt3->close();

    }

    

    }
    else {

         ?> <script> window.location.href='caja.php';

    alert("Con tarjeta de credito la cantidad a pagar tiene que ser exacta");

</script>  <?php

     }

      

     } 

    //------------------------------------------------------------------------------------------

    // forma de pago a debito //---------------------------------------------------------------

  elseif ($forma_pago=='Debito'){

        if ($total > $cantidad_pagar ) {
    
  
?> <script> window.location.href='caja.php';

alert("La ingresada para pagar es menor");
</script> <?php   
}
    elseif ($total == $cantidad_pagar){


               
          $query4 = "INSERT INTO temporal_credito (total,cantidad_pagada,cambio, tipo_pago ) VALUES (
          ?,
          ?,
          ?,
          ?)";           
            $stmt4 = $conexion->prepare($query4);
             $stmt4 -> bind_param("ssss", $total, $cantidad_pagar, $cambio, $forma_pago);
            $stmt4 ->execute();


          if($stmt4->execute()){

        ?>
     
    
     <script class = '.color_texto_mensaje '>
         
         alert("Se abrira la ventana del proceso de pago con tarjeta");
         window.location.href='caja.php';
         
         
    // ventana para agregar cliente 
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("venta_cliente.php", "agregar", opciones);

    window.location.href='proceso_credito.php';


</script>


 <script> window.location.href='caja.php';</script> 
    
    
    
</script> <?php 


        $stmt4->close();

    }

    

    }
    else {

         ?> <script> window.location.href='caja.php';

    alert("Con tarjeta de credito la cantidad a pagar tiene que ser exacta");

</script>  <?php

     }

     
      

     }


     // si no escogio forma de pago

     else {

        ?>  <script>
            alert("Seleccione forma de pago") window.location.href='caja.php';</script> <?php   

     }

    
      /* codigo obsoleto guardado como referencia  contiene vulnerabilidades      
        
        $sql="INSERT INTO ventas (total,cantidad_pagada,cambio, tipo_pago, venta_fecha ) VALUES('$total',
       '$cantidad_pagar',
       '$cambio',
       '$forma_pago',
       '$fecha_venta')";

          $ejecutar=mysql_query($sql);

        

    
        //----------------------------------------------------------------------------       
        //error de consulta
        if(!$ejecutar){
        ?><div id = "error"><a> Error al guardar</a></div> <?php 
        mysql_error();
        }
        else {
    
         // si la consulta se hace de manera correcta
        ?>
     
    
        <script class = '.color_texto_mensaje '>
         alert("Cambio:  <?php  echo $cambio   ?>");
         alert("Gracias por su compra");
         window.location.href='caja.php';
         
         
        // ventana para agregar cliente 
        var posicion_x = (screen.width/2) - (800/2);     
        var posicion_y = (screen.height/2) - (600/2);
    
        var opciones = "whidht= 300, height = 300, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
        window.open("venta_cliente.php", "agregar", opciones);


            </script> <?php 
    
         // eliminar datos de la tabla libros_venta: tabla temporal para hacer la suma  del precio de los libros que quiere comprar el cliente
         
          $sql2="TRUNCATE TABLE libros_venta";
         
         
            $ejecutar=mysql_query($sql2);
        if(!$ejecutar){
        ?><div id = "error"><a> Error de proceso</a></div> <?php 
            mysql_error();
        }
        else { 
        }

        }
    
    
    
        }

        }

        //si la forma de pago es a credito 

        elseif ($forma_pago == 'Credito') {
    
    //Si la cantidad es menor al monto a pagar no hace nada

    if ($total > $cantidad_pagar ) {
    
  
?> <script> window.location.href='caja.php';

    alert("Con tarjeta de credito la cantidad a pagar tiene que ser exacta");

</script> <?php   
}
    
    // si la cantidad es la correcta abre ventana para proceso de pago por tarjeta 
    elseif ($total == $cantidad_pagar) {     
       
    
     $sql3="INSERT INTO temporal_credito (total,cantidad_pagada,cambio, tipo_pago) VALUES('$total',
       '$cantidad_pagar',
       '$cambio',
       '$forma_pago')";
    
    $ejecutar=mysql_query($sql3);
        
        //error de consulta
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar</a></div> <?php 
    mysql_error();
}
else {
    
    // si la consulta se hace de manera correcta
}
     ?>
        

<script type="text/javascript">
  /*  
    var posicion_x = (screen.width/2) - (800/2);     
    var posicion_y = (screen.height/2) - (600/2);
    
    var opciones = "whidht= 300, height = 600, scrollbars= NO, left= " + posicion_x + ", top ="+ posicion_y + "";
    
    window.open("proceso_credito.php", "procesando", opciones);
    
    */ /*

    window.location.href='proceso_credito.php';


</script>


 <script> window.location.href='caja.php';</script> 
    
    <?php
        
    }
    
    else {
        
       ?> <script> window.location.href='caja.php';

    alert("Con tarjeta de credito la cantidad a pagar tiene que ser exacta");

</script>  <?php
        
    }
}


// si no escogio forma de pago 
else {
?> <script> window.location.href='caja.php';</script> <?php      
}
*/



?>