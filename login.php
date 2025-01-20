<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_login.css">
    <title>PokeAPI_Login</title>
</head>
<body>

    <h1 style="color: red">LOGIN POKEAPI</h1>

    <form action="login.php" method="POST">

        <label for="email">Email</label>
        <input type="text" name="email" id="email"/>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password"/>

        <input type="submit" value="enviar"/>

    </form>

    <?php
        require_once "do_login.php";
    ?>
    
</body>
</html>