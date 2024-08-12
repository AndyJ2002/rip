<?php
$servername = "localhost";
$username = "root"; // Cambia si tu usuario es diferente
$password = "hacker"; // Cambia si tu contraseña es diferente
$dbname = "rip";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

