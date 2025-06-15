<?php
// --- CONFIGURACIÓN DE LA BASE DE DATOS ---
$host = "localhost";
$user = "root";
$password = "";
$database = "portal";

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die("<script>
            alert('Error al conectar con la base de datos. Por favor, inténtelo más tarde.');
            window.location.href = 'registro_profesor.php';
        </script>");
}

// --- VALIDACIÓN DE CAMPOS OBLIGATORIOS ---
$campos_requeridos = ['nombre', 'apellido', 'ci', 'contrasena', 'anio', 'mencion'];
$campos_vacios = [];

foreach ($campos_requeridos as $campo) {
    if (empty($_POST[$campo])) {
        $campos_vacios[] = $campo;
    }
}

if (!empty($campos_vacios)) {
    $mensaje_error = "Los siguientes campos son obligatorios: " . implode(", ", $campos_vacios);
    echo "<script>
            alert('$mensaje_error');
            window.history.back();
        </script>";
    exit();
}

// --- VALIDACIÓN DE CÉDULA (CI) REPETIDA ANTES DE INSERTAR ---
$ci = $conexion->real_escape_string($_POST['ci']);
$consulta_ci = "SELECT ci FROM usuarios WHERE ci = '$ci'";
$resultado_ci = $conexion->query($consulta_ci);

if ($resultado_ci->num_rows > 0) {
    echo "<script>
            alert('Error: La cédula ingresada ya está registrada. Por favor, use otra.');
            window.history.back();
        </script>";
    exit();
}

// --- SANITIZACIÓN DE DATOS ---
$nombre = $conexion->real_escape_string($_POST['nombre']);
$apellido = $conexion->real_escape_string($_POST['apellido']);
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$anio = intval($_POST['anio']); // Asegura que sea un número entero
$mencion = $conexion->real_escape_string($_POST['mencion']);
$rol = intval($_POST['rol']); // Asegura que sea 2 (profesor)

// --- INSERCIÓN EN LA BASE DE DATOS ---
$sql = "INSERT INTO usuarios (nombre, apellido, ci, contrasena, rol, anio, mencion) 
        VALUES ('$nombre', '$apellido', '$ci', '$contrasena', $rol, $anio, '$mencion')";

if ($conexion->query($sql)) {
    echo "<script>
            alert('¡Registro exitoso! Ahora puede iniciar sesión.');
            window.location.href = 'index.php';
        </script>";
} else {
    // Manejo de otros errores SQL (ej: campos inválidos)
    $mensaje_error = str_replace("'", "\\'", $conexion->error); // Escapa comillas simples
    echo "<script>
            alert('Error inesperado: $mensaje_error. Por favor, revise los datos e intente nuevamente.');
            window.history.back();
        </script>";
}

$conexion->close();
?>