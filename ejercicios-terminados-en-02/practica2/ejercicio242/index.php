<?php 
    //Elabore un programa que lea los valores para A y B, e imprima Y, W y Z.

    $valuesWereSent = array_key_exists( 'number_a', $_POST ) &&  array_key_exists( 'number_b', $_POST );

    function getNumberY($numberA, $numberB){
        return 3 * pow($numberA, 2) * pow($numberB, 2) * sqrt(2*$numberA);
    };

    function getNumberW($numberA, $numberB){
        $term1 = 4 * sqrt(pow(2, $numberA) * $numberA);
        $term2 = 3 * pow($numberA, 2) * pow($numberB, 2) - sqrt(2 * $numberA);
        return $term1 * $term2;
    }; 

    function getNumberZ($numberA, $numberB){
        $term1 = 12 * pow($numberA, 1/2);
        $term2 = pow($numberB, 3/4);
        return $term1 / $term2;
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio242</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <!--  http://localhost/index.html -->
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Ingrese el numero A y B</h4>
        </div>
    </div>
    <div class="row">
        <form class="col s12" action="" method="post">
            <div class="input-field col s6">
                <input class="" type="number" name="number_a">
                <label for="number">Ingrese un numero A</label> 
            </div>
            <div class="input-field col s6">
                <input class="" type="number" name="number_b">
                <label for="number">Ingrese un numero B</label>
            </div>
            <div class="col s12 center-align">
                <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Calcular</button>
            </div>
        </form>
    </div>
    <div class="row center-align">
        <div class="col s12">
            <div class="col s4"><h6>Formula Y: 3.a^2.b^2 √2 a</h6></div>
            <div class="col s4"><h6>Formula W: 4√2^a.a.(3.a^2.b^2-√2a)</h6></div>
            <div class="col s4"><h6>Formula Y: 12^a1/2 : b^3/4</h6></div>
        </div>  
    </div>
    <?php if($valuesWereSent) {?>
    <div class="row center-align">
        <div class="col s4">
            <h6>El resultado para Y es:</h6>
            <?php echo getNumberY($_POST['number_a'], $_POST['number_b']);?>
        </div>
        <div class="col s4">
            <h6>El resultado para W es:</h6>
            <?php echo getNumberW($_POST['number_a'], $_POST['number_b']);?>
        </div>
        <div class="col s4"> 
            <h6>El resultado para Z es:</h6>
            <?php echo getNumberZ($_POST['number_a'], $_POST['number_b']);?>
        </div>
    </div>
    <?php }?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>