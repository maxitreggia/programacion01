<?php
// Ingresar 5 ternas formadas por dos números (hacerlo por un programa HTML) y un
// carácter que corresponde al código de la operación a efectuar entre ellos (‘+’; ‘-’; ‘*’;
// ‘/’). Informar el resultado de cada expresión, por medio de un programa php.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ternaries = $_POST['ternary'];
    if (count($ternaries) === 5) {
        $results = calculateTernaries($ternaries);
        for ($i = 0; $i < count($results); $i++) {
            echo "Resultado de la terna " . ($i + 1) . ": " . $results[$i] . "<br>";
        };
    } else {
        echo "Por favor, ingresa exactamente 5 ternas.";
    };
};

function calculateTernaries($ternaries) {
    $results = array();
    foreach ($ternaries as $terna) {
        $num1 = $terna['num1'];
        $operation = $terna['operation'];
        $num2 = $terna['num2'];
        $result = 0;
        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Error: división por cero';
                };
                break;
        };
        $results[] = $result;
    };
    return $results;
};
?>