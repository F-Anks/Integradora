<?php
// Incluir la conexión
require_once 'conection.php'; // Ruta correcta

// Habilitar la visualización de errores para depuración
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar datos del formulario
    $nombreUsuario = $_POST['nombre_usuario'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($nombreUsuario && $email && $password) {
        // Hashear la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta
        $query = "INSERT INTO users (nombre_usuario, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("sss", $nombreUsuario, $email, $hashedPassword);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Usuario registrado exitosamente.";
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.icons8.com/?size=100&id=ya4CrqO7PgnY&format=png&color=000000">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/Integradora/css/Styles-login.css">
    <title>Google Drive</title>
</head>
<body>
    <div class="login-container">
        <div class="section-1">
            <div class="logo">
                <img src="https://img.icons8.com/?size=100&id=V5cGWnc9R4xj&format=png&color=000000" alt="google" width="48px" height="48px">
            </div>
            <h1 class="title">Registrarse</h1>
            <p class="subtitle">Unirse a Google Drive</p>
        </div>
        <div class="section-2">
            <form id="create-account-form" action="../php/createAccount.php" method="POST" style="margin-top: -55px;"> <!-- Asegúrate de que la ruta de acción sea correcta -->
                <div class="input-container">
                    <label for="nombre_usuario">Nombre de Usuario:</label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" class="input-field" required>
                </div>

                <div class="input-container">
                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" class="input-field" required>
                </div>

                <div class="input-container">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="input-field" required>
                </div>

                <div class="registrar">
                    <button type="submit" class="submit-button">Registrar</button>
                </div>
            </form>

            <div class="buttons">
                <a href="http://localhost/Integradora/index.php" class="create-account">¿Ya tienes cuenta? Iniciar sesión</a>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-links">
            <span>Español (Latinoamérica)</span>
            <a href="#" class="footer-link">Ayuda</a>
            <a href="#" class="footer-link">Privacidad</a>
            <a href="#" class="footer-link">Condiciones</a>
        </div>
    </footer>
    <script src="../js/scripts.js"></script> <!-- Corregí la ruta del JS -->
</body>
</html>
