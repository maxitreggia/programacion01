<?php
require_once "alumno92.php";

function main(): void
{
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $alumno = new Alumno($dni, $nombre, $apellido);

    $exito = $alumno->agregarAlumno();

    if ($exito) {
        echo "Alumno agregado correctamente.";
    } else {
        echo "El alumno ya existe en la base de datos.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    main();
}