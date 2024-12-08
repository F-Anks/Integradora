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
            <h1 class="title">Acceder</h1>
            <p class="subtitle">Ir a Google Drive</p>
        </div>
        <div class="section-2">
            <form id="login-form" action="php/login_user.php" method="POST"> <!-- Ruta corregida -->
                <div class="input-container">
                    <input type="email" id="email" name="email" class="input-field" required>
                    <label for="email" class="input-label">Correo electrónico</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" class="input-field" required>
                    <label for="password" class="input-label">Contraseña</label>
                </div>
                <a href="#" class="link">¿Olvidaste el correo electrónico?</a>
                <p class="info">
                    ¿Esta no es tu computadora? Usa el modo de invitado para navegar de forma privada.
                    <a href="#" class="link">Más información para usar el modo de invitado</a>
                </p>
                <div class="buttons">
                    <a href="php/createAccount.php" class="create-account">Crear cuenta</a> <!-- Ruta corregida -->
                    <button type="submit" class="submit-button">Siguiente</button>
                </div>
            </form>
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
    <script src="../js/Scripts.js"></script>
    </body>
</html>
