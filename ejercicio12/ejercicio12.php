<?php
//Escribir un programa en PHP que cargue un array de 50 elementos con números al
//azar entre 1 y 1000, y que no se repitan. Luego deberá calcular los dos mayores
//números generados, los dos menores números generados y el promedio de todos los
//números del array. Deberá imprimir esos cinco valores.

$lenght = 50; // cantidad de elementos del array
$min = 1; // valor minimo del array
$max = 1000; // valor maximo del arrray

function getRandomArray($lenght, $min, $max){
    $randomArray = [];
    while(count($randomArray) < $lenght){
        $number =rand($min, $max);
        if (!in_array($number, $randomArray)){
            $randomArray[] = $number;
        };
    };
    return $randomArray;
};

function sortRandomArray($randomArray){
    $sortedArray = $randomArray;
    sort($sortedArray);
    return $sortedArray;
};

function getMaxValue ($randomArray){
    $maxValue = max($randomArray);   
    return $maxValue;
};

function getSecondMaxValue ($randomArray){
    sort($randomArray);
    $secondMaxValue = $randomArray[sizeof($randomArray)-2];
    return $secondMaxValue;
};

function getLowerValue ($randomArray){
    $lowerValue = min($randomArray);
    return $lowerValue;
};

function getSecondLowerValue($randomArray){
    sort($randomArray);
    $SecondLowerValue = $randomArray[1];
    return $SecondLowerValue;;
};

function getAvarageValue($randomArray){
    $avarageValue = array_sum($randomArray)/count($randomArray);
    return $avarageValue;
};

$randomArray = getRandomArray($lenght, $min, $max);

$sortRandomArray = sortRandomArray($randomArray);

$maxValue = getMaxValue($randomArray);

$secondMaxValue = getSecondMaxValue($randomArray);

$lowerValue = getLowerValue($randomArray);

$SecondLowerValue = getSecondLowerValue($randomArray);

$avarageValue = getAvarageValue($randomArray);

echo "Array generado:" . "</br>" . "[" . implode(", ", $randomArray) . "]" . "</br>";
echo "</br>" . "Array ordenado de mayor a menor" . "</br>" . "[" . implode(", ", $sortRandomArray) . "]" . "</br>";
echo "</br>" . "Valor maximo del array es: " . $maxValue . "</br>";
echo "</br>" . "Segundo valor maximo del array es: " . $secondMaxValue . "</br>";
echo "</br>" . "Valor minimo del array es: " . $lowerValue . "</br>";
echo "</br>" . "Segundo valor minimo del array es: " . $SecondLowerValue . "</br>";
echo "</br>" . "El valor medio del array es: " . $avarageValue;
?>