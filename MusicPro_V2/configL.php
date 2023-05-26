<?php
// Realiza la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password_db = ""; // Contraseña de la base de datos
$database = "prueba";

$conn = new mysqli($servername, $username, $password_db, $database);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>
