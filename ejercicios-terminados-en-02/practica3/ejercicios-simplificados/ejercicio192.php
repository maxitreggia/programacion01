<?php
// Ingresar por medio de un HTML un valor entero N (< 20). A continuación generar un
// conjunto VEC de N componentes. A partir de este conjunto generar otro FACT en el
// que cada elemento sea el factorial del elemento homólogo de VEC. Finalmente
// imprimir ambos vectores a razón de un valor de cada uno por renglón.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = $_POST["valueN"];

    if (!is_numeric($n) || $n <= 0 || $n >= 20) {
      echo "<p>Ingresa un valor válido para N (mayor a 0 y menor a 20).</p>";
    } else {
      $vec = generateVEC($n);
      $fact = generateFACT($vec);

      echo "<h2>Conjunto VEC:</h2>";
      echo "<pre>";
      foreach ($vec as $value) {
        echo $value . "\n";
      };
      echo "</pre>";

      echo "<h2>Conjunto FACT:</h2>";
      echo "<pre>";
      foreach ($fact as $value) {
        echo $value . "\n";
      };
      echo "</pre>";
    };
};

function generateVEC($n) {
    $vec = [];
    for ($i = 1; $i <= $n; $i++) {
      $vec[] = $i;
    };
    return $vec;
};

function generateFACT($vec) {
    $fact = [];
    foreach ($vec as $value) {
      $fact[] = calculateFactorial($value);
    };
    return $fact;
};

function calculateFactorial($num) {
    $factorial = 1;
    for ($i = 2; $i <= $num; $i++) {
        $factorial *= $i;
    };   
    return $factorial;
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 192</title>

</head>

<body>

    <!--  http://localhost/index192.html -->

    <form action="ejercicio192.php" method="post">
        <p>Ingrese un valor entero N (&lt; 20):</p>
        <input type="number" name="valueN" min="1" max="20" required>
        <button type="submit">Generar conjuntos</button>
    </form>

</body>