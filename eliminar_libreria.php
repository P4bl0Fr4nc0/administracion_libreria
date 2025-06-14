<?php

include 'conexion.php';

$eliminar=$_POST['eliminar'];


/*
$sql ="DELETE FROM libro WHERE ISBN = '$eliminar'";


$ejecutar=mysql_query($sql);
if(!$ejecutar){
    echo"Error el ISBN no existe";
    mysql_error();
}
else {
    echo "Dato Eliminado";
?> <script> window.location.href='libros.php';</script>    
<?php
}
?>

*/


$stmt = $conexion->prepare("DELETE FROM libro WHERE ISBN = ?");
$stmt->bind_param("s", $eliminar );

$stmt->execute();

if($stmt->affected_rows > 0){
    ?> <script> alert("Libro eleminado");
    window.close(); </script>
    <script> window.location.href='libros.php';</script>  <?php    
   
   }
   else { ?> 
   <script> alert("Error: verifica que el ISBN que deseas eliminar exista");
    window.close(); </script>
    <script> window.location.href='libros.php';</script> 
   <?php
   }
   $stmt->close();


?>