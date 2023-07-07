<?php
// Dado como dato la cantidad de kilowatios consumidos por un usuario en un mes (por
// medio de un programa HTML), calcular el importe a pagar por el mismo teniendo en
// cuenta que:
// - Si la cantidad de kilowatios consumidos es menor o igual a 200, el precio del
// kilowatio es de 0,05 pesos.
// - Si la cantidad de kilowatios consumidos es mayor que 200 y menor que 1000, el
// precio del kilowatio es de 0,1 pesos.
// - Si la cantidad de kilowatios consumidos es mayor o igual que 1000, el precio del
// kilowatio es de 0,15 pesos.

$inputKilowatt = intval($_POST['kilowatt']);

if(empty($inputKilowatt)){
    echo "Debe ingresar un numero";
    exit();
};

if($inputKilowatt <= 0){
    echo "Debe ingresar un valor positivo";
    exit();
};

function calculateKilowatt($kilowatt){
    $totalPayable = 0;
    if($kilowatt <= 200){
        $totalPayable = $kilowatt * 0.05;
    };
    if($kilowatt > 200 && $kilowatt < 1000){
        $totalPayable = $kilowatt * 0.1;
    };
    if($kilowatt >= 1000){
        $totalPayable =$kilowatt * 0.15;
    };
    return $totalPayable;
};

$totalPayable = calculateKilowatt($inputKilowatt);

echo "total a pagar segun su consumo medido: " . $totalPayable;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 132</title>

</head>

<body>

    <!--  http://localhost/index132.html -->

    <form action="ejercicio132.php" method="post">
        <label for="">Ingrese los kilowatios consumidos</label>
        <input type="number" name="kilowatt">
        <br>
        <input type="submit" value="Calcular consumo">
    </form>

</body>