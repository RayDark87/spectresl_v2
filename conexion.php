<?php
$db_url = getenv('DATABASE_URL');

if (!$db_url) {
    die("ERROR: No se encuentra la variable DATABASE_URL.");
}

$p = parse_url($db_url);

$host   = $p["host"] ?? null;
$port   = $p["port"] ?? 5432; 
$user   = $p["user"] ?? null;
$pass   = $p["pass"] ?? null;

$dbname = isset($p["path"]) ? ltrim($p["path"], "/") : null;

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $conexion = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}
?>
