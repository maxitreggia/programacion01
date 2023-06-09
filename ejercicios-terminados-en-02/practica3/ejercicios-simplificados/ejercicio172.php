<?php
// Ingresar por medio de un HTML, 30 elementos de tipo carácter en un arreglo y luego
// mostrar sólo los elementos que sean distintos de “*”, indicando también la posición que
// dicho elemento ocupa en el arreglo.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $characters = $_POST["characters"];
    $elements = array();

    for ($i = 0; $i < strlen($characters); $i++) {
        $character = $characters[$i];
        if ($character !== "*") {
            $elements[] = $character;
            echo "Elemento: $character - Posición: $i<br>";
        };
    };
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 172</title>

</head>

<body>

    <!--  http://localhost/index172.html -->

    <form action="ejercicio172.php" method="post">
        <label for="">Ingrese 30 caracteres</label>
        <input type="text" name="characters" maxlength="30">
        <br>
        <input type="submit" value="Enviar">
    </form>

</body>