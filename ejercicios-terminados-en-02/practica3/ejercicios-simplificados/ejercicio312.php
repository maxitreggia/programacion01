<?php
// Una escuela realiza un control sobre el estado físico de sus 304 alumnos. Dispone de
// los números de legajos y estatura (en centímetros) de cada uno de ellos, por medio de
// un HTML. Se requiere saber el promedio de estatura, así como los números de legajos
// de los alumnos de estatura inferior a 165 cm.

$studentIDs = $_POST['student_id'];
$heights = $_POST['height'];

function calculateAverageHeight($heights){
    $totalHeight = 0;
    $numStudents = count($heights);
    foreach ($heights as $height) {
        $totalHeight += $height;
    }
    $averageHeight = $totalHeight / $numStudents;
    return $averageHeight;
};

function getStudentIDsWithLowerHeight($studentIDs, $heights, $limitHeight){
    $studentIDsWithLowerHeight = array();

    foreach ($heights as $index => $height) {
        if ($height < $limitHeight) {
            $studentIDsWithLowerHeight[] = $studentIDs[$index];
        };
    };
    return $studentIDsWithLowerHeight;
};

$averageHeight = calculateAverageHeight($heights);
echo "La altura promedio es: " . $averageHeight . " cm";
echo "<br>";

$limitHeight = 165;
$studentIDsWithLowerHeight = getStudentIDsWithLowerHeight($studentIDs, $heights, $limitHeight);

echo "Los estudiantes con una altura menor a" . $limitHeight . " cm son: ";
foreach ($studentIDsWithLowerHeight as $studentID) {
    echo $studentID . " ";
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 312</title>

</head>

<body>

    <!--  http://localhost/index312.html -->

    <form action="ejercicio312.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Numero de legajo</th>
                    <th>altura del estudiande (cm)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 304; $i++) {
                    echo "<tr>";
                    echo "<td><input type='number' placeholder='Ingrese el número de legajo' name='student_id[]' id='student-id' required min='0'></td>";
                    echo "<td><input type='number' placeholder='Ingrese la altura' name='height[]' id='height' required min='0'></td>";
                    echo "</tr>";
                };
                ?>
            </tbody>    
        </table>
        <input type="submit" value="Submit">
    </form> 

</body>