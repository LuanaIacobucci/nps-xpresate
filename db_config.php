<?php
$host = "localhost";
$usuario = "root";
$contrasena = "root";
$base_datos = "encuesta_db";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

