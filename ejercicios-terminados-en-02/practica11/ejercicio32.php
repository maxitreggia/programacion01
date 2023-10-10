<?php

use practica11\Numero;

require_once 'numero32.php';

$pivot = $_POST['pivot'];

try {
    $numero = new Numero($pivot);
    $numero->validar(); // Llamar a la función validar
    echo $numero->mostrarInformacion();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
