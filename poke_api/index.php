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

            <input type="submit" value="enviar"/>

        </form>

        <?php

            //Inicializa una peticion GET con la url le demos
            $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$_POST["pokemon"]."/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Realiza la petición GET
            $result = curl_exec($ch);
            // Decodifica la respuesta y la almacena en un array asociativo
            $datos_pokemon = json_decode($result, true);
            curl_close($ch);

            echo $datos_pokemon["name"];
            echo "<br>";
            echo "<img src=".$datos_pokemon["sprites"]["other"]["home"]["front_default"].">";

            /*150 primeros*/

            for ($i = 1; $i < 151; $i++) {

                //Inicializa una peticion GET con la url le demos
                $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$i."/");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Realiza la petición GET
                $result = curl_exec($ch);
                // Decodifica la respuesta y la almacena en un array asociativo
                $datos_pokemon150 = json_decode($result, true);
                curl_close($ch);

                echo "<img src=".$datos_pokemon150["sprites"]["front_default"].">";
                echo "<br>";


            }


        ?>

</body>
</html>