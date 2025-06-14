  <link rel="stylesheet" href="style/error_insertar.css"/>    
      <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>

<?php
include  'conexion.php';

$codigo_editorial=$_POST['codigo_editorial'];
$nombre_editorial=$_POST['nombre_editorial'];
$telefono=$_POST['telefono'];
$contacto=$_POST['contacto'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$pais=$_POST['pais'];

// Codificacion de campos a UTF8mb4 para evitar error de inserccion con caracteres especiales
$campos = array ('nombre_editorial', 'contacto','direccion','ciudad','pais');
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
$query = "INSERT INTO editorial (CODIGO_EDITORIAL,NOMBRE,TELEFONO, CONTACTO, DIRECCION, CIUDAD, PAIS) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?)";

// Se  prepara, se pasan los parametros  y ejecuta la sentencia 
$stmt = $conexion->prepare($query);
$stmt->bind_param("sssssss",$codigo_editorial,$nombre_editorial,$telefono,$contacto,$direccion,$ciudad,$pais);
$stmt->execute();

// en caso de que se agreguen los datos correctamente a la tabla
if($stmt->affected_rows > 0){
 ?> <script> alert("Editorial agregada");
 window.close(); </script>
 <script> window.location.href='editoriales.php';</script>  <?php    

}
// en caso que no se agreguen correctamente los datos
else { ?> <div id = "error"><a> Error al guardar: verificar que la clave no se encuentre duplicada</a></div> 
<?php
}

// se cierra la sentencia
$stmt->close();

/* Codigo obsoleto, guardado como referencia
$sql="INSERT INTO editorial (CODIGO_EDITORIAL,NOMBRE,TELEFONO, CONTACTO, DIRECCION, CIUDAD, PAIS) VALUES('$codigo_editorial',
       '$nombre_editorial',
       '$telefono',
       '$contacto',
       '$direccion',
       '$ciudad',
        '$pais')";


//EJECUTAMOS SENTENCIA

$ejecutar=mysql_query($sql);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar: verificar datos</a></div> <?php 
    mysql_error();
}
else {
    echo "Datos Guardados";
?> <script> window.location.href='editoriales.php';</script>    
<?php
}
*/
?>