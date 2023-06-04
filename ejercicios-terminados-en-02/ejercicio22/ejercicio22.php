<?php
//Realizar un programa en HTML que pida solo un número. Luego, tendrá que llamar a
//un programa PHP por medio del método POST, que realice una sucesión que
//comience en 1 y el próximo número sea el doble al anterior (1, 2, 4, 8, 16, 32, 64,...).
//La tendrá que imprimir por pantalla, mientras el último número de la sucesión no
//supere al número ingresado desde el HTML. Luego, que haga lo mismo, pero esta
//vez, deberá imprimir la sucesión en orden inverso (..., 64, 32, 16, 8, 4, 2, 1).

if(!isset($_POST['number'])){
    echo "Error, no ingreso un numero. Ingrese un numero mayor a cero.";
    exit();
};

if(gettype($_POST['number']) != 'intenger'){
    //esta validacion no es necesaria si el POST se genera desde el HTML. Pero si el POST 
    //se genera desde un cliente externo (como POSTMAN) esta validacion sera util
    echo "Error, el argumento enviado no es un numero";
    exit();
};

if($_POST['number'] <= 0){
    echo "Error, ingrese un numero mayor a cero.";
    exit();
};

function generateSequence ($maxValue){
    $sequence = [];
    for($value = 1; $value <= $maxValue; $value *= 2){
        $sequence[] = $value;
    };
    return $sequence;
};

$sequence = generateSequence($_POST['number']);
$reversedSequence = array_reverse($sequence); // 

echo "Array generado:" . "</br>" . "[" . implode(", ", $sequence) . "]" . "</br>";
echo "</br>" . "Array decreciente:" . "</br>" . "[" . implode(", ", $reversedSequence) . "]" . "</br>";

?>