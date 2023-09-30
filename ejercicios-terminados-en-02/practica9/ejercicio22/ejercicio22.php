<?php
require_once "curso22.php";

$conexion = new mysqli("escuela", "alumno", "examen", "sistema");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id_curso = $_POST['id_curso'];
$id_aula = $_POST['id_aula'];

$sql = "UPDATE cursos SET id_aula = $id_aula WHERE id = $id_curso";
$resultado = $conexion->query($sql);

if ($resultado) {
    echo "El valor del aula del curso se ha modificado correctamente.";
} else {
    echo "Error al modificar el valor del aula del curso.";
}

$conexion->close();


