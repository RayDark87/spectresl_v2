<?php
    include("conexion.php");

    if (
        isset($_POST["nombre"]) &&
        isset($_POST["email"]) &&
        isset($_POST["contrasenia"])
    ) {

        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contrasenia = $_POST["contrasenia"];

        try {
            $sql = "INSERT INTO registro (nombre, email, contrasenia) 
                    VALUES (?, ?, ?)";
            
            $stmt = $conexion->prepare($sql);

            if ($stmt->execute([$nombre, $email, $contrasenia])) {
                echo '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Registro realizado</title>
            </head>
            <body>

                <style>
                    body{
                        font-family: Arial, Helvetica, sans-serif;
                        background: radial-gradient(#111827, #0a0d14);
                        color:#eef1f6;
                        line-height:1.6;
                        text-align: center;
                    }

                    
                    button{
                        padding:14px 28px;
                        border-radius:12px;
                        border:none;
                        background:linear-gradient(135deg,#c9b27a,#9fb3d1);
                        font-weight:700;
                        transition:.3s ease;
                    }

                    button:hover{
                        transform:translateY(-3px);
                        box-shadow:0 10px 25px rgba(201,178,122,0.4);
                    }

                    a{
                    color:#0a0d14;
                    text-decoration: none;
                    cursor: pointer;
                    }



                </style>

                <h2>Registro realizado correctamente</h2>
                <p>Gracias por apoyarnos ;)</p>
                <button>
                    <a href="/index.html">VOLVER AL INICIO</a>
                </button><br><br>
                <button>
                    <a href="/HTML_CSS/FORMULARIO.html">REGISTRAR OTRO USUARIO</a>
                </button>
                
            </body>
            </html>';
            };
        } catch (PDOException $e) {
            echo "Error al insertar en Postgres: " . $e->getMessage();
        }

    } else {
        echo "Faltan datos del formulario.";
    }

 
?>
