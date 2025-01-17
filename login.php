<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

    <h1 style="color: red">LOGIN DE LA PÁGINA WEB</h1>

    <form action="login.php" method="POST">

        <label for="email">email</label>
        <input type="text" name="email" id="email"/>

        <label for="password">contraseña</label>
        <input type="password" name="password" id="password"/>

        <input type="submit" value="enviar"/>

    </form>

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
    
</body>
</html>