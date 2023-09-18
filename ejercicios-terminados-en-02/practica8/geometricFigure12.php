<?php

namespace practica8;

// Clase padre
class GeometricFigure
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}

// CLases hijas

class Triangle extends geometricFigure
{
    public function calculateArea(float $base, float $height):float
    {
        return ($base* $height) / 2;
    }
}

class Square extends geometricFigure
{
    public function calculateArea(float $side):float
    {
        return pow($side, 2);
    }
}

class Circle extends geometricFigure
{
    public function calculateArea(float $radius):float
    {
        return pi() * pow($radius, 2);
    }
}

class Rectangle extends geometricFigure
{
    public function calculateArea(float $base, float $height):float
    {
        return ($base * $height);
    }
}
