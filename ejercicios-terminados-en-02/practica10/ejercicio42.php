<?php
require_once "libro42.php";

$title = $_POST['title'];
$author = $_POST['author'];
$number_of_characters = $_POST['number_of_characters'];
$number_of_illustrations = $_POST['number_of_illustrations'];

$book = LibroDigital::createLibro($title, $author, $number_of_characters, $number_of_illustrations);

$editing_cost = $book->calculateEditingCost();

echo "El costo de edición del libro es $" . $editing_cost . ".<br>";