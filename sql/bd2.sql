
DROP DATABASE IF EXISTS encuesta_db;
CREATE DATABASE encuesta_db;

USE encuesta_db;

CREATE TABLE respuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(50),
    puntaje INT NOT NULL,
    comentario TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * FROM respuestas;
