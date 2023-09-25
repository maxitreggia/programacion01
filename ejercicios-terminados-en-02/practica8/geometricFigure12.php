<?php

namespace practica8;
use Exception;

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
    public function calculateArea() {
    }

    public function showArea() {
        $area = $this->calculateArea();
    }
}

// CLases hijas

class Triangle extends geometricFigure
{
    private $base;
    private $height;

    public function __construct($base, $height) {
        parent::__construct("Triangle");
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        return ($this->base * $this->height) / 2;
    }
}

class Square extends geometricFigure
{
    private $side;

    public function __construct($side) {
        parent::__construct("Square");
        $this->side = $side;
    }

    public function calculateArea(float $side):float
    {
        return $this->side * $this->side;
    }
}

class Circle extends geometricFigure
{
    private $radius;

    public function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }

    public function calculateArea(float $radius):float
    {
        return M_PI * pow($this->radius, 2);
    }
}

class Rectangle extends geometricFigure
{
    private $base;
    private $height;

    public function __construct($base, $height) {
        parent::__construct("Rectangle");
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea(float $base, float $height):float
    {
        return $this->base * $this->height;
    }
}
