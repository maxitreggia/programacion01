<?php

use practica8\Circle;
use practica8\Rectangle;
use practica8\Square;
use practica8\Triangle;

require_once 'geometricFigure12.php';

$side1 = floatval($_GET['side1']);
$side2 = floatval($_GET['side2']);
$typeOfFigure = $_GET['figure'];

switch ($typeOfFigure) {
    case 'triangle':
        if ($side1 > 0 && $side2 > 0) {
            $triangle = new Triangle('Triángulo');
            echo "La figura selecionada es: " . $triangle->getName();
            echo "<br> El área del triángulo es: " . $triangle->calculateArea($side1, $side2);
        } else {
            echo "Por favor, ingrese los lados del triángulo. (Lado1 = Base y Lado2 = Altura)";
        }
        break;
    case 'square':
        if ($side1 > 0) {
            $square = new Square('Cuadrado');
            echo "La figura selecionada es: " . $square->getName();
            echo "<br> EL área del cuadro es: " . $square->calculateArea($side1);
        } else {
            echo "Por favor, ingresa el lado del cuadrado. (Lado1 = Lado)";
        }
        break;
    case 'circle':
        if ($side2 > 0) {
            $circle = new Circle('Circulo');
            echo "La figura selecionada es: " . $circle->getName();
            echo "<br> El área del circulo es: " . $circle->calculateArea($side2);
        } else {
            echo "Por favor, ingresa el radio del círculo. (Lado2 = Radio)";
        }
        break;
    case 'rectangle':
        if ($side1 > 0 && $side2 > 0) {
            $rectangle = new Rectangle('Rectangulo');
            echo "La figura selecionada es: " . $rectangle->getName();
            echo "<br> El área del rectangulo es: " . $rectangle->calculateArea($side1, $side2);
        } else {
            echo "Por favor, ingresa los lados del rectángulo. (Lado1 = Base y Lado2 = Altura)";
        }
        break;
    default:
        echo "Opcion no valida";
        return;
}