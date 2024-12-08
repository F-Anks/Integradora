

<?php
session_start();
require_once 'conection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = trim(strtolower($_POST['email'])); // Normalizar el correo
    $password = $_POST['password'];

    // Validar que ambos campos no estén vacíos
    if (empty($email) || empty($password)) {
        echo "Correo y contraseña son requeridos.";
        exit;
    }

    // Consultar en la base de datos si existe el correo
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, verificar la contraseña
        $user = $result->fetch_assoc();
        
        // Verificar si la contraseña ingresada coincide con la almacenada (usando password_verify)
        if (password_verify($password, $user['password'])) {
            // Contraseña correcta, guardar datos del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['rol']; // Rol: 0 para admin, 1 para usuario normal

            // Redirigir según el rol
            if ($user['rol'] == '0') {
                // Si el rol es 0, redirigir a admin.php
                header("Location: admin.php");
                exit;
            } else {
                // Si el rol es 1, redirigir a main.php
                header("Location: main.php");
                exit;
            }
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // No se encontró el usuario
        echo "No se encontró un usuario con ese correo.";
    }
}
?>
