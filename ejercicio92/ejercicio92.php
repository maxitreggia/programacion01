<?php
// Realiza un programa HTML que pida primero un número y a continuación un dígito. El
// programa nos debe dar la posición (o posiciones) contando de izquierda a derecha
// que ocupa ese dígito en el número introducido.

$inputNumber = abs($_POST['inputNumber']);

$inputDigit = abs($_POST['inputDigit']);

if(empty($inputNumber) || empty($inputDigit)){
    echo "Debe rellenar ambos campos para poder realizar la comparacion";
    exit();
};

function convertToArray($caractersToConvert){
    $arrayMap = array_map('intval', str_split($caractersToConvert));
    return $arrayMap;
};

function findEquals($arrayNumber, $arrayDigit){
    $equalValuePosition = [];
    foreach($arrayNumber as $index => $value){
        if(isset($arrayDigit[$index]) && $arrayDigit[$index] === $value){
            $equalValuePosition[] = $index;
        };
    };
    return $equalValuePosition;
};

$arrayNumber = convertToArray($inputNumber);

$arrayDigit = convertToArray($inputDigit);

$equalsAre = findEquals($arrayNumber, $arrayDigit);

echo "El numero ingresado es: {$inputNumber } </br>";

echo "</br> El digito ingresado es: {$inputDigit} </br>";

echo "</br> Las posiciones en las que los valores son iguales son: </br>" . implode(", ", $equalsAre);
?>