<?php
    include("CONEXION.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM sugerencias WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro eliminado correctamente.<br><br>";
        echo "<a href='LISTARSUGERENCIAS.php'>Volver</a>";
    } else {
        echo "Error al borrar.";
    }
?>