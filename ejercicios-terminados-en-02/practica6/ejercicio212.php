<?php
//Dada la tabla Inscripción:
//- Nro de legajo (7 dígitos)
//- Código de materia (6 dígitos)
//- Día del examen (2 dígitos)
//- Mes del examen (2 dígitos)
//- Año del examen (4 dígitos)
//- Apellido y Nombre (25 caracteres)
//Desarrollar un programa que solicitando un código de materia permita seleccionar
//todos los registros de alumnos que se anotaron para rendirla y liste sus legajos y sus
//nombres.

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "escuela";
$port = 3307;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("ERROR: Conexión fallida" . $conn->connect_error);
}
//echo "Conexión exitorsa";

// Seleccionar la base de datos
if (!$conn->select_db($database)) {
    die("ERROR: No se pudo seleccionar la base de datos " . $database);
}

//Numero de materia
$codeOfSubject = $_POST["id_subject"];

// Consulta SQL
function queryStudentsSubject ($code){
    return "SELECT alumnos.id AS legajo, alumnos.nombre, alumnos.apellido, materias.nombre AS materia
            FROM alumnos
            INNER JOIN alumnos_materias ON alumnos.id = alumnos_materias.id_alumno
            INNER JOIN materias ON alumnos_materias.id_materia = materias.id
            WHERE alumnos_materias.id_materia = '$code';";
}

$result = $conn->query(queryStudentsSubject($codeOfSubject));

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Legajo</th><th>Nombre</th><th>Apellido</th><th>Materia</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["legajo"] . '</td>';
        echo '<td>' . $row["nombre"] . '</td>';
        echo '<td>' . $row["apellido"] . '</td>';
        echo '<td>' . $row["materia"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No hay alumnos inscritos a esa materia";
}

// echo $codeOfSubject;

?>