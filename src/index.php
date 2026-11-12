<?php
// Leemos los datos de conexión de las VARIABLES DE AMBIENTE
// (nunca escribimos usuario/contraseña directamente en el código)
$host = getenv('DB_HOST');
$name = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$name;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mensaje = $pdo->query('SELECT texto FROM mensajes LIMIT 1')->fetchColumn();
    $version = $pdo->query('SELECT VERSION()')->fetchColumn();
    $estado  = "✅ Conectado a MySQL $version";
} catch (PDOException $e) {
    $mensaje = 'Hola mundo';
    $estado  = '❌ Error de conexión: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hola mundo - Práctica 7</title>
</head>
<body style="font-family: sans-serif; text-align: center; margin-top: 80px;">
    <h1><?= htmlspecialchars($mensaje) ?></h1>
    <p><?= htmlspecialchars($estado) ?></p>
    <small>Práctica 7: PHP + MySQL con Dockerfile y Docker Compose</small>
</body>
</html>
