<?php
// Hacer un programa en PHP que por medio de una función calcule el número “e”
// mediante el desarrollo en serie:
// e = 1 + 1/(1!) + 1/(2!) + 1/(3!) + 1/(4!) + ... + 1/(50!)
// El factorial hacerlo en otra función.
// En el script principal debe mostrar el número e calculado.

function factorial($n){
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
};

function calculateE(){
    $e = 1;
    for ($i = 1; $i <= 50; $i++) {
        $e += 1 / factorial($i);
    }
    return $e;
};

$e = calculateE();

echo "El número e calculado es: " . $e;
?>