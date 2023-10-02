<?php
//En el servidor “escuela” cuyo usuario es “alumno” y su contraseña es “examen”, hay
//una BD llamada “sistema”, que tiene una tabla llamada “cursos”, y otra tabla llamada
//“aulas”. La tabla “aulas” tiene un campo llamado “id_aula” (numerico, clave primaria),
//y otro llamado “ubicacion” (cadena). La tabla “cursos” tiene un campo “id” (clave
//primaria y numérica), un campo llamado “nombre” (cadena), y un campo llamado
//“id_aula” (numérico, clave foránea de la tabla “aulas”). Programar un script PHP que
//reciba por POST el id de un curso existente y el id de un aula. Modificar el valor
//correspondiente al aula para ese curso.

// Clase Curso
class Curso
{
    // Atributos
    private int $id;
    private string $nombre;
    private string $idAula;

    // Constructor
    public function __construct(int $id,string $nombre,string $idAula)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idAula = $idAula;
    }

    // Métodos
    public function modificarAula(): bool
    {
        // Obtener la conexión a la base de datos
        $databaseConnection = new DatabaseConnection("escuela", "alumno", "examen", "sistema");

        // Validar que el curso exista
        $query = "SELECT id FROM cursos WHERE id = $this->id";
        $result = $databaseConnection->executeQuery($query);
        if ($result->num_rows == 0) {
            return false;
        }

        // Actualizar el valor del aula
        $query = "UPDATE cursos SET id_aula = $this->idAula WHERE id = $this->id";
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