<?php

include 'conexion.php';

$eliminar=$_POST['eliminar'];


$stmt = $conexion->prepare("DELETE FROM tema WHERE CODIGO_TEMA = ?");
$stmt->bind_param("s", $eliminar );
$stmt->execute();

if($stmt->affected_rows > 0){
    ?> <script> alert("Categoria eliminada");
    window.close(); </script>
    <script> window.location.href='categorias.php';</script>  <?php    
   
   }
   else { ?> 
   <script> alert("Error: verifica que el id de la categoria que deseas eliminar exista o no se encuentre referenciada a un libro");
    window.close(); </script>
    <script> window.location.href='clientes.php';</script> 
   <?php
   }
   $stmt->close();





/* Código Obsoleto guardado como referencia


$sql ="DELETE FROM tema WHERE CODIGO_TEMA = '$eliminar'";


$ejecutar=mysql_query($sql);
if(!$ejecutar){
    echo"Error el Codigo  no existe";
    mysql_error();
}
else {
    echo "Dato Eliminado";
?> <script> window.location.href='categorias.php';</script>    
<?php
}
*/
?>

