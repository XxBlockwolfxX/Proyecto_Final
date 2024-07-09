<?php
class Clase_Doctor_Departamento {
    private $conn;

    public function __construct() {
        require_once('../config/conexion.php');
        $this->conn = (new Clase_Conectar())->Procedimiento_Conectar();
    }

    public function uno($id) {
        $query = "SELECT * FROM doctores_departamentos WHERE id_doctor_departamento = '$id'";
        return mysqli_query($this->conn, $query);
    }

    public function insertar($id_doctor, $id_departamento) {
        $query = "INSERT INTO doctores_departamentos (id_doctor, id_departamento) VALUES ('$id_doctor', '$id_departamento')";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function actualizar($id, $id_doctor, $id_departamento) {
        $query = "UPDATE doctores_departamentos SET id_doctor = '$id_doctor', id_departamento = '$id_departamento' WHERE id_doctor_departamento = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function eliminar($id) {
        $query = "DELETE FROM doctores_departamentos WHERE id_doctor_departamento = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }
}
?>
