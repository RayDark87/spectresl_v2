<?php

    $dsn = "pgsql:host=ep-solitary-hall-ag1i03tu-pooler.c-2.eu-central-1.aws.neon.tech;port=5432;dbname=spectresl-db;sslmode=require";
    $usuario = "neondb_owner";
    $password = "npg_VJWfBeh8yOo5";

    try {
        $pdo = new PDO($dsn, $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>