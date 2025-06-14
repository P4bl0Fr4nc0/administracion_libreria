  <link rel="stylesheet" href="style/error_insertar.css"/>    
      <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>


<?php

include  'conexion.php';

$codigo_categoria=$_POST['codigo_categoria'];
$nombre_categoria=$_POST['nombre_categoria'];


/* codigo obleto guardado como referencia
$sql="INSERT INTO tema (CODIGO_TEMA,NOMBRE_TEMA) VALUES('$codigo_categoria',
       '$nombre_categoria')";



$ejecutar=mysql_query($sql);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar: verificar datos</a></div> <?php 
    mysql_error();
}
else {
    echo "Datos Guardados";
?> <script> window.location.href='categorias.php';</script>    
<?php
}

*/

// query para insertar datos a la tabla 
$query = "INSERT INTO tema (CODIGO_TEMA,NOMBRE_TEMA) VALUES(?,
?)";

// Se  prepara, se pasan los parametros  y ejecuta la sentencia 
$stmt = $conexion->prepare($query);
$stmt->bind_param("ss",$codigo_categoria,$nombre_categoria);
$stmt->execute();

// Si se inserto correctamente la categoria
if($stmt->affected_rows > 0){
 ?> <script> alert("Categoria agregada correctamente");
 window.close(); </script>
 <script> window.location.href='categorias.php';</script>  <?php    

}
// en caso que no se agreguen correctamente los datos
else { 
    ?> <div id = "error"><a> Error al guardar: verificar datos o que la clave no se encuentre duplicada</a></div> 
<?php
}
// se sierra la sentencia 
$stmt->close();


?>