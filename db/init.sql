-- Este script se ejecuta SOLO la primera vez que se crea la base de datos
CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto VARCHAR(100) NOT NULL
);

INSERT INTO mensajes (texto) VALUES ('Hola mundo desde MySQL');
