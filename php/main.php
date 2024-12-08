<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: http://localhost/Integradora/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.icons8.com/?size=100&id=ya4CrqO7PgnY&format=png&color=000000">
    <link rel="stylesheet" href="http://localhost/Integradora/css/Styles-main.css">
    <title>Inicio</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="https://img.icons8.com/?size=100&id=ya4CrqO7PgnY&format=png&color=000000" alt="logo">
            <h1><strong>Drive</strong></h1>
            <input type="search" placeholder="Buscar en Drive" class="search-bar">
            <div class="logout-button">
            <a href="?logout=true" class="btn">Cerrar Sesión</a>
        </div>
        </div>
    </div>
    <div class="main">
        <div class="sidebar">
            <div class="sidebar-item">Página principal</div>
            <div class="sidebar-item">Actividad</div>
            <div class="sidebar-item">Espacios de trabajo</div>
            <div class="sidebar-item">Mi unidad</div>
            <div class="sidebar-item">Compartido conmigo</div>
            <div class="sidebar-item">Reciente</div>
            <div class="sidebar-item">Destacados</div>
            <div class="sidebar-item">Spam</div>
            <div class="sidebar-item">Papelera</div>
            <div class="storage-section">
                <span>Almacenamiento</span>
                <p>38.9 MB en uso de 10.0 GB</p>
            </div>
        </div>
        <div class="main-content">
            <header class="header">
                <h1>Te damos la bienvenida a Drive</h1>
            </header>
            <div class="add">
                <textarea id="new-file-content" placeholder="Escribe tu archivo aquí" class="search-bar2"></textarea>
                <div>
                    <button class="btn add-start-btn">Agregar al inicio</button>
                    <button class="btn add-end-btn">Agregar al final</button>
                </div>
            </div>
            <div class="filter-bar">
                <button class="btn delete-start-btn">Eliminar al inicio</button>
                <button class="btn delete-end-btn">Eliminar al final</button>
                    <button class="btn search-btn">Buscar Archivo</button>
                <button class="btn clear-all-btn">Eliminar todo</button>
            </div>
            <div class="file-list">
            <table>
                <thead>
                    <tr>
                        <th>Nombre del archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="fileTable">
                    <!-- Las filas se irán generando dinámicamente -->
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <script src="http://localhost/Integradora/js/Scripts.js?=v2"></script>
</body>
</html>
