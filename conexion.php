<?php
$db_url = getenv('DATABASE_URL');

if (!$db_url) {
    die("ERROR: No se encuentra la variable DATABASE_URL.");
}

$p = parse_url($db_url);

// Extraemos cada parte con un "plan B" por si falta
$host   = $p["host"] ?? null;
// Si no hay puerto en la URL, usamos el 5432 por defecto
$port   = $p["port"] ?? 5432; 
$user   = $p["user"] ?? null;
$pass   = $p["pass"] ?? null;
// Usamos 'path' (con 'th') y si no existe, ponemos null
$dbname = isset($p["path"]) ? ltrim($p["path"], "/") : null;

try {
    // IMPORTANTE: Asegúrate de que la cadena DSN sea exacta
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $conexion = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}
?>
