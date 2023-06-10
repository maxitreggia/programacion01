<?php
// El siguiente programa PHP recibe por GET las tres notas de un alumno. La situación
// de un alumno se evalúa del siguiente modo:
// • Si sus tres notas son mayores o iguales a 6: "Aprobado".
// • Si el promedio es menor que 6: "Reprobado".
// • Si el promedio es mayor o igual a 6, pero alguna de sus notas es menor que 6:
// "Recuperatorio".

function promedio($note1, $note2, $note3){
    return ($note1 + $note2 + $note3) / 3;
};

function situacion($note1, $note2, $note3){
    if($note1 >= 6 && $note2 >= 6 && $note3 >= 6){
        echo "Aprobado";
    }elseif(promedio($note1, $note2, $note3) < 6){
        echo "Reprobado";
    }else{
        echo "Recuperatorio";
    };
};
?>