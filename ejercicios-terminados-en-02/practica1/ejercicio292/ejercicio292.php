<?php
// Dadas las medidas de dos ángulos de un triángulo, que deberán ingresarse por medio
// de un HTML, determinar la medida del tercero e informar el resultado, en un programa
// PHP.

$angulo1 = $_POST['ang1'];
$angulo2 = $_POST['ang2'];

$angulo3 = 180 - $angulo1 - $angulo2; 

echo "La medida del tercer ángulo es: " . $angulo3 . " grados"; 
?>