<?php
// Inicia o reanuda la sesión
session_start();

// Verifica si el usuario está logueado y tiene rol 1 (estudiante)
if (!isset($_SESSION['id']) || $_SESSION['rol'] != 1) {
    // Redirige al index si no cumple los requisitos
    header("Location: ../index.php");
    exit(); // Termina la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante - IFaz</title>
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilo-ifaz.css"> <!-- Estilos principales -->
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<!-- Incluye el header para estudiantes -->
<?php include 'includes/header_estudiantes.php'; ?>

<body>
    <!-- Contenido principal -->
    <main class="main-content">
        <!-- Sección de texto -->
        <div class="contenido-texto">
            <!-- Mensaje de bienvenida -->
            <div class="titulo-bienvenida">
                <h1>Bienvenido a la E.T. Profesor "José Ricardo Guillén"</h1>
                <p class="subtitulo">Formando profesionales para el futuro</p>
            </div>
            
            <!-- Descripción de menciones disponibles -->
            <div class="descripcion-menciones">
                <!-- Tarjeta para Telemática -->
                <div class="mencion-card">
                    <h3><i class="fas fa-network-wired"></i> Telemática</h3>
                    <p>Formación en redes, programación y sistemas informáticos para la era digital.</p>
                </div>
                
                <!-- Tarjeta para Administración -->
                <div class="mencion-card">
                    <h3><i class="fas fa-briefcase"></i> Administración</h3>
                    <p>Desarrollo de habilidades gerenciales y procesos administrativos empresariales.</p>
                </div>
                
                <!-- Tarjeta para Contabilidad -->
                <div class="mencion-card">
                    <h3><i class="fas fa-calculator"></i> Contabilidad</h3>
                    <p>Formación en gestión financiera, costos y procesos contables.</p>
                </div>
                
                <!-- Tarjeta para Turismo -->
                <div class="mencion-card">
                    <h3><i class="fas fa-umbrella-beach"></i> Turismo</h3>
                    <p>Preparación en gestión hotelera, guiatura y planificación turística.</p>
                </div>
            </div>
        </div>

        <!-- Contenedor del banner -->
        <div class="contenedor-banner">
            <!-- Imagen del banner -->
            <img src="includes/banner.jpg" alt="Banner E.T. José Ricardo Guillén" class="banner-estudiante">
        </div>
    </main>
</body>
</html>