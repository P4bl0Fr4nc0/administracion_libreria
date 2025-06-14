<?php

include 'conexion.php';
$eliminar=$_POST['eliminar'];
/*


$sql ="DELETE FROM autor WHERE CODIGO_AUTOR = '$eliminar'";


$ejecutar=mysql_query($sql);
if(!$ejecutar){
    echo"Error el codigo de autor no existe";
    mysql_error();
}
else {
    echo "Dato Eliminado";
?> <script> window.location.href='autores.php';</script>    
<?php
}
?>
*/

$stmt = $conexion->prepare("DELETE FROM autor WHERE CODIGO_AUTOR = ?");
$stmt->bind_param("s", $eliminar );

$stmt->execute();

if($stmt->affected_rows > 0){
    ?> <script> alert("Autor eleminado");
    window.close(); </script>
    <script> window.location.href='autores.php';</script>  <?php    
   
   }
   else { ?> 
   <script> alert("Error: verifica que el código del autor que deseas eliminar exista");
    window.close(); </script>
    <script> window.location.href='autores.php';</script> 
   <?php
   }
   $stmt->close();

?>