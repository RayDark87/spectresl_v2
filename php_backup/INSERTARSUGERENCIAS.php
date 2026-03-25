<?php
    include("CONEXION.php");

    if (
        isset($_POST["nombre"]) &&
        isset($_POST["email"]) &&
        isset($_POST["tipo"]) &&
        isset($_POST["asunto"]) &&
        isset($_POST["mensaje"])
    ) {

        $nombre  = mysqli_real_escape_string($conexion, $_POST["nombre"]);
        $email   = mysqli_real_escape_string($conexion, $_POST["email"]);
        $tipo    = mysqli_real_escape_string($conexion, $_POST["tipo"]);
        $asunto  = mysqli_real_escape_string($conexion, $_POST["asunto"]);
        $mensaje = mysqli_real_escape_string($conexion, $_POST["mensaje"]);

        $sql = "INSERT INTO sugerencias (nombre, email, tipo, asunto, mensaje)
                VALUES ('$nombre', '$email', '$tipo', '$asunto', '$mensaje')";

        if (mysqli_query($conexion, $sql)) {
            echo "Registro guardado correctamente.<br><br>";
            echo "<a href='FORM2.html'>Volver</a> | ";
            echo "<a href='LISTARSUGERENCIAS.php'>Ver registros</a>";
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }

    } else {
        echo "Faltan datos del formulario.";
    }
?>