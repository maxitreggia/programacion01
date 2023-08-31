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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "listaAlumnosMaterias";
$port = 3307;

$db = new mysqli($servername, $username, $password, $database, $port);

if ($db->connect_error) {
    die("ERROR: Conexión fallida" . $db->connect_error);
}
//echo "Conexión exitorsa";

if (!$db->select_db($database)) {
    die("ERROR: No se pudo seleccionar la base de datos " . $database);
}

$codeOfSubject = $_POST["id_subject"];

function queryStudentsSubject ($code){
    return "SELECT Alumno.Legajo, Alumno.Nombre, Alumno.Apellido, Materia.NombreMateria, Inscripcion.DiaExamen, Inscripcion.MesExamen, Inscripcion.AnioExamen
            FROM Alumno
            INNER JOIN Inscripcion ON Alumno.Legajo = Inscripcion.Legajo
            INNER JOIN Materia ON Inscripcion.CodigoMateria = Materia.CodigoMateria
            WHERE Materia.CodigoMateria = '$code';";
}

function generateTable ($result){
    $table = '<table border="2">';
    $table .= '<tr><th>Legajo</th><th>Nombre</th><th>Apellido</th><th>Materia</th><th>Fecha</th></tr>';
    foreach ($result as $row){
        $table .= '<tr>';
        $table .='<td>' . $row["Legajo"] . '</td>';
        $table .='<td>' . $row["Nombre"] . '</td>';
        $table .='<td>' . $row["Apellido"] . '</td>';
        $table .='<td>' . $row["NombreMateria"] . '</td>';
        $table .='<td>' . $row["DiaExamen"] ."/". $row["MesExamen"] ."/". $row["AnioExamen"] . '</td>';
        $table .= "</tr>";
    }
    $table .= '</table>';
    return $table;
}

$result = $db->query(queryStudentsSubject($codeOfSubject));

if ($result->num_rows > 0){
    echo generateTable($result);
}else{
    echo "No se encontraron alumnos inscriptos a las materia";
}

// echo $codeOfSubject;

$db->close();
?>