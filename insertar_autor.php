  <link rel="stylesheet" href="style/error_insertar.css"/>    
      <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500');
</style>


<?php
include  'conexion.php';
$codigo_autor=$_POST['codigo_autor'];
$nombre=$_POST['nombre'];
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$pais=$_POST['pais'];
$ciudad=$_POST['ciudad'];

// Codificacion de campos a UTF8mb4 para evitar error de inserccion con caracteres especiales
$campos = array ('nombre', 'apellido_paterno', 'apellido_materno','pais','ciudad');
foreach($campos as $campo){
    if (isset($_POST[$campo])){
        $datos = $_POST[$campo];
        $codificacion = mb_detect_encoding($datos, 'UTF8', true);
        if($codificacion !=='UTF-8'){
        $POST[$campo] = utf8_encode($campo);
        }

    }
}

$query = "INSERT INTO autor (CODIGO_AUTOR,NOMBRE,APELLIDO_P, APELLIDO_M, FECHA_NACIMIENTO, PAIS, CIUDAD) VALUES(
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
$stmt->bind_param("sssssss",$codigo_autor,$nombre,$apellido_paterno,$apellido_materno,$fecha_nacimiento,$pais,$ciudad);
$stmt->execute();

// en caso de que se agreguen los datos correctamente a la tabla
if($stmt->affected_rows > 0){
 ?> <script> alert("Autor agregado");
 window.close(); </script>
 <script> window.location.href='autores.php';</script>  <?php    

}
// en caso que no se agreguen correctamente los datos
else { 
    ?> <div id = "error"><a> Error al guardar: verificar datos o que la clave no se encuentre duplicada</a></div> 
<?php
}


/*Codigo obsoleto guardado como referencia
$codigo_autor=$_POST['codigo_autor'];
$nombre=$_POST['nombre'];
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$pais=$_POST['pais'];
$ciudad=$_POST['ciudad'];

$sql="INSERT INTO autor (CODIGO_AUTOR,NOMBRE,APELLIDO_P, APELLIDO_, FECHA_NACIMIENTO, PAIS, CIUDAD) VALUES('$codigo_autor',
       '$nombre',
       '$apellido_paterno',
       '$apellido_materno',
       '$fecha_nacimiento',
       '$pais',
        '$ciudad')";

//EJECUTAMOS SENTENCIA


$ejecutar=mysql_query($sql);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar: verificar datos</a></div> <?php 
    mysql_error();
}
else {
    echo "Datos Guardados";
?> <script> window.location.href='autores.php';</script>    
<?php
}

*/

// Query para insertar datos

// se sierra la sentencia 
$stmt->close();
?>




