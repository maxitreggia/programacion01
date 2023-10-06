<?php
//Hacer una clase php llamada Numero, que siga las siguientes condiciones:
//• Sus atributos son: pivot. No queremos que se acceda directamente a él.
//• Los métodos que se implementarán son:
//• método constructor: recibe el valor del atributo. Por simplicidad, omitir la
//validación.
//• armarSucesion(): deberá armar una sucesión que comience en 1 y el próximo
//número sea el doble al anterior (1, 2, 4, 8,16, 32, 64, ...). El último número de la
//sucesión no debe superar al pivot. Deberá devolver toda la sucesión.
//• armarInversa(): deberá hacer lo mismo que el método anterior, sólo que en
//orden inverso (..., 64, 32, 16, 8, 4, 2, 1). Deberá devolver toda la sucesión.
//• mostrarInformacion(): devuelve una cadena que tenga toda la información del
//objeto. Deberá contemplar la impresión de ambas sucesiones.

namespace practica11;

class Numero
{
    private int|float $pivot;


    public function setPivot(int|float $valor): void
    {
       $this->pivot = $valor;
    }

    public function getPivot(): float|int
    {
        return $this->pivot;
    }

    public function __construct(int|float $pivot)
    {
        $this->setPivot($pivot);
    }

    private function armarSucesion(): array
    {
        $sucesion = [];
        $numero = 1;
        $signo = ($this->pivot < 0) ? -1 : 1;
        while ($signo * $numero <= $signo * $this->pivot){
            $sucesion [] = $numero;
            $numero *= 2;
        }
        return $sucesion;
    }

    private function armarInversa(): array
    {
        return array_reverse($this->armarSucesion());
    }

    public function mostrarInformacion(): string
    {
        $sucesionNormal = $this->armarSucesion();
        $sucesionInversa = $this->armarInversa();

        $mostrarSucesion = "Pivot: $this->pivot <br>";
        $mostrarSucesion .= "Sucesión normal: " . implode(', ', $sucesionNormal) . "<br>";
        $mostrarSucesion .= "Sucesión inversa: " . implode(', ', $sucesionInversa) . "<br>";

        return $mostrarSucesion;
    }
}