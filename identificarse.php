<?php
session_start();
require 'db_config.php';
$_SESSION['correo'] = null; // Inicializar la variable de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    
        $_SESSION['correo'] = $correo;
        echo $_SESSION['correo'];

        echo $correo;
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
    <h6>Por favor, ingresa tu correo electrónico para comenzar la encuesta.</h6>
    <h6>Recuerda que tu correo electrónico será utilizado únicamente para fines estadísticos y no será compartido con terceros.</h6>
    <br><br>
    <form method="POST">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <button type="submit">Comenzar encuesta</button>
    </form>
</body>
</html>
