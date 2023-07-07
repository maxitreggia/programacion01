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

$NOTES = ["do", "re", "mi", "fa", "sol", "la", "si"];

function getNotesForCompass($NOTES){
    for ($i = 0; $i < 4; $i++) {
        $fourNotes[] = $NOTES[array_rand($NOTES)];
    };
    return $fourNotes;
};

function getQuantityOfCompass(){
    return rand(1, 28); 
};

function generateMelody($NOTES){
    $melody = array();  
    $numCompasses = getQuantityOfCompass();   
    for ($i = 0; $i < $numCompasses; $i++) {
        $compass = getNotesForCompass($NOTES);
        $melody[] = implode(' ', $compass);
    };   
    $firstNote = explode(' ', $melody[0])[0];
    $lastNote = explode(' ', $melody[$numCompasses - 1])[3]; 
    $melody[$numCompasses - 1] = str_replace($lastNote, $firstNote, $melody[$numCompasses - 1]);    
    $melody[] = $melody[0];  
    return implode(' | ', $melody) . ' ||';
};

$melody = generateMelody($NOTES);

echo "La melodia generada es: </br> {$melody}";
?>