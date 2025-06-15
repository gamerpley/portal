<?php
// Inicia o reanuda la sesión existente
session_start();

// Verifica si el usuario no está logueado (no existe id en sesión)
// o si no tiene rol 2 (profesor)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 2) {
    // Redirige a la página principal si no cumple los requisitos
    header("Location: ../index.php");
    // Termina la ejecución del script
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante - IFaz</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ifaz.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<!-- Incluye el header para estudiantes -->
<?php include 'includes/header_estudiantes.php'; ?>

<body>
    <!-- Contenido principal de la página -->
    <main class="main-content">
        <!-- Sección de contenido textual -->
        <div class="contenido-texto">
            <!-- Título de bienvenida -->
            <div class="titulo-bienvenida">
                <h1>Bienvenido a la E.T. Profesor "José Ricardo Guillén"</h1>
                <p class="subtitulo">Formando profesionales para el futuro</p>
            </div>
            
            <!-- Descripción de las menciones disponibles -->
            <div class="descripcion-menciones">
                <!-- Tarjeta de Telemática -->
                <div class="mencion-card">
                    <h3><i class="fas fa-network-wired"></i> Telemática</h3>
                    <p>Formación en redes, programación y sistemas informáticos para la era digital.</p>
                </div>
                
                <!-- Tarjeta de Administración -->
                <div class="mencion-card">
                    <h3><i class="fas fa-briefcase"></i> Administración</h3>
                    <p>Desarrollo de habilidades gerenciales y procesos administrativos empresariales.</p>
                </div>
                
                <!-- Tarjeta de Contabilidad -->
                <div class="mencion-card">
                    <h3><i class="fas fa-calculator"></i> Contabilidad</h3>
                    <p>Formación en gestión financiera, costos y procesos contables.</p>
                </div>
                
                <!-- Tarjeta de Turismo -->
                <div class="mencion-card">
                    <h3><i class="fas fa-umbrella-beach"></i> Turismo</h3>
                    <p>Preparación en gestión hotelera, guiatura y planificación turística.</p>
                </div>
            </div>
        </div>
        
        <!-- Contenedor para la imagen del banner -->
        <div class="contenedor-banner">
            <!-- Imagen del banner con texto alternativo -->
            <img src="includes/banner.jpg" alt="Banner E.T. José Ricardo Guillén" class="banner-estudiante">
        </div>
    </main>
</body>
</html>