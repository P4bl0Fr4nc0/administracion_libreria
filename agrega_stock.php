<?php  

include  'conexion.php';

$numero_libros=$_POST['numero'];


$ISBN=$_POST['agregar'];



 
   // $registro = mysql_query ("Select NUMERO_EJEMPLARES From libro WHERE ISBN= '$ISBN'") or die ("error de proceso".mysql_error());

  /*
   $query ="Select NUMERO_EJEMPLARES From libro WHERE ISBN= ?";
   $ISBN=$_POST['agregar'];
   $stmt = mysqli_prepare($conexion, $query);
   mysqli_stmt_bind_param($stmt, "s", $ISBN);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_bind_result($stmt,$valor_actual);
   mysqli_stmt_fetch($stmt)
*/


$query ="UPDATE libro  SET NUMERO_EJEMPLARES = NUMERO_EJEMPLARES + ? WHERE ISBN= ? " ;
$stmt = mysqli_prepare($conexion, $query);
$stmt->bind_param("is",$numero_libros,$ISBN);
$stmt->execute();



if($stmt->affected_rows > 0){
  ?> <script> alert("Numero de stock actualizado");
  window.close(); </script>
  <script> window.location.href='libros.php';</script>  <?php    
 
 }
 else { ?>  
 <?php
 }
 $stmt->close();



/*
while ($reg = mysql_fetch_array($registro)){
    
   
    $nuevo_numero = $reg['NUMERO_EJEMPLARES'] + $numero_libros;    



    $actualizacion = mysql_query("UPDATE libro  SET NUMERO_EJEMPLARES = '$nuevo_numero' WHERE ISBN = '$libro'") or die ("error de proceso". mysql_error());
    
}
    

  ?> <script> window.location.href='libros.php';</script>    
<?php

*/

?>







