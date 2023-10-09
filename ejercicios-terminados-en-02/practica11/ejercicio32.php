<?php

use practica11\Numero;

require_once 'numero32.php';

$pivot = $_POST['pivot'] ?? null; // Usamos el operador de fusión de null para manejar el caso en que no se proporciona 'pivot'

try {
    $numero = new Numero($pivot);
    $numero->validar(); // Llamar a la función validar
    echo $numero->mostrarInformacion();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
