<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ventas</title>
     <link rel="stylesheet" href="style/estilo_frame.css"/>
</head>
<body>
    
</body>
</html>
<?php

 error_reporting (0);  
include 'conexion.php';


  
    
$fecha_inicial=$_POST['fecha_inicial'];
$fecha_final=$_POST['fecha_final'];
    




    

    ?>
    <table id='datos'>
             
             
             
             <tr >
                 
             </tr>
              
                     <tr >
                         <td id ='title2'>Codigo Venta</td>
                         <td id ='title2'>Total</td>
                         <td id ='title2'>Pagado</td>
                         <td id ='title2'>Cambio</td>
                         <td id ='title2'>tipo de pago</td>
                         <td id ='title2'>Fecha de Venta</td>
                       
                        
                         
                         
                     </tr>
               <?php
             header('Content-Type: text/html; charset=ISO-8859-1');
       
   include 'conexion.php';
       
       
    
         // codigo obsoleto  $result = mysql_query("select * from ventas where  venta_fecha between '$fecha_inicial' and '$fecha_final' ");

           $result = $conexion->query("select * from ventas WHERE  venta_fecha between '$fecha_inicial'  and '$fecha_final'" );                    
             while($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
                
                <tr>
                    <td id= "fila"><?php echo $row["id_venta"]; ?></td>
                    <td id= "fila"><?php echo $row["total"]; ?></td>
                    <td id= "fila"><?php echo $row["cantidad_pagada"]; ?></td>
                    <td id= "fila"><?php echo $row["cambio"]; ?></td>
                    <td id= "fila"><?php echo $row["tipo_pago"]; ?></td>                    
                    <td id= "fila"><?php echo $row["venta_fecha"]; ?></td>
                   
                </tr>
 <?php
             }
           
       ?>
                                   
      </table>
    <?php


//$result = mysql_query("SELECT total FROM ventas  WHERE venta_fecha between '$fecha_inicial' and '$fecha_final' ");

$result2 = $conexion->query("Select SUM(total) AS total from ventas where venta_fecha between '$fecha_inicial' and '$fecha_final'" ); 

if($result2->num_rows > 0){
    $fila = $result2->fetch_assoc();
    $total =$fila["total"]
    ?>
<a>Total ganancias periodo:</a><a > <strong>$ <?php echo $total; ?> </strong> </a>
<?php    
}

else {

    ?>
    <a>Total ganancias periodo:</a><a > <strong> <?php echo "sin ganancias"; ?> </strong> </a>
    <?php
}
  
//$total= "0";

//while ($row2 = mysql_fetch_object($result2)){
  //  $total = $total + $row2->["total"];
//}

/*?>
<a>Total ganancias periodo:</a><a > <strong>$ <?php echo $total; ?> </strong> </a>
<?php    
  */  

   




?>