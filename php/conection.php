<?php
$host = 'localhost';
$user = 'root';
$password = '795130';  
$dbname = 'google_drive_users';
$port = '3306';

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>