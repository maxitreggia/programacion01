<?php
require_once "alumno92.php";

$dni = $_POST['dni'];
$nombre = $_POST['name'];
$apellido = $_POST['lastname'];
$alumno = new Alumno($dni, $nombre, $apellido);

try {
    $bd = new BaseDeDatos();
    $bd->insertarAlumno($alumno);
    echo "El alumno ha sido agregado exitosamente.";
} catch (Exception $e) {
    echo $e->getMessage();
}