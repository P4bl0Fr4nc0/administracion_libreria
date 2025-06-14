<?php

include 'conexion.php';

$eliminar=$_POST['eliminar'];

/*

$sql ="DELETE FROM editorial WHERE CODIGO_EDITORIAL = '$eliminar'";
$ejecutar=mysql_query($sql);
if(!$ejecutar){
    echo"Error el codigo de autor no existe";
    mysql_error();
}
else {
    echo "Dato Eliminado";
?> <script> window.location.href='editoriales.php';</script>    
<?php
}
?>

*/


$stmt = $conexion->prepare("DELETE FROM editorial WHERE CODIGO_EDITORIAL = ?");
$stmt->bind_param("s", $eliminar );

$stmt->execute();

if($stmt->affected_rows > 0){
    ?> <script> alert("Editorial eleminada");
    window.close(); </script>
    <script> window.location.href='editoriales.php';</script>  <?php    
   
   }
   else { ?> 
   <script> alert("Error: verifica que el código del editorial que deseas eliminar exista o no se encuentre utilizando por algun libro");
    window.close(); </script>
    <script> window.location.href='editoriales.php';</script> 
   <?php
   }
   $stmt->close();



?>