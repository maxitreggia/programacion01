<?php
//En el servidor “localhost” cuyo usuario es “estudiante” y cuya contraseña es “final”,
//hay una BD llamada “prog2”, que tiene una tabla llamada “alumnos”.
//La tabla “alumnos” tiene una clave primaria llamada dni (entero), un campo llamado
//nombre (cadena) y otro llamado apellido (cadena).
//Obviamente, no puede haber dos estudiantes con el mismo DNI.
//Programar un script PHP que reciba por POST el DNI, el nombre y el apellido de un
//alumno, y que agregue este nuevo registro en la tabla. Se debe validar que el alumno
//no haya sido ingresado en la BD con anterioridad.

class BaseDeDatos {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=prog2', 'estudiante', 'final');
    }

    public function insertarAlumno(Alumno $alumno): void
    {
        $stmt = $this->pdo->prepare("SELECT * FROM alumnos WHERE dni = ?");
        $stmt->execute([$alumno->getDni()]);
        $alumnoEncontrado = $stmt->fetch();

        if ($alumnoEncontrado) {
            throw new Exception("Ya existe un alumno con el DNI " . $alumno->getDni());
        }

        $stmt = $this->pdo->prepare("INSERT INTO alumnos (dni, nombre, apellido) VALUES (?, ?, ?)");
        $stmt->execute([$alumno->getDni(), $alumno->getNombre(), $alumno->getLastname()]);
    }
}

class Alumno {
    private int $dni;
    private string $name;
    private string $lastname;

    public function __construct(int $dni, string $name, string $lastname) {
        $this->dni = $dni;
        $this->name = $name;
        $this->lastname = $lastname;
    }

    public function getDni(): int
    {
        return $this->dni;
    }

    public function getNombre(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
}