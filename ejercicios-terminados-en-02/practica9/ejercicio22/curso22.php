<?php

class Curso {
    public $id;
    public $nombre;
    public $id_aula;

    public function __construct($id, $nombre, $id_aula) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_aula = $id_aula;
    }

    public function actualizarAula($id_aula) {
        $this->id_aula = $id_aula;
    }

    public function guardar() {
        $db = new PDO('mysql:host=escuela;dbname=sistema', 'alumno', 'examen');
        $stmt = $db->prepare("UPDATE cursos SET id_aula = :id_aula WHERE id = :id");
        $stmt->bindParam(':id_aula', $this->id_aula);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
}

class Aula {
    public $id_aula;
    public $ubicacion;

    public function __construct($id_aula, $ubicacion) {
        $this->id_aula = $id_aula;
        $this->ubicacion = $ubicacion;
    }

    public static function obtenerPorId($id_aula) {
        $db = new PDO('mysql:host=escuela;dbname=sistema', 'alumno', 'examen');
        $stmt = $db->prepare("SELECT * FROM aulas WHERE id_aula = :id_aula");
        $stmt->bindParam(':id_aula', $id_aula);
        $stmt->execute();
        $aula = $stmt->fetchObject(Aula::class);
        return $aula;
    }

    public static function obtenerTodos() {
        $db = new PDO('mysql:host=escuela;dbname=sistema', 'alumno', 'examen');
        $stmt = $db->prepare("SELECT * FROM aulas");
        $stmt->execute();
        $aulas = [];
        while ($aula = $stmt->fetchObject(Aula::class)) {
            $aulas[] = $aula;
        }
        return $aulas;
    }
}