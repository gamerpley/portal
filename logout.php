<?php
// Configuración de seguridad para evitar caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Iniciar la sesión (si no está iniciada)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las variables de sesión
$_SESSION = array();

// Borrar la cookie de sesión (recomendado para seguridad)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Redirigir al login con mensaje de éxito
// Usamos ruta absoluta para evitar problemas
$redirect_url = '/portal/index.php?logout=1'; // Ajusta esta ruta según tu estructura
header("Location: " . $redirect_url);
exit();
?>