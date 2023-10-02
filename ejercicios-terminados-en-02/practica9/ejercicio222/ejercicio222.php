<?php

require_once "inscripcion222.php";

function main(): void
{
    // Crear una nueva inscripción
    $inscripcion = new Inscripcion(12345678, 987654321, 2, 10, 2023, "Juan Pérez");

    // Agregar la inscripción a la base de datos
    $inscripcion->agregarInscripcion();
}

// Llamar a la función principal
main();