<?php
require 'conexion.php';



// se selecciona el nombre del libro de la tabla temporal libros_ vrenta

$query = "SELECT nombre_libro FROM libros_venta";
$stmt = $conexion->query($query);

if ($stmt -> num_rows > 0){

    while ($fila = $stmt ->fetch_array(MYSQLI_ASSOC)){
        $titulo = $fila['nombre_libro'];



        // se realiza el query para regresar el numero de stock del ejemplar que no se vendio
        $query2 ="UPDATE libro  SET NUMERO_EJEMPLARES = NUMERO_EJEMPLARES + 1 WHERE TITULO = '$titulo'";
         $conexion->query($query2);

    }

    // se eliminan datos de la tabla temporal de libros_venta para procesar la venta
    $query2 = "TRUNCATE TABLE libros_venta";
    $stmt2 = $conexion->query($query2);


    // se eliminan datos de la tabla temporal credito en caso de que se haya querido intentar el pago con tarjeta
    $query3 ="TRUNCATE TABLE temporal_credito";
     $stmt3 = $conexion->query($query3);


    if($stmt2===true AND $stmt3 === true){
        ?> <script> 
        alert("Venta Cancelada");
        window.location.href='caja.php';</script>    
        <?php
    }
    else {
        ?> <script>
        alert("Ocurrio un error inesperado favor de reiniciar la sesión, si el problema persiste contacta al administrador");
        window.location.href='caja.php';</script> </script>
        <?php
    }



}

else {

    ?> <script>
        alert("No hay venta activa");
        window.location.href='caja.php';</script> </script>
        <?php

}

/*


// Seleccionamos el nombre del libro de la tabla temporal libros_venta
$query = "SELECT nombre_libro From libros_venta";
$stmt = $conexion->query($query);

echo $stmt -> num_rows;


if ($stmt-> num_rows > 0 ) {

 while ($fila = $stmt->fetch_array(MYSQLI_ASSOC)){

    echo $fila['nombre_libro'];


    // Seleccionamos el numero de ejemplearos de la tabla libro y le sumamos 1 para revertitr los cambios en la tabla 
    $query2 = "Select NUMERO_EJEMPLARES From libro WHERE TITULO = '?'";
    $stmt2 = $conexion->prepare($query2);
    $stmt2-> bind_param("s", $fila['nombre_libro']);
    $stmt2-> execute();

    while ($fila2 = $stmt2->fetch_array(MYSQLI_ASSOC)){
    
        echo $fila2['NUMERO_EJEMPLARES'];

        $nuevo_numero = $fila2['NUMERO_EJEMPLARES'] + 1;


        $query3 = "UPDATE libro  SET NUMERO_EJEMPLARES = '?' WHERE TITULO = '?'";
        $stmt3 = $conexion->prepare($query3);
        $stmt3-> bind_param("is", $nuevo_numero,$libros);
        $stmt3-> execute();
    
    
    }

 }



}


else {
    echo $stmt -> num_rows;
    echo "Error: no tienes una venta activa";
}

/*




// Seleccionamos el numero de ejemplearos de la tabla libro y le sumamos 1 para revertitr los cambios en la tabla 
$query2 = "Select NUMERO_EJEMPLARES From libro WHERE TITULO = '?'";
$stmt2 = $conexion->prepare($query2);
$stmt2-> bind_param("s", $libros);
$stmt2-> execute();
$resultado2=$stmt2->get_result();
$fila2 = $resultado2->fetch_assoc();

$numero_ejemplares = $fila2['NUMERO_EJEMPLARES'];

$nuevo_numero_ejemplares = $numero_ejemplares +1;


//  Actualizamos la tabla para agregarle el libro que se habia eliminado 
$query3 = "UPDATE libro  SET NUMERO_EJEMPLARES = '?' WHERE TITULO = '?'";
$stmt3 = $conexion->prepare($query3);
$stmt3-> bind_param("is", $nuevo_numero_ejemplares,$libros);
$stmt3-> execute();


$stmt.close();
$stmt1.close();
$stmt3.close();





  $registro_seleccion = mysql_query ("Select nombre_libro   From libros_venta ") or die ("error de proceso".mysql_error());

while ($registrolibro = mysql_fetch_array($registro_seleccion)){
    

    
 $libros = $registrolibro['nombre_libro'];
    
    
   echo $libros;  
    
    
    
    $registro = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE TITULO = '$libros'") or die ("error de proceso".mysql_error());


while ($reg = mysql_fetch_array($registro)){
    
    echo $reg['NUMERO_EJEMPLARES'];
    
    $nuevo_numero = $reg['NUMERO_EJEMPLARES'] + 1;
    
    echo $nuevo_numero;


    $actualizacion = mysql_query("UPDATE libro  SET NUMERO_EJEMPLARES = '$nuevo_numero' WHERE TITULO = '$libros'") or die ("error de proceso". mysql_error());
    
    
} 
}







$sql= "Truncate table libros_venta";

$ejecutar = mysql_query($sql);
if(!$ejecutar){
    echo"Error de proceso";
    mysql_error();
}
else {
    echo "Cancelado";
?> <script> window.location.href='caja.php';</script>    
<?php
}
?>

*/
    
?>