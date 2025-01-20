<?php
    
        require_once "funciones.php";
        require_once "jsonhandler.php";

        $usuarios = loadEventsFromJson();

        echo $usuarios[0];

        $validate = login($_POST["email"], $_POST["password"], $usuarios);

    
        if ($validate) {

            require_once "index.php";

        } else {

            echo "<p>Credenciales incorrectas.</p>";

        }

    ?>