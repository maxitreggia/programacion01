<?php
//En el servidor “escuela” cuyo usuario es “alumno” y su contraseña es “examen”, hay
//una BD llamada “sistema”, que tiene una tabla llamada “materias”. Esta tabla tiene
//dos campos: “id” (numérico – clave primaria) y “nombre” (cadena). Programar un script
//PHP con POO que borre una materia ingresada por un programa html. El “id” de la
//materia se recibe por GET.

class DatabaseConnection {
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

    public function deleteSubject(int $id): bool {
        $query = "DELETE FROM materias WHERE id = $id";
        $result = $this->executeQuery($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}