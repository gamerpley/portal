<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id']) || $_SESSION['rol'] != 2) {
    header("Location: ../index.php");
    exit();
}

// Validación CSRF
if (!isset($_GET['csrf']) || $_GET['csrf'] !== hash('sha256', session_id())) {
    header("Location: ajustes_profesor.php?error=bd");
    exit();
}

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['id']]);
    
    if ($stmt->rowCount() > 0) {
        session_unset();
        session_destroy();
        header("Location: ../index.php?eliminacion=exito");
    } else {
        header("Location: ajustes_profesor.php?error=no_encontrado");
    }
} catch (PDOException $e) {
    error_log("Error al eliminar profesor: " . $e->getMessage());
    header("Location: ajustes_profesor.php?error=bd");
}
?>