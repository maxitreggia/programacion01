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
$database = "listaalumnosmaterias";
$port = 3306;

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
    return "SELECT Alumno.Legajo, Alumno.Nombre, Alumno.Apellido, Materia.NombreMateria
            FROM Alumno
            INNER JOIN Inscripcion ON Alumno.Legajo = Inscripcion.Legajo
            INNER JOIN Materia ON Inscripcion.CodigoMateria = Materia.CodigoMateria
            WHERE Materia.CodigoMateria = '$code';";
}

$result = $conn->query(queryStudentsSubject($codeOfSubject));

if ($result->num_rows > 0) {
    echo '<table border="2">';
    echo '<tr><th>Legajo</th><th>Nombre</th><th>Apellido</th><th>Materia</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["Legajo"] . '</td>';
        echo '<td>' . $row["Nombre"] . '</td>';
        echo '<td>' . $row["Apellido"] . '</td>';
        echo '<td>' . $row["NombreMateria"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No hay alumnos inscritos a esa materia";
}

// echo $codeOfSubject;

$conn->close();
?>