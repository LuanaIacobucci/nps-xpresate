<?php
session_start();
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $fecha_nac = $_POST['fecha_nacimiento'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $fecha_nac);
    $stmt->execute();

    // Prepara el SELECT para obtener el ID
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($id);
    
    if ($stmt->fetch()) {
        $_SESSION['user_id'] = $id;
        echo "Usuario identificado con ID: $id";
    } else {
        echo "No se encontró el usuario";
    }

    header("Location: encuesta.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Identificarse - Xpresate</title>
    <link rel="stylesheet" href="css\identificarse.css">
</head>
<body>
    <h2>Identifícate para responder la encuesta</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="date" name="fecha_nacimiento" required>
        <button type="submit">Comenzar encuesta</button>
    </form>
</body>
</html>
