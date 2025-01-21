<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_registro.css">
    <title>PokeAPI_Registro</title>
</head>
<body>
    
    <h1>REGISTRO POKEAPI</h1>

    <form action="registro.php" id="formRegister" method="POST">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"/>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" style="border-color: <?= $todoBien ? "" : "red" ?>"/>

        <label for="password">Password</label>
        <input type="text" name="password" id="password"/>

        <label for="rpassword">Repite Password</label>
        <input type="text" name="rpassword" id="rpassword"/>

        <input type="submit" value="Enviar"/>

    </form>

    <?php

        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rpassword"])) {

            $nombre = $_POST["nombre"] ?? "";
            $email = $_POST["email"] ?? "";
            $password = $_POST["password"] ?? "";
            $rpassword = $_POST["rpassword"] ?? "";

            $todoBien = true;

            if ($password != $rpassword) {

                $todoBien = false;

            }

            require_once "jsonhandler.php";

            $datos = loadEventsFromJson();

            foreach ($datos as $user) {
                
                if( $user["email"] == $email ) {

                    $todoBien = false;
    
                }

            }

            if ($todoBien) {

                echo "<p style='color: green'>Credenciales correctas.</p>";

                require_once "jsonhandler.php";

                $datos = loadEventsFromJson();

                $nuevo_user = ["nombre"=>$nombre, "email"=>$email, "password"=>$password];

                $datos[] = $nuevo_user;

                saveEventsToJson($datos);

            } else {

                echo "<p style='color: red'>Ese email ya está en uso.</p>";

            }

        }

    ?>

</body>
</html>