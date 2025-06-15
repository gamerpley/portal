<?php
// Inicia o reanuda la sesión existente
session_start();

// Verifica si la solicitud es de tipo POST (envío de formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica si el campo 'nuevo_nombre' no está vacío
    if (!empty($_POST['nuevo_nombre'])) {
        // Actualiza la variable de sesión 'nombre' con el nuevo valor
        // htmlspecialchars() previene ataques XSS (Cross-Site Scripting)
        $_SESSION['nombre'] = htmlspecialchars($_POST['nuevo_nombre']);
    }
    
    // Redirige de vuelta a la página de ajustes con parámetro success=1
    // para mostrar un mensaje de éxito
    header("Location: ajustes.php?success=1");
    
    // Termina la ejecución del script
    exit();
}
?>