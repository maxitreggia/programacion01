<?php
// Escribe un programa HTML que le pregunte al usuario si quiere destacar el máximo o
// el mínimo. Luego llamar a un programa PHP donde rellene un array de 100 elementos
// con números enteros aleatorios comprendidos entre 0 y 500 (ambos incluidos). A
// continuación el programa mostrará el array Seguidamente se volverá a mostrar el
// array escribiendo el número destacado entre dobles asteriscos, dependiendo de lo que
// haya respondido el usuario.
// Ejemplo:
// ¿Qué quiere destacar? (mínimo, máximo): mínimo
// 459 204 20 250 178 90 353 32 229 357 224 454 260 310 140 249 332 426 423 413 96
// 447 465 29 8 459 411 118 480 302 417 42 82 126 82 474 362 76 190 104 21 257 88
// 21 251 6 383 47 78 392 394 244 494 87 253 376 379 98 364 237 13 299 228 409 402
// 225 426 267 330 243 209 426 435 309 356 173 130 416 15 477 34 28 377 193 481
// 368 466 262 422 275 384 399 397 87 218 84 312 480 207 68 108
// 459 204 20 250 178 90 353 32 229 357 224 454 260 310 140 249 332 426 423 413 96
// 447 465 29 8 459 411 118 480 302 417 42 82 126 82 474 362 76 190 104 21 257 88
// 21 251 **6** 383 47 78 392 394 244 494 87 253 376 379 98 364 237 13 299 228 409
// 402 225 426 267 330 243 209 426 435 309 356 173 130 416 15 477 34 28 377 193
// 481 368 466 262 422 275 384 399 397 87 218 84 312 480 207 68 108


function getRandomArray($lenght, $min, $max){  
    $randomArray = [];
    for($i = 0; $i < $lenght; $i++){
        $number = rand($min, $max);
        if (!in_array($number, $randomArray)){
            $randomArray[] = $number;
        };
    };
    return $randomArray;
};

function highlightNumber($randomArray, $highlight){
    $highlightedNumbers = $randomArray;
    $highlightIndex = ($highlight === 'minimum') ? array_search(min($randomArray), $randomArray) : array_search(max($randomArray), $randomArray);
    if ($highlightIndex !== false) {
        $highlightedNumbers[$highlightIndex] = '**' . $highlightedNumbers[$highlightIndex] . '**';
    }
    return $highlightedNumbers;
};

$highlight = $_POST['highlight'];
$randomArray = getRandomArray($length = 50, $min = 1, $max = 1000);
$highlightedNumbers = highlightNumber($randomArray, $highlight);

echo "Numeros generados <br>";
echo  "[" . implode (' ', $randomArray) . "]" . "<br><br>";
echo "Valor destacado <br>";
echo "[" . implode(' ', $highlightedNumbers) . "]";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 112</title>

</head>

<body>
    
    <!--  http://localhost/index112.html -->

    <form action="ejercicio112.php" method="post">
        <label for="highlight">Que valor desea destacar?</label>
        <select name="highlight" id="highlight" required>
          <option value="minimum">Minimo</option>
          <option value="maximum">Maximo</option>
        </select>
        <button type="submit">Mostrar numero destacado</button>
    </form>

</body>