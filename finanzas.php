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
    <title>Finanzas</title>
     <link rel="stylesheet" href="style/estilo_frame.css"/>
</head>
<body>
   
    <section id="contenedor8">
   
   <div id="subtitulo"> <h1>Finanzas</h1></div>
    
    
    <?php
        date_default_timezone_set('America/Mexico_City');
        
        $fecha = date('d/m/y');
        $fecha_consulta = date ('y/m/d');
        
        
        
   
      
/*       

//$result = mysql_query("SELECT total FROM ventas  WHERE venta_fecha =  '$fecha_consulta' ");
$result = $conexion->query("SELECT total FROM ventas  WHERE venta_fecha =  '$fecha_consulta'"); 

$total= "0";

//while ($row = mysql_fetch_object($result)){
  
while ($row = $result->fetch_object()){
    $total = $total + $row->total;
}

*/
$query = "SELECT SUM(total) AS ventas_dia FROM ventas WHERE venta_fecha = '$fecha_consulta'";
$result= $conexion->query($query);

if ($result->num_rows>0){
$row =$result->fetch_assoc();
$total = $row['ventas_dia'];

}

else {
    $total=0;
    

}


    ?>
    
<a>Fecha: </a> <a><strong> <?php echo $fecha; ?> </strong></a>
  <br>  
  <br> 
        <a>Total ventas hoy:</a><a > <strong> $<?php echo $total; ?> </strong> </a>

   <br>
   <br>
   <br>
   
   <a>Ventas por periodo</a>
   <br>
   <br>
   <br>
   <form  method="post" name="form" >
       
        <label>Seleccion Fecha inicial:</label><input type="date" name="fecha_inicial" placeholder="yyyy/mm/dd"><br>
       
       
       <label>Selecciona Fecha Final:</label><input type="date" name="fecha_final" placeholder="yyyy/mm/dd">
       <button type="submit">Consultar</button>
   </form>
   
   
   <?php include 'ventas_periodo.php'  ?>
    
    
    <script>
        function cargar_pagina(){
        form.action='ventas_periodo.php';
            form.submit();
        }
        </script>
    
    </section>
    
    
    
    
</body>
</html>