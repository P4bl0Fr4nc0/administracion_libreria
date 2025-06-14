<?php
include  'conexion.php';



$query ="SELECT SUM(precio) AS total FROM libros_venta";
$stmt = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($stmt);

$total = $fila['total'];

/*
$result = mysql_query("SELECT precio FROM libros_venta 
");

$total= "0";

while ($row = mysql_fetch_object($result)){
    $total = $total + $row->precio;
}

*/
$stmt->close();

?>