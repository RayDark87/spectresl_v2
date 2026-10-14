<?php
    include("CONEXION.php");

    $sql = "SELECT * FROM sugerencias ORDER BY fecha DESC";
    $resultado = mysqli_query($conexion, $sql);

    echo "<h2>Listado de sugerencias / opiniones / solicitudes</h2>";
    echo "<a href='FORM2.html'>Nuevo registro</a><br><br>";

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_assoc($resultado)) {

            echo "<hr>";
            echo "<b>ID:</b> " . $fila["id"] . "<br>";
            echo "<b>Nombre:</b> " . $fila["nombre"] . "<br>";
            echo "<b>Email:</b> " . $fila["email"] . "<br>";
            echo "<b>Tipo:</b> " . $fila["tipo"] . "<br>";
            echo "<b>Asunto:</b> " . $fila["asunto"] . "<br>";
            echo "<b>Mensaje:</b> " . $fila["mensaje"] . "<br><br>";

            echo "<a href='EDITAR.php?id=" . $fila["id"] . "'>Editar</a> | ";
            echo "<a href='BORRAR.php?id=" . $fila["id"] . "'>Borrar</a>";
        }

    } else {
        echo "No hay registros todavía.";
    }
?>