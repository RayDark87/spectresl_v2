<?php
    include("CONEXION.php");

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $sql = "UPDATE sugerencias SET
            nombre='$nombre',
            email='$email',
            tipo='$tipo',
            asunto='$asunto',
            mensaje='$mensaje'
            WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro actualizado correctamente.<br><br>";
        echo "<a href='LISTARSUGERENCIAS.php'>Volver</a>";
    } else {
        echo "Error al actualizar.";
    }
?>
