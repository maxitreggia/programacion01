<?php
// Ingresar por medio de un HTML, 30 elementos de tipo carácter en un arreglo y luego
// mostrar sólo los elementos que sean distintos de “*”, indicando también la posición que
// dicho elemento ocupa en el arreglo.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $characters = $_POST["characters"];
    $elements = array();

    for ($i = 0; $i < strlen($characters); $i++) {
        $character = $characters[$i];
        if ($character !== "*") {
            $elements[] = $character;
            echo "Elemento: $character - Posición: $i<br>";
        }
    }
}
?>