<?php

    $db_url = getenv('DATABASE_URL');

    if ($db_url){
        $dbopts = parse_url($db_url);
        $host = $dbopts["host"];
        $port = $dbopts["port"];
        $user = $dbopts["user"];
        $pass = $dbopts["pass"];
        $name = ltrim($dbopts["parh"], '/');

        try {
            $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$name", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR DE CONEXION:" . $e->getMessage());
        }
    } else {
        die("ERROR: NO SE ENCONTRO LA VARIABLE DATABASE_URL EN RENDER");
    }
?>
