<?php
// Crear un arreglo bidimensional de tamaño 5 x 5 y rellenarla de la siguiente forma: la
// posición [n, m] debe contener n + m. Después se debe mostrar su contenido.

function createMatrix($n, $m) {
  $matrix = array();
  for ($i = 0; $i < $n; $i++) {
      $row = array();
      for ($j = 0; $j < $m; $j++) {
          $row[] = 0;
      };
      $matrix[] = $row;
  };
  return $matrix;
};

function fillMatrix(&$matrix) {
  $n = count($matrix);
  $m = count($matrix[0]);
  for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
          $matrix[$i][$j] = $i + $j;
      };
  };
};

function displayMatrix($matrix) {
  $n = count($matrix);
  $m = count($matrix[0]);
  for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
          echo $matrix[$i][$j] . " ";
      };
      echo "<br>";
  };
};

$matrix = createMatrix(5, 5);

fillMatrix($matrix);
displayMatrix($matrix);
?>