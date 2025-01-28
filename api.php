<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_api.css">
    <title>PokeAPI</title>
</head>
<body>

        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Login</a></li>
                    <li><a href="registro.php">Registro</a></li>
                </ul>
            </nav>
        </header>
    
        <form action="api.php" method="POST">

            <label for="pokemon">Pokemon</label>
            <input type="text" name="pokemon" id="pokemon"/>

            <input type="submit" value="Buscar"/>

        </form>

        <?php

            // Cuando se busque la información de un Pokemon se activará esta parte PHP

            if (isset($_POST["pokemon"])) {

                $pokemon = strtolower($_POST["pokemon"]);

                //Inicializa una peticion GET con la url le demos
                $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$pokemon."/");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Realiza la petición GET
                $result = curl_exec($ch);
                // Decodifica la respuesta y la almacena en un array asociativo
                $datos_pokemon = json_decode($result, true);
                curl_close($ch);

                // Lista de los colores de los diferentes tipos

                $colores = ["normal" => "#d2cade",
                            "grass" => "#0fab2b",
                            "fire" => "#e3571c",
                            "water" => "#1c44e3",
                            "ice" => "#55aaef",
                            "electric" => "#f4d104",
                            "poison" => "#b511dd",
                            "ghost" => "#550d8f",
                            "bug" => "#52a10a",
                            "psychic" => "#e00ba7",
                            "dark" => "#3c1702",
                            "rock" => "#9e1b09",
                            "ground" => "#5d2502",
                            "fighting" => "#f8691f",
                            "flying" => "#90b1fd",
                            "dragon" => "#5a30f2",
                            "fairy" => "#fc98e1",
                            "steel" => "#aeaeae" ];

                echo "<div class=caja_poke>";

                // Salta mensaje de error si el nombre del Pokemon no es válido

                if (isset($_POST["pokemon"]) && $datos_pokemon === null) {

                    echo "<p style=color:red>Nombre del Pokemon no válido</p>";

                } else {

                    echo "<div class=caja_imagen style=background-color:".$colores[$datos_pokemon["types"]["0"]["type"]["name"]].">"; // Utilizando el tipo principal del Pokemon sacamos el color del fondo
                    echo "<img src=".$datos_pokemon["sprites"]["front_default"].">"; // Imagen del Pokemon
                    echo "</div>";
                    echo "<div class=datos_poke>";
                    echo "<p>ID: ".$datos_pokemon["id"]."</p>"; // Número del Pokemon
                    echo ucfirst($datos_pokemon["name"]); // Nombre del Pokemon
                    echo "<br>";
                    if (sizeof($datos_pokemon["types"]) == 2) { // Dependiendo de si tiene uno o dos tipos, saldrán uno o dos, los tipos cambian de color dependiendo del tipo que sea de la misma manera que el color del fondo de la imagen superior

                        echo "<p>Tipo: <span style=color:".$colores[$datos_pokemon["types"]["0"]["type"]["name"]].">".ucfirst($datos_pokemon["types"]["0"]["type"]["name"])."</span><span> - </span><span style=color:".$colores[$datos_pokemon["types"]["1"]["type"]["name"]].">".ucfirst($datos_pokemon["types"]["1"]["type"]["name"])."</span></p>";

                    } else {

                        echo "<p>Tipo: <span style=color:".$colores[$datos_pokemon["types"]["0"]["type"]["name"]].">".ucfirst($datos_pokemon["types"]["0"]["type"]["name"])."</span></p>";

                    } //Aquí obtenemos los stats del Pokemon
                    echo "<p>HP: ".$datos_pokemon["stats"]["0"]["base_stat"]."</p>";
                    echo "<p>ATK: ".$datos_pokemon["stats"]["1"]["base_stat"]."</p>";
                    echo "<p>DEF: ".$datos_pokemon["stats"]["2"]["base_stat"]."</p>";
                    echo "<p>SP.ATK: ".$datos_pokemon["stats"]["3"]["base_stat"]."</p>";
                    echo "<p>SP.DEF: ".$datos_pokemon["stats"]["4"]["base_stat"]."</p>";
                    echo "<p>VEL: ".$datos_pokemon["stats"]["5"]["base_stat"]."</p>";
                    echo "</div>";
                    echo "</div>";

                }

            }

        ?>

</body>
</html>