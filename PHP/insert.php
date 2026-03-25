<?php

    $name = $_POST['nombre'];
    $email  = $_POST['email'];
    $pass  = $_POST['pass'];

    $email_hex    = '\\x' . bin2hex($email);
    $pass_hex = '\\x' . bin2hex($pass);


    $stmt = $pdo->prepare("INSERT INTO registro (id, nombre, email, pass) VALUES (:nombre, :email, :pass)");
    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email_hex,
        ':pass'  => $pass_hex
    ]);

    echo "Usuario registrado correctamente";

?>