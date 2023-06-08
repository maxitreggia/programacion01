<?php
// Ingresar 5 ternas formadas por dos números (hacerlo por un programa HTML) y un
// carácter que corresponde al código de la operación a efectuar entre ellos (‘+’; ‘-’; ‘*’;
// ‘/’). Informar el resultado de cada expresión, por medio de un programa php.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function calculateTernary($num1, $num2, $operation)
    {
        switch ($operation) {
            case "+":
                return $num1 + $num2;
            case "-":
                return $num1 - $num2;
            case "*":
                return $num1 * $num2;
            case "/":
                if ($num2 != 0) {
                    return $num1 / $num2;
                } else {
                    return "Error: Division by zero.";
                };
            default:
                return "Invalid operation.";
        };
    };

    function processTernaries($ternaries)
    {
        foreach ($ternaries as $index => $ternary) {
            $num1 = $ternary['num1'];
            $num2 = $ternary['num2'];
            $operation = $ternary['operation'];
            $result = calculateTernary($num1, $num2, $operation);
            echo "Result of Ternary " . ($index + 1) . ": " . $result . "<br>";
        };
    };

    $ternaries = $_POST['ternary'];
    processTernaries($ternaries);
};
?>