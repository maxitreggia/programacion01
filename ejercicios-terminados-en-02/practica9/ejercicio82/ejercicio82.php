<?php
require_once "escuela82.php";

$connection = new DatabaseConnection("escuela", "alumno", "examen", "sistema");

$id = $_GET['id'];

$deleted = $connection->deleteSubject($id);

if ($deleted) {
    echo "La materia se ha borrado correctamente.";
} else {
    echo "Ha habido un error al borrar la materia.";
}

$mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
mysqli_close($mysqli);