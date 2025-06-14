<?php

require 'conexion.php';


// Se eliminan los datos de la tabla temporal credito porque la tarjeta fue recchazada

          $query="TRUNCATE TABLE temporal_credito";
           $stmt = $conexion->prepare($query);
             $stmt ->execute();


             if (!$stmt->execute()){
                ?><div id = "error"><a> Ocurrio un error iniesperado </a></div> <?php 
               


             }
             else {
                ?>


     <script >


      // se envia un mensaje al usuario para que intente con otra forma de pago
         alert("Intenta con otra forma de pago");
 window.location.href='caja.php';

</script>  <?php
                

             }
         
             //$sql2="TRUNCATE TABLE temporal_credito";
         /* Codigo obsoleto guardado como referencia
         $ejecutar=mysql_query($sql2);
if(!$ejecutar){
    ?><div id = "error"><a> Error al guardar</a></div> <?php 
    mysql_error();
}
else { 
}
*/

// se cierra la senctencia
$stmt->close();
?>

