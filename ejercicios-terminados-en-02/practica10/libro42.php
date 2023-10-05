<?php
//Generar una clase llamada Libro, cuyos atributos sean: título, autor, cantidad de
//caracteres, y cantidad de ilustraciones. Asegurarse de que no se puedan crear
//instancias de esta clase. Dicha clase deberá contener los siguientes métodos:
//• Método constructor: Recibe los 4 atributos. Por simplicidad, omitir la validación.
//• calcularExtension(): Retorna "Largo", si el libro tiene más de un millón de caracteres,
//"Breve" si tiene menos de 150000 caracteres, y "Normal" de lo contrario.
//• calcularCostoEdicion(): Retorna el costo de edición de un ejemplar. Los libros
//"normales", tienen un costo de edición que se almacena en una constante de clase
//llamada COSTO, actualmente fijado en $100. Los libros "largos", tienen un costo de
//edición que equivale al doble de un libro "normal". Los libros "breves", tienen un costo
//de edición que equivale a la mitad de un libro "normal".
//Generar una subclase llamada LibroDigital, que herede de Libro.
//• Se desea que permita calcular la cantidad de bytes que tendrá el archivo. Se
//considera que cada caracter representa un byte, y que cada ilustración equivale a
//1000 bytes. Por ejemplo, si un libro tiene 150 000 caracteres y 4 ilustraciones, el libro
//ocupará 154 000 bytes.
//• Se desea también que pueda calcular su costo de edición. El costo de edición de un
//libro digital se calcula según lo que costaría editar 10 ejemplares de dicho libro en
//papel.

class Libro {
    const COST = 100;
    protected string $title;
    protected string $author;
    protected int $number_of_characters;
    protected int $number_of_illustrations;

    public function __construct(string $title, string $author, int $number_of_characters, int $number_of_illustrations) {
        $this->title = $title;
        $this->author = $author;
        $this->number_of_characters = $number_of_characters;
        $this->number_of_illustrations = $number_of_illustrations;
    }

    public static function createLibro(string $title, string $author, int $number_of_characters, int $number_of_illustrations): Libro
    {
        return new self($title, $author, $number_of_characters, $number_of_illustrations);
    }

    public function calculateExtension(): string
    {
        if ($this->number_of_characters > 1000000) {
            return "Long";
        } else if ($this->number_of_characters < 150000) {
            return "Short";
        } else {
            return "Normal";
        }
    }

    public function calculateEditingCost() {
        switch ($this->calculateExtension()) {
            case "Long":
                return self::COST * 2;
            case "Short":
                return self::COST / 2;
            default:
                return self::COST;
        }
    }
}

class LibroDigital extends Libro {
    public function calculateAmountOfBytes(): int
    {
        return $this->number_of_characters + ($this->number_of_illustrations * 1000);
    }

    public function calculateEditingCost(): float
    {
        return parent::calculateEditingCost() * 10;
    }
}