<?php
    
        // do_login se usa para simular un cambio de página tras un login, cambia a la api o te devuelve al login dependiendo de si los datos del usuario están registrados

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