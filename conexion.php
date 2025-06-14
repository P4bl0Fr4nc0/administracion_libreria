      <?php
      
/* Codigo antiguo y obsoleto utilizado como referencia

$conexion = mysql_connect ('localhost', 'root', '', 'libreria')
    
    or die('ERROR CONEXION'. mysql_error());
echo '';
mysql_select_db('libreria') or die ('No se encuentra basename'.mysql_error());
    
    */


    /*
$conexion = mysql_connect("localhost", "root", "", "libreria");
If 
(! $conexion) { 
echo 'Error al conectar a la base de datos'; 
} Else 
{ 
echo ''; 

mysql_select_db('libreria') or die ('No se encuentra basename'.mysql_error()); 

}
*/

$server = "localhost";
$user ="root";
$password ="trancemusik";
$db="libreria";

$conexion = new mysqli($server,$user,$password,$db);
$conexion->set_charset("utf8mb4");


if($conexion->connect_errno){
    die("Error: No se pudo conectar a la base de datos". $conexion->connect_errno );
}
else {
echo "";


} 


 


?>