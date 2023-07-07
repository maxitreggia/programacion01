<?php
// Realiza un programa HTML que pida primero un número y a continuación un dígito. El
// programa nos debe dar la posición (o posiciones) contando de izquierda a derecha
// que ocupa ese dígito en el número introducido.

$inputNumberAsString = $_POST['inputNumber']; //Nos es util como string por eso no lo convertimos a entero.
$inputDigit = intval($_POST['inputDigit']);

if(empty($inputNumberAsString) || empty($inputDigit)){
    echo "Debe rellenar ambos campos para poder realizar la comparacion";
    exit();
};

if($inputDigit > 9){
    echo "Debe ingresar un solo digito";
    exit();
};

function splitNumberToDigits($number){
    return array_map('intval', str_split($number));
};

function findAllDigitPositions($arrayNumber, $digit){
    $positions = [];
    foreach($arrayNumber as $index => $value){
        if($digit === $value){
            $positions[] = $index;
        };
    };
    return $positions;
};

$arrayNumber = splitNumberToDigits($inputNumberAsString);
$positions = findAllDigitPositions($arrayNumber, $inputDigit);

echo "El numero ingresado es: {$inputNumberAsString } </br>";
echo "</br> El digito ingresado es: {$inputDigit} </br>";
echo "</br> Las posiciones en las que los valores son iguales son: </br>" . implode(", ", $positions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 92</title>
    
</head>
<body>
    <!--  http://localhost/index92.html -->

    <form action="ejercicio92.php" method="post">
        <label for="">Ingrese un numero </label>
        <input type="number" name="inputNumber">
        <br>
        <label for="">Ingrese un digito</label>
        <input type="number" name="inputDigit">
        <br>
        <input type="submit" value="Mostrar posiciones">
    </form>

</body>