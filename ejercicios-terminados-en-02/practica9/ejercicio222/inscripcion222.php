<?php
//Se dispone de un conjunto de boletas de inscripción de alumnos a examen. Cada
//boleta tiene los siguientes datos (guardados en una tabla llamada Inscripción):
//- Nro de legajo (7 dígitos)
//- Código de materia (6 dígitos)
//- Día del examen (2 dígitos)
//- Mes del examen (2 dígitos)
//- Año del examen (4 dígitos)
//- Apellido y Nombre (25 caracteres)
//Desarrollar un programa que permita agregar más inscripciones de alumnos a los
//exámenes.

// Clase Inscripción
class Inscripcion
{
    // Atributos
    private int $legajo;
    private string $materia;
    private int $dia;
    private int $mes;
    private int $anio;
    private string $apellidoNombre;

    public function __construct($legajo, $materia, $dia, $mes, $anio, $apellidoNombre)
    {
        $this->legajo = $legajo;
        $this->materia = $materia;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
        $this->apellidoNombre = $apellidoNombre;
    }

    public function agregarInscripcion(): void
    {
        // Conectarse a la base de datos
        $db = new PDO("mysql:host=localhost;dbname=inscripciones", "root", "");

        // Preparar la consulta
        $sql = "INSERT INTO inscripciones (legajo, materia, dia, mes, anio, apellido_nombre)
                VALUES (:legajo, :materia, :dia, :mes, :anio, :apellido_nombre)";
        $stmt = $db->prepare($sql);

        // Asignar los valores a los parámetros
        $stmt->bindParam(":legajo", $this->legajo);
        $stmt->bindParam(":materia", $this->materia);
        $stmt->bindParam(":dia", $this->dia);
        $stmt->bindParam(":mes", $this->mes);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":apellido_nombre", $this->apellidoNombre);

        // Ejecutar la consulta
        $stmt->execute();

        // Cerrar la conexión
        $db = null;
    }
}

