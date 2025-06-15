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

// Sanitización de datos
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
$materia = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_STRING);
$experiencia = filter_input(INPUT_POST, 'experiencia', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 50]
]);

if (!$nombre || !$apellido || !$materia || !$experiencia) {
    header("Location: ajustes_profesor.php?error=modificacion");
    exit();
}

try {
    // Preparar consulta de actualización
    $sql = "UPDATE usuarios SET 
            nombre = :nombre,
            apellido = :apellido,
            mencion = :materia,
            anio = :experiencia";
    
    // Agregar contraseña solo si se proporcionó
    if (!empty($_POST['contrasena'])) {
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        $sql .= ", contrasena = :contrasena";
    }
    
    $sql .= " WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $params = [
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':materia' => $materia,
        ':experiencia' => $experiencia,
        ':id' => $_SESSION['id']
    ];
    
    if (!empty($contrasena)) {
        $params[':contrasena'] = $contrasena;
    }
    
    if ($stmt->execute($params)) {
        header("Location: ajustes_profesor.php?exito=1");
    } else {
        header("Location: ajustes_profesor.php?error=modificacion");
    }
} catch (PDOException $e) {
    error_log("Error al actualizar profesor: " . $e->getMessage());
    header("Location: ajustes_profesor.php?error=bd");
}
?>