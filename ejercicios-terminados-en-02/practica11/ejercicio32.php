<?php

use practica11\Numero;

require_once 'numero32.php';

$pivot = $_POST['pivot'];

if($pivot < 0){
    echo "Ingrese un numero positivo";
    die();
}

$numero = new Numero($pivot);
echo $numero->mostrarInformacion();