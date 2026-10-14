<?php
    include("CONEXION.php");

    $id = $_GET["id"];

    $sql = "SELECT * FROM sugerencias WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
?>

<h2>Editar registro</h2>

<form action="ACTUALIZAR.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    Nombre:<br>
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br><br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $fila['email']; ?>"><br><br>

    Tipo:<br>
    <input type="text" name="tipo" value="<?php echo $fila['tipo']; ?>"><br><br>

    Asunto:<br>
    <input type="text" name="asunto" value="<?php echo $fila['asunto']; ?>"><br><br>

    Mensaje:<br>
    <textarea name="mensaje"><?php echo $fila['mensaje']; ?></textarea><br><br>

    <button type="submit">Actualizar</button>
</form>