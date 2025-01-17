<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <form action="index.php" method="POST">

            <label for="pokemon">Pokemon</label>
            <input type="text" name="pokemon" id="pokemon"/>

            <input type="submit" value="Buscar"/>

        </form>

        <?php

            $pokemon = strtolower($_POST["pokemon"]);

            //Inicializa una peticion GET con la url le demos
            $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$pokemon."/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Realiza la petición GET
            $result = curl_exec($ch);
            // Decodifica la respuesta y la almacena en un array asociativo
            $datos_pokemon = json_decode($result, true);
            curl_close($ch);

            echo "<div>";
            echo "<img src=".$datos_pokemon["sprites"]["front_default"].">";
            echo "<br>";
            echo "<p>ID: ".$datos_pokemon["id"]."</p>";
            echo ucfirst($datos_pokemon["name"]);
            echo "<br>";
            if (sizeof($datos_pokemon["types"]) == 2) {

                echo "<p>Tipo: ".ucfirst($datos_pokemon["types"]["0"]["type"]["name"])." - ".ucfirst($datos_pokemon["types"]["1"]["type"]["name"])."</p>";

            } else {

                echo "<p>Tipo: ".ucfirst($datos_pokemon["types"]["0"]["type"]["name"])."</p>";

            }
            echo "<p>HP: ".$datos_pokemon["stats"]["0"]["base_stat"]."</p>";
            echo "<p>ATK: ".$datos_pokemon["stats"]["1"]["base_stat"]."</p>";
            echo "<p>DEF: ".$datos_pokemon["stats"]["2"]["base_stat"]."</p>";
            echo "<p>SP.ATK: ".$datos_pokemon["stats"]["3"]["base_stat"]."</p>";
            echo "<p>SP.DEF: ".$datos_pokemon["stats"]["4"]["base_stat"]."</p>";
            echo "<p>VEL: ".$datos_pokemon["stats"]["5"]["base_stat"]."</p>";
            echo "</div>";



        ?>

</body>
</html>