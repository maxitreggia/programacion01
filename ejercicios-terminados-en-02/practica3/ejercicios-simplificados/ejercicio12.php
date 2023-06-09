<?php
//Escribir un programa en PHP que cargue un array de 50 elementos con números al
//azar entre 1 y 1000, y que no se repitan. Luego deberá calcular los dos mayores
//números generados, los dos menores números generados y el promedio de todos los
//números del array. Deberá imprimir esos cinco valores.

function getRandomArray($lenght, $min, $max){  
    $randomArray = [];
    for($i = 0; $i < $lenght; $i++){
        $number = rand($min, $max);
        if (!in_array($number, $randomArray)){
            $randomArray[] = $number;
        };
    };
    return $randomArray;
};

function sortArrayInNewArray($array){
    // En PHP los argumentos son pasados por valor en vez de por referencia.
    // Por lo cual, ordenar el array en esta funcion no altera el array original.
    sort($array);
    return $array;
};

function secondMax($sortedArray){
    // Se espera que el array este ordenado. // validar?
    return $sortedArray[sizeof($sortedArray)-2];
};

function secondMin($sortedArray){
    // Se espera que el array este ordenado.
    return $sortedArray[1];
};

function average($array){
    return array_sum($array)/count($array); 
};

$randomArray = getRandomArray($lenght = 50, $min = 1, $max = 1000);
$sortedArray = sortArrayInNewArray($randomArray);
$maxValue = max($sortedArray);
$secondMaxValue = secondMax($sortedArray);
$lowerValue = min($sortedArray);
$SecondLowerValue = secondMin($sortedArray);
$avarageValue = average($sortedArray);

echo "Array generado:" . "</br>" . "[" . implode(", ", $randomArray) . "]" . "</br>";
echo "</br>" . "Array ordenado de mayor a menor" . "</br>" . "[" . implode(", ", $sortedArray) . "]" . "</br>";
echo "</br>" . "Valor maximo del array es: " . $maxValue . "</br>";
echo "</br>" . "Segundo valor maximo del array es: " . $secondMaxValue . "</br>";
echo "</br>" . "Valor minimo del array es: " . $lowerValue . "</br>";
echo "</br>" . "Segundo valor minimo del array es: " . $SecondLowerValue . "</br>";
echo "</br>" . "El valor medio del array es: " . $avarageValue;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 12</title>
    
</head>
<body>
    <!--  http://localhost/index12.html -->

    <form action="ejercicio12.php" method="post">
        <input type="submit" value="Generar array">
    </form>

</body>