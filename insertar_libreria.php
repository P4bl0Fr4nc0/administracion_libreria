<html lang="es">
<link rel="stylesheet" href="style/error_insertar.css"/>    
      <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>


<?php

include  'conexion.php';


$isbn=$_POST['isbn'];
$titulo=$_POST['titulo'];
$codigo_autor=$_POST['codigo_autor'];
$codigo_editorial=$_POST['codigo_editorial'];
$edicion=$_POST['edicion'];
$lugar_edicion=$_POST['lugar_edicion'];
$numero_edicion=$_POST['numero_edicion'];
$precio_venta=$_POST['precio'];
$tipo_cubierta=$_POST['cubierta'];
$paginas=$_POST['paginas'];
$estanteria=$_POST['estanteria'];
$numero_ejemplares=$_POST['ejemplares'];
$barras=$_POST['barras'];


// Codificacion de campos a UTF8mb4 para evitar error de inserccion con caracteres especiales
$campos = array ('titulo', 'lugar_edicion');
foreach($campos as $campo){
    if (isset($_POST[$campo])){
        $datos = $_POST[$campo];
        $codificacion = mb_detect_encoding($datos, 'UTF8', true);
        if($codificacion !=='UTF-8'){
        $POST[$campo] = utf8_encode($campo);
        }

    }
}


// Query para insertar datos
$query = "INSERT INTO libro (ISBN,TITULO,CODIGO_AUTOR, CODIGO_EDITORIAL, EDICION, LUGAR_EDICION, NUMERO_EDICION, PRECIO_VENTA, TIPO_CUBIERTA,
 PAGINAS, ESTANTERIA, NUMERO_EJEMPLARES,CODIGO_BARRAS) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
    )";
// Se  prepara, se pasan los parametros  y ejecuta la sentencia 
$stmt = $conexion->prepare($query);
$stmt->bind_param("sssssssdsssis",$isbn,$titulo,$codigo_autor,$codigo_editorial,$edicion,$lugar_edicion,$numero_edicion,$precio_venta,$tipo_cubierta,
$paginas,$estanteria,$numero_ejemplares,$barras);
$stmt->execute();

// en caso de que se agreguen los datos correctamente a la tabla
if($stmt->affected_rows > 0){
    ?> <script> alert("Libro agregado");
    window.close(); </script>
    <script> window.location.href='libros.php';</script>  <?php  

 // en caso que no se agreguen correctamente los datos  
   }
   else { ?> <div id = "error"><a> Error al guardar: verificar datos o que la clave no se encuentre duplicada</a></div> 
   <?php
   }

   // se cierra la sentencia
   $stmt->close();
   
/* codigo obsoloeto guardado como referencia
$sql="INSERT INTO libro (ISBN,TITULO,CODIGO_AUTOR, CODIGO_EDITORIAL, EDICION, LUGAR_EDICION, NUMERO_EDICION, PRECIO_VENTA, TIPO_CUBIERTA, PAGINAS, ESTANTERIA, NUMERO_EJEMPLARES) VALUES('$isbn',
       '$titulo',
       '$codigo_autor',
       '$codigo_editorial',
       '$edicion',
       '$lugar_edicion',
        '$numero_edicion',
        '$precio_venta',
        '$tipo_cubierta',
        '$paginas',
        '$estanteria',
        '$numero_ejemplares')";




//EJECUTAMOS SENTENCIA

$ejecutar=mysql_query($sql);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar: verificar datos</a></div> <?php 
    mysql_error();
}
else {
    echo "Datos Guardados";
?> <script> window.location.href='libros.php';</script>    
<?php
}

*/

?>