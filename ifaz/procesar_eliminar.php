<?php
// Inicia o reanuda la sesión existente
session_start();

// Aquí iría la lógica para eliminar la cuenta de la base de datos
// Ejemplo básico:

// Destruye todos los datos asociados con la sesión actual
session_destroy();

// Redirecciona al usuario a la página principal con un parámetro en la URL
// que indica que la cuenta fue eliminada (account_deleted=1)
header("Location: ../index.php?account_deleted=1");

// Termina inmediatamente la ejecución del script
exit();
?>