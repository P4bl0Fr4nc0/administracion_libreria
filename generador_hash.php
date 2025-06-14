<?php
$clave = "pafr";
$hash = password_hash($clave, PASSWORD_DEFAULT);

echo "Contraseña original: $clave <br>";
echo "Hash generado: $hash";
?>