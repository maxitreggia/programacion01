<?php
// Realiza un generador de melodía con las siguientes condiciones:
// a) Las notas deben estar generadas al azar. Las 7 notas son do, re, mi, fa, sol, la y si.
// b) Una melodía está formada por un número aleatorio de notas mayor o igual a 4,
// menor o igual a 28 y siempre múltiplo de 4 (4, 8, 12...).
// c) Cada grupo de 4 notas será un compás y estará separado del siguiente compás
// mediante la barra vertical “|”. El final de la melodía se marca con dos barras.
// d) La última nota de la melodía debe coincidir con la primera.

// Ejemplo 1: do mi fa mi | si do sol fa | fa re si do | sol mi re do ||
// Ejemplo 2: la re mi sol | fa mi mi si | do la sol fa | fa re si sol | do sol mi re | fa la do la ||

$notes = array('do', 're', 'mi', 'fa', 'sol', 'la', 'si');

function getNotesForCompass($notes){  // notas de cada compas
    for ($i = 0; $i < 4; $i++) {
        $fourNotes[] = $notes[array_rand($notes)];
    };
    return $fourNotes;
};

function getQuantityOfCompass ($number){ // numero de compases que van a formar la melodia
    $number  = rand(4, 28);
    $compass = floor($number / 4) * 4;
    return $compass; 
};

function generateMelody($notes){
    $melody = array();  
    $numCompasses = getQuantityOfCompass(28);   
    for ($i = 0; $i < $numCompasses; $i++) {
        $compass = getNotesForCompass($notes);
        $melody[] = implode(' ', $compass);
    }  
    return implode(' | ', $melody);
}

$melody = generateMelody($notes);
echo $melody;

?>