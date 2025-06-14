<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando</title>
    <link rel="stylesheet" href="style/estilo_pago_credito.css"/>
    
</head>
<body>
<section id = "contenedor">
    
  <?php 
        include 'conexion.php';
    

        $query = " SELECT total, cantidad_pagada, cambio, tipo_pago FROM temporal_credito";
        $stmt = $conexion->query($query);

        if($stmt -> num_rows > 0 ) {

             while ($fila = $stmt ->fetch_array(MYSQLI_ASSOC)){
                
                 $total = $fila['total'];
                $cantidad_pagada = $fila['cantidad_pagada'];
                $cambio =  $fila['cambio'];
                $tipo_pago = $fila['tipo_pago'];
            
             }



        }

        else {

             ?><div id = "error"><a> Error </a></div> <?php 
    mysql_error();

        }

              ?>
    
    <h1> Inserte tarjeta a terminal</h1>
    <h1> Inngrese la cantidad   <?php echo  $total  ?></h1>
    <h1> Seleccione si la tarjeta fue aceptada o rechazada</h1>


    
    <img src="img/animacion_tarjeta.gif"></img>
    
    <div>
     
     <h2></h2>
     

    
        <?php
    
      //  $consulta = mysql_query("SELECT  total, cantidad_pagada, cambio, tipo_pago FROM temporal_credito ");
    

        
        //error de consulta
        /*
if(!$consulta){
    ?><div id = "error"><a> Error </a></div> <?php 
    mysql_error();
}
else {

    $fila = mysql_fetch_row($consulta);
    
    $total = $fila[0];
    $cantidad_pagada = $fila[1];
    $cambio =  $fila[2];
    $tipo_pago = $fila[3];
    
}
    
*/
    
    ?>
        
 
       

     <form action= "tarjeta_aceptada.php" method="post">
     
    <input type = "hidden" name= "total" value = "<?php echo $total  ?>">
     
    <input type = "hidden" name= "cantidad_pagada" value = "<?php echo $cantidad_pagada  ?>">
    
    <input type = "hidden" name= "cambio" value = "<?php echo $cambio  ?>">
    
    <input type = "hidden" name= "tipo_pago" value = "<?php echo $tipo_pago  ?>">
     
      <button type = "submit"  value ="Aceptada">Aceptada</button> 
      
        </form>
        
        
        
        <form action = "tarjeta_rechazada.php" method="post">
       <button type = "submit">Rechazada</button>
       </form>
    </div>
    
</section>
    
        
            
                    
</body>
</html>