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

    <form action="do_login.php" method="POST">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" style="border-color: <?= $login_incorrecto ? "red" : "" ?>"/>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" style="border-color: <?= $login_incorrecto ? "red" : "" ?>"/>

        <input type="submit" value="enviar"/>

    </form>
    
</body>
</html>