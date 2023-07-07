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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 152</title>

</head>

<body>

    <!--  http://localhost/index152.html -->

    <h3>Suma de ternas</h3>
    <form action="ejercicio152.php" method="post">
        <table>
            <tr>
                <th>Terna Uno</th>
                <td><input type="number" name="ternary[0][num1]" required></td>
                <td>
                    <select name="ternary[0][operation]" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="number" name="ternary[0][num2]" required></td>
            </tr>
            <tr>
                <th>Terna Dos</th>
                <td><input type="number" name="ternary[1][num1]" required></td>
                <td>
                    <select name="ternary[1][operation]" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="number" name="ternary[1][num2]" required></td>
            </tr>
            <tr>
                <th>Terna Tres</th>
                <td><input type="number" name="ternary[2][num1]" required></td>
                <td>
                    <select name="ternary[2][operation]" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="number" name="ternary[2][num2]" required></td>
            </tr>
            <tr>
                <th>Terna Cuatro</th>
                <td><input type="number" name="ternary[3][num1]" required></td>
                <td>
                    <select name="ternary[3][operation]" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="number" name="ternary[3][num2]" required></td>
            </tr>
            <tr>
                <th>Terna Cinco</th>
                <td><input type="number" name="ternary[4][num1]" required></td>
                <td>
                    <select name="ternary[4][operation]" required>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="number" name="ternary[4][num2]" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Calcular Ternas">
    </form>
</body>