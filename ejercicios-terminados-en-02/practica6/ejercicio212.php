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

$servername = "localhost";
$username = "maxi";
$password = "";
$database = "escuela";
$port = 3307;

$conn = new mysqli($servername, $username, $password);

if ($conn -> connect_error){
    die("ERROR: Conexión fallida" . $conn->connect_error);
}
//echo "Conexión exitosa";

$sql = "SELECT nombre FROM escuela.alumnos";
$result =  mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "nombre". $row["nombre"] . "<br>";
    }
}else {
    echo "No hay alumnos inscriptos a esa materia";
}

mysqli_close($conn);


?>