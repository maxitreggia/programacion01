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
                }
                ?>
            </tbody>    
        </table>
        <input type="submit" value="Submit">
    </form> 

</body>