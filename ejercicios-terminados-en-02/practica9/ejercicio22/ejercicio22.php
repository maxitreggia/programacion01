<?php
require_once "curso22.php";

function main(): void
{
    // Crear un nuevo curso
    $idCurso = $_POST["idCurso"];
    $idAula = $_POST["idAula"];

    $curso = new Curso($idCurso, "", $idAula);

    // Modificar el aula del curso
    $exito = $curso->modificarAula();

    // Imprimir el resultado
    if ($exito) {
        echo "Aula modificada correctamente.";
    } else {
        echo "El curso no existe.";
    }
}

// Llamar a la función principal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    main();
}
