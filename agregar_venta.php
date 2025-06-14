  <link rel="stylesheet" href="style/error_insertar.css"/>    
      <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>



<?php

//Seleccion de datos de acuerdo al codigo de barras insertado por el usuario

include  'conexion.php';




$codigo_barras=$_POST['codigo_barras'];

//Seleccionar titulo, numero de ejemplares y precio de venta

 // $registro_seleccion = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE CODIGO_BARRAS = '$codigo_barras'") or die ("error de proceso".mysql_error());

  $query = "Select TITULO, PRECIO_VENTA, NUMERO_EJEMPLARES From libro WHERE CODIGO_BARRAS = ?";
  $stmt = $conexion->prepare($query); 
  $stmt -> bind_param("s", $codigo_barras);   
  $stmt ->execute();
  $resultado=$stmt->get_result();
  $fila = $resultado->fetch_assoc();
  

  $stock = $fila['NUMERO_EJEMPLARES'];
  $titulo =$fila['TITULO'];
  $precio = $fila ['PRECIO_VENTA'];

/*while ($registrolibro = mysql_fetch_array($registro_seleccion)){
  
   $stock = $registrolibro['NUMERO_EJEMPLARES'];
    
}*/

//Comprobamos si hay stock
if ($stock == 0) {
    
    ?>
    
    <script> 
        
        alert("Ya no hay ejemplares del libro solicitado");
        window.location.href='caja.php';
</script>
    
    <?php
    
    
}

else {
    
    
//Insertar en la tabla libros venta OJO: tabla libros venta es contiene datos temporales para poder realizar la operacion para la venta
    
  $query2 = "INSERT INTO libros_venta (nombre_libro,precio) VALUES (?,?)";
  $stmt2 = $conexion->prepare($query2);
  $stmt2 -> bind_param("sd", $titulo,$precio);
 
 
//EJECUTAMOS SENTENCIA
 if($stmt2->execute()) {
?> <script> window.location.href='caja.php';</script>    
<?php
 
// Actualizacion del numero de ejemplares en el stock

$nuevo_numero_ejemplares = $stock - 1;

$query3 = "UPDATE libro  SET NUMERO_EJEMPLARES = ? WHERE CODIGO_BARRAS = ?";
  $stmt3 = $conexion->prepare($query3);
  $stmt3 -> bind_param("is", $nuevo_numero_ejemplares,$codigo_barras);
  $stmt3 -> execute();
  $stmt()->close();
  $stmt2->close();
  $stmt3->close();

}
else
 {
    echo "Error inesperado";
 }

}


       /*       
  


$insertar="INSERT INTO libros_venta (nombre_libro,precio) VALUES('$fila[0]',
       '$fila[1]')";

 
$ejecutar=mysql_query($insertar);
if(!$ejecutar){
  
    mysql_error();
}
else {  
   
    //Quitar de stock
    
    $registro = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE CODIGO_BARRAS = '$codigo_barras'") or die ("error de proceso".mysql_error());


while ($reg = mysql_fetch_array($registro)){
    
    echo $reg['NUMERO_EJEMPLARES'];
    
    $nuevo_numero = $reg['NUMERO_EJEMPLARES'] - 1;
    
    
}

$actualizacion = mysql_query("UPDATE libro  SET NUMERO_EJEMPLARES = $nuevo_numero WHERE CODIGO_BARRAS = $codigo_barras") or die ("error de proceso". mysql_error());
                                                                                                                                  
}
  
    
}

else {

  $registro_seleccion = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE CODIGO_BARRAS = '$codigo_barras'") or die ("error de proceso".mysql_error());

$seleccion =" SELECT TITULO, PRECIO_VENTA FROM libro WHERE CODIGO_BARRAS = '$codigo_barras'";
$ejecutar1 = mysql_query($seleccion);
if (!$ejecutar1){
    echo 'no se pudo ejecutar la consulta'. mysql_error();
 
    
}

$fila = mysql_fetch_row($ejecutar1);

echo $fila[0];

echo $fila[1];
              
              
        
//Insertar en la tabla libros venta OJO: tabla libros venta es contiene datos temporales para poder realizar la operacion para la venta




$insertar="INSERT INTO libros_venta (nombre_libro,precio) VALUES('$fila[0]',
       '$fila[1]')";




//EJECUTAMOS SENTENCIA

$ejecutar=mysql_query($insertar);
if(!$ejecutar){
  
    mysql_error();
}
else {  
    ?> <script> window.location.href='caja.php';</script>    
<?php
    
    
    
    //Quitar de stock
    
    $registro = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE CODIGO_BARRAS = '$codigo_barras'") or die ("error de proceso".mysql_error());


while ($reg = mysql_fetch_array($registro)){
    
    echo $reg['NUMERO_EJEMPLARES'];
    
    $nuevo_numero = $reg['NUMERO_EJEMPLARES'] - 1;
    

    
}




$actualizacion = mysql_query("UPDATE libro  SET NUMERO_EJEMPLARES = $nuevo_numero WHERE CODIGO_BARRAS = $codigo_barras") or die ("error de proceso". mysql_error());
                                                                                                                                  


 
    

}
    
}




*/





?>


