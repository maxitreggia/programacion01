<?php
//En el servidor “localhost” cuyo usuario es “estudiante” y cuya contraseña es “final”,
//hay una BD llamada “prog2”, que tiene una tabla llamada “alumnos”.
//La tabla “alumnos” tiene una clave primaria llamada dni (entero), un campo llamado
//nombre (cadena) y otro llamado apellido (cadena).
//Obviamente, no puede haber dos estudiantes con el mismo DNI.
//Programar un script PHP que reciba por POST el DNI, el nombre y el apellido de un
//alumno, y que agregue este nuevo registro en la tabla. Se debe validar que el alumno
//no haya sido ingresado en la BD con anterioridad.

// Clase Alumno
class Alumno
{
    // Atributos
    private int $dni;
    private string $nombre;
    private string $apellido;

    // Constructor
    public function __construct(int $dni,string $nombre,string $apellido)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    // Métodos

    /**
     * @return bool
     */
    public function agregarAlumno(): bool
    {
        // Obtener los parámetros del método POST
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];

        // Validar que el alumno no haya sido ingresado en la BD
        $databaseConnection = new DatabaseConnection("localhost", "estudiante", "final", "prog2");
        $query = "SELECT dni FROM alumnos WHERE dni = $dni";
        $result = $databaseConnection->executeQuery($query);
        if ($result->num_rows > 0) {
            return false;
        }

        // Agregar el alumno a la base de datos
        $query = "INSERT INTO alumnos (dni, nombre, apellido)
                VALUES ($dni, '$nombre', '$apellido')";
        $databaseConnection->executeQuery($query);

        return true;
    }
}

// Clase DatabaseConnection
class DatabaseConnection
{
    private string $server;
    private string $username;
    private string $password;
    private string $database;

    public function __construct($server, $username, $password, $database) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    private function connect():mysqli {
        $connection = new mysqli($this->server, $this->username, $this->password, $this->database);
        if ($connection->connect_error) {
            die("Error al conectarse a la base de datos: " . $connection->connect_error);
        }
        return $connection;
    }

    public function executeQuery(string $query):mysqli_result {
        $connection = $this->connect();
        $result = $connection->query($query);
        $connection->close();
        return $result;
    }
}