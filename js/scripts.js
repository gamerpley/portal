// Función para mostrar/ocultar la contraseña
function togglePassword() {
    // Obtener el campo de contraseña y el ícono
    const passwordInput = document.getElementById('contrasena');
    const icon = document.querySelector('.toggle-password');
    
    // Cambiar el tipo de input entre 'password' y 'text'
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Mostrar texto plano
        icon.classList.replace('fa-eye', 'fa-eye-slash'); // Cambiar ícono a "ojo tachado"
    } else {
        passwordInput.type = 'password'; // Ocultar contraseña
        icon.classList.replace('fa-eye-slash', 'fa-eye'); // Cambiar ícono a "ojo abierto"
    }
}

// Validación del formulario al enviar
document.getElementById('loginForm').addEventListener('submit', function(e) {
    let isValid = true; // Bandera para validación general
    
    // Obtener elementos del DOM
    const nombre = document.getElementById('nombre');
    const contrasena = document.getElementById('contrasena');
    const rol = document.getElementById('rol');
    const nameError = document.getElementById('name-error');
    const passError = document.getElementById('pass-error');

    /* ===== VALIDACIÓN DE NOMBRE ===== */
    if (nombre.value.trim().length < 4) {
        // Mostrar error si el nombre tiene menos de 4 caracteres
        nameError.textContent = 'El nombre debe tener al menos 4 caracteres';
        nombre.style.borderColor = 'var(--error)'; // Borde rojo
        isValid = false;
    } else {
        // Limpiar errores si es válido
        nameError.textContent = '';
        nombre.style.borderColor = ''; // Restaurar borde normal
    }

    /* ===== VALIDACIÓN DE CONTRASEÑA ===== */
    if (contrasena.value.length < 6) {
        // Mostrar error si la contraseña es muy corta
        passError.textContent = 'La contraseña debe tener al menos 6 caracteres';
        contrasena.style.borderColor = 'var(--error)'; // Borde rojo
        isValid = false;
    } else {
        // Limpiar errores si es válida
        passError.textContent = '';
        contrasena.style.borderColor = ''; // Restaurar borde normal
    }

    /* ===== VALIDACIÓN DE ROL ===== */
    if (rol.value === "") {
        // Mostrar error si no se seleccionó un rol
        rol.style.borderColor = 'var(--error)'; // Borde rojo
        isValid = false;
    } else {
        rol.style.borderColor = ''; // Restaurar borde normal
    }

    /* ===== RESULTADO FINAL DE VALIDACIÓN ===== */
    if (!isValid) {
        e.preventDefault(); // Prevenir envío del formulario si hay errores
    }
});