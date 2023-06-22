<?php
//Crea una biblioteca de funciones para arrays bidimensionales (de dos dimensiones) de
//números enteros que contenga las siguientes funciones:
//1. generaArrayBiInt: Genera un array de tamaño n x m con números aleatorios cuyo
//intervalo (mínimo y máximo) se indica como parámetro.
//2. filaDeArrayBiInt: Devuelve la fila i-ésima del array que se pasa como parámetro.
//3. columnaDeArrayBiInt: Devuelve la columna j-ésima del array que se pasa como
//parámetro.
//4. coordenadasEnArrayBiInt: Devuelve la fila y la columna (en un array con dos
//elementos) de la primera ocurrencia de un número dentro de un array bidimensional.
//Si el número no se encuentra en el array, la función devuelve el array {-1, -1}.
//5. esPuntoDeSilla: Dice si un número es o no punto de silla, es decir, mínimo en su fila
//y máximo en su columna.
//6. diagonal: Devuelve un array que contiene una de las diagonales del array
// bidimensional que se pasa como parámetro. Se pasan como parámetros fila, columna
//y dirección. La fila y la columna determinan el número que marcará las dos posibles
//diagonales dentro del array. La dirección es una cadena de caracteres que puede ser
//“deiz” o “izde”. La cadena “deiz” indica que se elige la diagonal que va de derecha a
//izquierda, mientras que la cadena “izde” indica que se elige la diagonal que va de
//izquierda a derecha.
//Probar el funcionamiento de todas.

function generaArrayBiInt($n, $m, $min, $max) {
    $array = array();
    for ($i = 0; $i < $n; $i++) {
        $fila = array();
        for ($j = 0; $j < $m; $j++) {
            $fila[] = rand($min, $max);
        };
        $array[] = $fila;
    };
    return $array;
};

function filaDeArrayBiInt($array, $fila) {
    return $array[$fila];
};

function columnaDeArrayBiInt($array, $columna) {
    $columnaArray = array();
    foreach ($array as $fila) {
        $columnaArray[] = $fila[$columna];
    };
    return $columnaArray;
};

function coordenadasEnArrayBiInt($array, $numero) {
    $coordenadas = array(-1, -1);
    foreach ($array as $fila => $elementos) {
        foreach ($elementos as $columna => $valor) {
            if ($valor == $numero) {
                $coordenadas = array($fila, $columna);
                return $coordenadas;
            };
        };
    };
    return $coordenadas;
};

function esPuntoDeSilla($array, $fila, $columna) {
    $numero = $array[$fila][$columna];

    foreach ($array[$fila] as $elemento) {
        if ($elemento < $numero) {
            return false;
        };
    };
    foreach ($array as $filaArray) {
        if ($filaArray[$columna] > $numero) {
            return false;
        };
    };
    return true;
};

function diagonal($array, $fila, $columna, $direccion) {
    $diagonal = array();
    $n = count($array);
    $m = count($array[0]);
    while ($fila >= 0 && $fila < $n && $columna >= 0 && $columna < $m) {
        $diagonal[] = $array[$fila][$columna];
        if ($direccion == "deiz") {
            $fila--;
            $columna++;
        } elseif ($direccion == "izde") {
            $fila--;
            $columna--;
        } else {
            break;
        };
    };
    return $diagonal;
};

$array = generaArrayBiInt(4, 4, 1, 10);
echo "Array bidimensional:<br>";
foreach ($array as $fila) {
    echo implode(", ", $fila) . "<br>";};
$fila = filaDeArrayBiInt($array, 2);
echo "Fila 2: " . implode(", ", $fila) . "<br>";
$columna = columnaDeArrayBiInt($array, 1);
echo "Columna 1: " . implode(", ", $columna) . "<br>";
$coordenadas = coordenadasEnArrayBiInt($array, 8);
echo "Coordenadas de 8: (" . $coordenadas[0] . ", " . $coordenadas[1] . ")<br>";
$puntoDeSilla = esPuntoDeSilla($array, 2, 1);
echo "¿El número en la posición (2, 1) es punto de silla? " . ($puntoDeSilla ? "Sí" : "No") . "<br>";
$diagonal = diagonal($array, 1, 2, "deiz");
echo "Diagonal de derecha a izquierda (1, 2): " . implode(", ", $diagonal) . "<br>";
$diagonal = diagonal($array, 0, 3, "izde");
echo "Diagonal de izquierda a derecha (0, 3): " . implode(", ", $diagonal) . "<br>";

?>