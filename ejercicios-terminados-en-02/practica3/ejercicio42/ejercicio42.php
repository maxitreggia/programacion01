<?php
//Supongamos que dado un número de Documento Nacional de Identidad (DNI), un
//programa debe calcular por medio de un proceso matemático sencillo, una letra, que
//se basa en obtener el resto de la división entera del número de DNI y el número 23. A
//partir del resto de la división, se obtiene la letra seleccionándola dentro de un array de
//letras. El array de letras es ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S',
//'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T']; por lo que si el resto de la división es 0, la letra del DNI
//es la T y si el resto es 3 la letra es la A. Con estos datos, elaborar un programa HTML
//que pida al usuario un número de DNI y su letra. Luego en un programa PHP se debe
//comprobar si el número es menor que 0 o mayor que 99999999. Si ese es el caso, se
//muestra un mensaje al usuario indicando que el número proporcionado no es válido y
//el programa no muestra más mensajes. Si el número es válido, se calcula la letra que
//le corresponde según el método explicado anteriormente. Una vez calculada la letra,
//se debe comparar con la letra indicada por el usuario. Si no coinciden, se muestra un
//mensaje al usuario diciéndole que la letra que ha indicado no es correcta. En otro
//caso, se muestra un mensaje indicando que el número y la letra de DNI son correctos.

if(!isset($_POST['dni'])){
    echo "Error, debe ingresar su dni";
    exit();
};

if(!isset($_POST['userLetter'])){
    echo "Error, debe ingresar una letra";
    exit();
};

$dni = intval($_POST['dni']);
$userLetter = strtoupper($_POST['userLetter']);

if (!($dni > 0 && $dni <= 99999999)) { 
    echo "El dni debe de tener máximo ocho dígitos y ser mayor a cero";
    exit();
};

if (empty($userLetter) || !(preg_match('/^[A-Z]$/', $userLetter))){
    echo "Debe ingresar una letra y caracteres especiales no estan permitidos";
    exit();
};

function getLetterForDni($dni){
    $LETTERS = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    return $LETTERS[$dni % 23];
};

function assertCorrectLetter ($computedLetter, $userLetter){
    if($computedLetter == $userLetter){
        echo "La letra ingresada coidice";
    }else{
        echo "La letra ingresada no coicide";
    };
};

$computedLetter = getLetterForDni($dni);
$matchLetter = assertCorrectLetter($computedLetter, $userLetter);
?>