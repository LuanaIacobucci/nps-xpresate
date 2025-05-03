<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $puntaje = isset($_POST['puntaje']) ? intval($_POST['puntaje']) : null;
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : "";

    if ($puntaje !== null && $puntaje >= 0 && $puntaje <= 10) {
        $stmt = $conn->prepare("INSERT INTO respuestas (puntaje, comentario) VALUES (?, ?)");
        $stmt->bind_param("is", $puntaje, $comentario);
        $stmt->execute();
        $stmt->close();
        echo "Respuesta registrada correctamente.";
    } else {
        echo "Puntaje inválido.";
    }

    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
