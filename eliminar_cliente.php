<?php

include 'conexion.php';
$eliminar=$_POST['eliminar'];

/* Codigo obsoleto
$eliminar=$_POST['eliminar'];

$sql ="DELETE FROM clientes WHERE ID_CLIENTE = '$eliminar'";


$ejecutar=mysql_query($sql);
if(!$ejecutar){
    echo"Error el Codigo  no existe";
    mysql_error();
}
else {
    echo "Dato Eliminado";
?> <script> window.location.href='clientes.php';</script>    
<?php
}
?>


*/


$stmt = $conexion->prepare("DELETE FROM clientes WHERE ID_CLIENTE = ?");
$stmt->bind_param("i", $eliminar );
$stmt->execute();

if($stmt->affected_rows > 0){
    ?> <script> alert("Cliente eleminado");
    window.close(); </script>
    <script> window.location.href='clientes.php';</script>  <?php    
   
   }
   else { ?> 
   <script> alert("Error: verifica que el id del cliente que deseas eliminar exista");
    window.close(); </script>
    <script> window.location.href='clientes.php';</script> 
   <?php
   }
   $stmt->close();
   ?>



?>