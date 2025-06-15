<?php
// --- CONFIGURACIÓN DE LA BASE DE DATOS ---
$host = "localhost"; // Servidor donde está alojada la base de datos
$user = "root"; // Usuario de MySQL (debería cambiarse en entorno de producción)
$password = ""; // Contraseña de MySQL (debería cambiarse en entorno de producción)
$database = "portal"; // Nombre de la base de datos a utilizar

// Establece la conexión con la base de datos usando MySQLi (enfoque orientado a objetos)
$conexion = new mysqli($host, $user, $password, $database);

// Verifica si hubo un error en la conexión
if ($conexion->connect_error) {
    // Detiene la ejecución y muestra el error de conexión
    die("Error de conexión: " . $conexion->connect_error);
}

// --- VALIDACIÓN DE CAMPOS OBLIGATORIOS ---
// Lista de campos que deben estar presentes en el formulario
$campos_requeridos = ['nombre', 'apellido', 'ci', 'contrasena', 'anio', 'mencion'];

// Recorre cada campo requerido para verificar que no esté vacío
foreach ($campos_requeridos as $campo) {
    if (empty($_POST[$campo])) {
        // Si algún campo requerido está vacío, detiene la ejecución y muestra un error
        die("Error: El campo '$campo' es obligatorio.");
    }
}

// --- SANITIZACIÓN Y PREPARACIÓN DE DATOS ---
// Limpia y escapa los valores para prevenir inyecciones SQL
$nombre = $conexion->real_escape_string($_POST['nombre']); // Nombre del usuario
$apellido = $conexion->real_escape_string($_POST['apellido']); // Apellido del usuario
$ci = $conexion->real_escape_string($_POST['ci']); // Cédula de identidad
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encripta la contraseña
$anio = $conexion->real_escape_string($_POST['anio']); // Año académico
$mencion = $conexion->real_escape_string($_POST['mencion']); // Mención o especialidad
$rol = 1; // Asigna el rol 1 (Estudiante) por defecto

// --- INSERCIÓN EN LA BASE DE DATOS ---
// Prepara la consulta SQL para insertar un nuevo usuario
$sql = "INSERT INTO usuarios (nombre, apellido, ci, contrasena, rol, anio, mencion) 
        VALUES ('$nombre', '$apellido', '$ci', '$contrasena', $rol, '$anio', '$mencion')";

// Ejecuta la consulta y verifica si fue exitosa
if ($conexion->query($sql)) {
    // Muestra alerta de éxito y redirige al login
    echo "<script>
            alert('¡Registro exitoso!');
            window.location.href = 'index.php';
          </script>";
} else {
    // Muestra alerta con el error y permite volver atrás para corregir
    echo "<script>
            alert('Error: " . addslashes($conexion->error) . "');
            window.history.back();
          </script>";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>