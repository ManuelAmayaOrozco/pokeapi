<?php
    
        require_once "funciones.php";
        require_once "jsonhandler.php";

        $usuarios = loadEventsFromJson();

        if (isset($_POST["email"]) && $_POST["password"]) {

            $validate = login($_POST["email"], $_POST["password"], $usuarios);

            if ($validate) {

                require_once "api.php";

            } else {

                $login_incorrecto = true;

                require_once "index.php";

                echo "<p>Credenciales incorrectas.</p>";

            }
        
        }

    ?>