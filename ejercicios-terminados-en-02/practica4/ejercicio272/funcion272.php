<?php
// Programar el archivo funcion.php, que contiene la definición de la función
// es_consonante.

function es_consonante($letter) {
    $consonants = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
    return in_array($letter, $consonants);
};

?>