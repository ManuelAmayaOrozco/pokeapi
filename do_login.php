<?php
    
        require_once "funciones.php";

        $usuarios = ["manuamayaorozco@gmail.com" => "1234", "pepito@hotmail.com" => "1111"];

        $validate = login($_POST["email"], $_POST["password"], $usuarios);

    
        if ($validate) {

            require_once "index.php";

        } else {

            echo "<p>Credenciales incorrectas.</p>";

        }

    ?>