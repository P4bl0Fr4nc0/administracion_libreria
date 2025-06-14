<?php
$clave = "tu_clave";
$hash = password_hash($clave, PASSWORD_DEFAULT);

echo "Contraseña original: $clave <br>";
echo "Hash generado: $hash";
?>
