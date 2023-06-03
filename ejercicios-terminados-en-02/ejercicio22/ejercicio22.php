<?php
//Realizar un programa en HTML que pida solo un número. Luego, tendrá que llamar a
//un programa PHP por medio del método POST, que realice una sucesión que
//comience en 1 y el próximo número sea el doble al anterior (1, 2, 4, 8, 16, 32, 64,...).
//La tendrá que imprimir por pantalla, mientras el último número de la sucesión no
//supere al número ingresado desde el HTML. Luego, que haga lo mismo, pero esta
//vez, deberá imprimir la sucesión en orden inverso (..., 64, 32, 16, 8, 4, 2, 1).

function getArray ($maxValueOfArray){
    if(isset($_POST['number'])){
        $maxValueOfArray = $_POST['number'];
        $incrementArray = [];
        $value = 1;
        while($value <= $maxValueOfArray){
            $incrementArray[] = $value;
            $value *= 2;
        };
    };
    return $incrementArray;
};

function getDescendingArray ($incrementArray){
    $descendingArray = $incrementArray;
    rsort($descendingArray);
    return $descendingArray;
};

$incrementArray = getArray($_POST['number']);

$descendingArray = getDescendingArray($incrementArray);

echo "Array generado:" . "</br>" . "[" . implode(", ", $incrementArray) . "]" . "</br>";
echo "</br>" . "Array decresiente:" . "</br>" . "[" . implode(", ", $descendingArray) . "]" . "</br>";

?>