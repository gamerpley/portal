<?php
// Inicia o reanuda una sesión PHP para almacenar datos del usuario
session_start();

// --- CONFIGURACIÓN DE LA BASE DE DATOS ---
$host = "localhost"; // Servidor de la base de datos
$user = "root"; // Usuario de MySQL (debes cambiarlo en producción)
$password = ""; // Contraseña de MySQL (debes cambiarlo en producción)
$database = "portal"; // Nombre de la base de datos

// Establece conexión con MySQL usando MySQLi (orientado a objetos)
$conexion = new mysqli($host, $user, $password, $database);

// Verifica si hay errores de conexión
if ($conexion->connect_error) {
    // Mata el script y muestra el error si la conexión falla
    die("Error de conexión: " . $conexion->connect_error);
}

// --- VALIDACIÓN DEL FORMULARIO ---
// Verifica si el método de solicitud es POST (envío desde formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitiza y limpia los datos del formulario
    $ci = $conexion->real_escape_string(trim($_POST['ci'])); // Escapa caracteres especiales y elimina espacios
    $contrasena = $_POST['contrasena']; // No se sanitiza para no alterar el hash de la contraseña

    // Valida que los campos no estén vacíos
    if (empty($ci) || empty($contrasena)) {
        // Muestra alerta en JavaScript y regresa a la página anterior
        echo "<script>
                alert('Todos los campos son obligatorios.');
                window.history.back();
              </script>";
        exit(); // Termina la ejecución del script
    }

    // --- CONSULTA A LA BASE DE DATOS ---
    // Prepara una consulta SQL segura con parámetros para evitar inyecciones
    $sql = "SELECT id, nombre, apellido, contrasena, rol, anio, mencion FROM usuarios WHERE ci = ?";
    $stmt = $conexion->prepare($sql); // Prepara la consulta
    $stmt->bind_param("s", $ci); // Asocia el parámetro (s = string)
    $stmt->execute(); // Ejecuta la consulta
    $resultado = $stmt->get_result(); // Obtiene los resultados

    // Verifica si se encontró exactamente 1 usuario
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc(); // Convierte el resultado en array asociativo
        
        // --- VALIDACIÓN DE CONTRASEÑA ---
        // Compara la contraseña ingresada con el hash almacenado
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Almacena datos del usuario en la sesión PHP
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['rol'] = $usuario['rol']; // 1 = Estudiante, otro valor = Profesor
            $_SESSION['anio'] = $usuario['anio'] ?? null; // Operador null coalescing para evitar errores
            $_SESSION['mencion'] = $usuario['mencion'] ?? null;

            // --- REDIRECCIÓN SEGÚN ROL ---
            // Redirige a la ruta correspondiente dentro de /ifaz
            if ($usuario['rol'] == 1) {
                header("Location: ifaz/estudiante.php"); // Estudiante
            } else {
                header("Location: ifaz/profesor.php"); // Profesor
            }
            exit(); // Termina el script después de redirigir

        } else {
            // Contraseña incorrecta
            echo "<script>
                    alert('Contraseña incorrecta.');
                    window.history.back();
                  </script>";
        }
    } else {
        // Usuario no encontrado en la base de datos
        echo "<script>
                alert('Usuario no registrado.');
                window.history.back();
              </script>";
    }

    $stmt->close(); // Cierra la consulta preparada
} else {
    // Bloquea el acceso directo al script (sin enviar formulario)
    header("Location: index.php"); // Redirige al inicio
    exit();
}

$conexion->close(); // Cierra la conexión a la base de datos
?>