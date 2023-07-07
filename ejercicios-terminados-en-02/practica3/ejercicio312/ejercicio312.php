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