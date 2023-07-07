<?php
//Realizar un programa en HTML que pida solo un número. Luego, tendrá que llamar a
//un programa PHP por medio del método POST, que realice una sucesión que
//comience en 1 y el próximo número sea el doble al anterior (1, 2, 4, 8, 16, 32, 64,...).
//La tendrá que imprimir por pantalla, mientras el último número de la sucesión no
//supere al número ingresado desde el HTML. Luego, que haga lo mismo, pero esta
//vez, deberá imprimir la sucesión en orden inverso (..., 64, 32, 16, 8, 4, 2, 1).

if(!isset($_POST['number'])){
    echo "Error, no ingreso un numero. Ingrese un numero mayor a cero.";
    exit();
};

$number = intval($_POST['number']);

if($number <= 0){
    echo "Error, ingrese un numero mayor a cero.";
    exit();
};


function generateSequence ($maxValue){
    $sequence = [];
    for($value = 1; $value <= $maxValue; $value *= 2){
        $sequence[] = $value;
    };
    return $sequence;
};

$sequence = generateSequence($number);
$reversedSequence = array_reverse($sequence); // 

echo "Array generado:" . "</br>" . "[" . implode(", ", $sequence) . "]" . "</br>";
echo "</br>" . "Array decreciente:" . "</br>" . "[" . implode(", ", $reversedSequence) . "]" . "</br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 22</title>
    
</head>
<body>
    <!--  http://localhost/index22.html -->

    <form action="ejercicio22.php" method="post">
        <label for="">Ingrese un numero </label>
        <input type="number" name="number">
        <br>
        <input type="submit" value="Generar array">
    </form>

</body>