<?php
// Inicia o reanuda la sesión
session_start();

// Verifica si el usuario está logueado y tiene rol 1 (estudiante)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 1) {
    // Redirige al index si no cumple los requisitos
    header("Location: ../index.php");
    exit();
}

// Incluye el archivo de configuración de la base de datos
require_once '../config/db.php';

try {
    // Prepara la consulta para eliminar al usuario
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['id']]);
    
    // Verifica si se eliminó correctamente
    if ($stmt->rowCount() > 0) {
        // Destruye la sesión
        session_unset();
        session_destroy();
        
        // Redirige con mensaje de éxito
        header("Location: ../index.php?eliminacion=exito");
        exit();
    } else {
        // Si no se eliminó (usuario no encontrado)
        header("Location: ajustes.php?error=no_encontrado");
        exit();
    }
} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    error_log("Error al eliminar cuenta: " . $e->getMessage());
    header("Location: ajustes.php?error=bd");
    exit();
}
?>