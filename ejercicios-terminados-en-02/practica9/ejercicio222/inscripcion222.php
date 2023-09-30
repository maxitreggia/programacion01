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

class Inscripcion {

    private int $legajo;
    private int $codigoMateria;
    private int $diaExamen;
    private int $mesExamen;
    private int $anioExamen;
    private string $apellidoNombre;
    private string $server;
    private string $username;
    private string $password;
    private string $database;

    public function __construct(array $datos) {
        $this->legajo = $datos["legajo"];
        $this->codigoMateria = $datos["codigoMateria"];
        $this->diaExamen = $datos["diaExamen"];
        $this->mesExamen = $datos["mesExamen"];
        $this->anioExamen = $datos["anioExamen"];
        $this->apellidoNombre = $datos["apellidoNombre"];
        $this->server = 'localhost';
        $this->username = 'tu_usuario';
        $this->password = 'tu_contraseña';
        $this->database = 'tu_base_de_datos';
    }

    private function connect(): mysqli {
        $connection = new mysqli($this->server, $this->username, $this->password, $this->database);
        if ($connection->connect_error) {
            die("Error al conectarse a la base de datos: " . $connection->connect_error);
        }
        return $connection;
    }

    public function agregarInscripcion():void {
        try {
            // Obtener la conexión a la base de datos.
            $connection = $this->connect();

            // Preparar la consulta SQL para insertar la inscripción.
            $sql = "INSERT INTO Inscripcion (legajo, codigoMateria, diaExamen, mesExamen, anioExamen, apellidoNombre) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);

            // Ejecutar la consulta con los valores de los atributos de la inscripción.
            $stmt->bind_param("ssssss", $this->legajo, $this->codigoMateria, $this->diaExamen, $this->mesExamen, $this->anioExamen, $this->apellidoNombre);
            $stmt->execute();

            // Comprobar si la inserción fue exitosa.
            if ($stmt->affected_rows > 0) {
                echo "Inscripción exitosa.";
            } else {
                echo "Error al agregar la inscripción.";
            }

            // Cerrar la conexión.
            $stmt->close();
            $connection->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
