<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $puntaje = isset($_POST['puntaje']) ? intval($_POST['puntaje']) : null;
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : "";
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;
    if ($puntaje !== null && $puntaje >= 0 && $puntaje <= 10) {
        $stmt = $conn->prepare("INSERT INTO respuestas (user_id, puntaje, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("iis",$user_id, $puntaje, $comentario);
        $stmt->execute();
        $stmt->close();
        echo "Respuesta registrada correctamente.";
    } else {
        echo "Puntaje inválido.";
    }

    $conn->close();

    header("Location: gracias.html");
    exit;
} else {
    echo "Método no permitido.";
}



?>
