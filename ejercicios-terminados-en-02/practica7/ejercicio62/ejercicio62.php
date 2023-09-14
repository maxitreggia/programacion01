<?php

require_once 'cuentaLetras62.php';

$sentence1 = (new cuentaLetras("Utilizar distintos métodos para cada una de las acciones."));

$sentence2 = (new cuentaLetras("Elaborar un programa que permita leer una frase u oración y que imprima la palabra
                                        más larga, contemplar1 la posibilidad de que haya más de una palabra con la longitud
                                        más larga, en tal caso utilizar un arreglo para guardarlas y al final imprimir todas las
                                        palabras que tuvieron la máxima longitud."));

$longestWord1 = $sentence1->getTheLongestWord();

$longestWord2 = $sentence2->getTheLongestsWords();

echo "La palabra mas larga es:" . "<br>" . $longestWord1;
echo "<br>";
echo "Las palabras mas largas son:" . "<br>" . "[" . implode(", ", $longestWord2) . "]";