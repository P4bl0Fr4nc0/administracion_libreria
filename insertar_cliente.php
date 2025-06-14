<?php

include  'conexion.php';

$nombre_cliente=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

// Codificacion de campos a UTF8mb4 para evitar error de inserccion con caracteres especiales
$campos = array ('nombre', 'direccion');
foreach($campos as $campo){
    if (isset($_POST[$campo])){
        $datos = $_POST[$campo];
        $codificacion = mb_detect_encoding($datos, 'UTF8', true);
        if($codificacion !=='UTF-8'){
        $POST[$campo] = utf8_encode($campo);
        }

    }
}

 
/* Ejemplo codificacion un solo campo 

$codificacion = mb_detect_encoding($nombre_cliente, 'UTF8', true);
if($codificacion !=='UTF-8'){
   $nombre_cliente = utf8mb4_encode($nombre_cliente);
}
   */


// Query para insertar datos

$query = "INSERT INTO clientes (NOMBRE_CLIENTE,EMAIL,TELEFONO, DIRECCION) VALUES(
    ?,
    ?,
    ?,
    ?)";
    

// Se  prepara, se pasan los parametros  y ejecuta la sentencia 
$stmt = $conexion->prepare($query);
$stmt->bind_param("ssss",$nombre_cliente,$email,$telefono,$direccion);
$stmt->execute();


// en caso de que se agreguen los datos correctamente a la tabla
if($stmt->affected_rows > 0){
 ?> <script> alert("Cliente agregado");
 window.close(); </script>
 <script> window.location.href='clientes.php';</script>  <?php    

}

// en caso que no se agreguen correctamente los datos
else { ?> <div id = "error"><a> Error al guardar: verificar datos</a></div> 
<?php
}

// se sierra la sentencia 
$stmt->close();
?>

<?php
/*Codigo obsoleto guardado como referencia
$nombre_cliente=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];



$sql="INSERT INTO clientes (NOMBRE_CLIENTE,EMAIL,TELEFONO, DIRECCION) VALUES(
       '$nombre_cliente',
       '$email',
       '$telefono',
       '$direccion')";




//EJECUTAMOS SENTENCIA

$ejecutar=mysql_query($sql);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar: verificar datos</a></div> <?php 
    mysql_error();
}
else {
    
?> <script> window.location.href='clientes.php';</script>    
<?php
}

*/


?>