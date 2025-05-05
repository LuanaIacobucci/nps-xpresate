<?php
require 'db_config.php';
session_start();
$correo = $_SESSION['correo'] ?? null; // Obtener el ID del usuario de la sesión o del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $puntaje = isset($_POST['puntaje']) ? intval($_POST['puntaje']) : null;
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : "";
    /*$user_correo = isset($_POST['co']) ? intval($_POST['user_id']) : null;*/
    if ($puntaje !== null && $puntaje >= 0 && $puntaje <= 10) {
        $stmt = $conn->prepare("INSERT INTO respuestas (correo, puntaje, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("sis",$correo, $puntaje, $comentario);
        $stmt->execute();
        $stmt->close();
        echo "Respuesta registrada correctamente.";
    } else {
        echo "Puntaje inválido.";
    }

    $_SESSION['correo'] = null; // Guardar el ID del usuario en la sesión
    $conn->close();

    header("Location: gracias.html");
    exit;
} else {
    echo "Método no permitido.";
}



?>
