<?php
    include("conexion.php");

    if (
        isset($_POST["nombre"]) &&
        isset($_POST["email"]) &&
        isset($_POST["tipo"]) &&
        isset($_POST["asunto"]) &&
        isset($_POST["mensaje"])
    ) {

        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"];

        try {
            $sql = "INSERT INTO sugerencias (nombre, email, tipo, asunto, mensaje) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conexion->prepare($sql);

            if ($stmt->execute([$nombre, $email, $tipo, $asunto, $mensaje])) {
                echo "        body{
            font-family: Arial, Helvetica, sans-serif;
            background: radial-gradient(#111827, #0a0d14);
            color:#eef1f6;
            line-height:1.6;
        }"
                echo "Registro guardado correctamente en la nube.<br><br>";
                echo "<a href='FORM2.html'>Volver</a> | ";
                echo "<a href='LISTARSUGERENCIAS.php'>Ver registros</a>";
            }
        } catch (PDOException $e) {
            echo "Error al insertar en Postgres: " . $e->getMessage();
        }

    } else {
        echo "Faltan datos del formulario.";
    }

 
?>
