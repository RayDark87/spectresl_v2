<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "primera_bd";
    $bd_url = getenv('postgresql://system:K8ZJ9ls9cJNLfcslLVQ2bhqcwJA66jsh@dpg-d6jbc64r85hc73fschag-a.frankfurt-postgres.render.com/spectredb');

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>