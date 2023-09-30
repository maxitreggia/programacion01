<?php

require_once "inscripcion222.php";

$datos = [
    "legajo" => 12345678,
    "codigoMateria" => 1234,
    "diaExamen" => 15,
    "mesExamen" => 12,
    "anioExamen" => 2023,
    "apellidoNombre" => "Sanchez Pedro",
];

$inscripcion = new Inscripcion($datos);
$inscripcion->agregarInscripcion();
$mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
mysqli_close($mysqli);