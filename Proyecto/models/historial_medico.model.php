<?php
class Clase_Historial {
    private $conn;

    public function __construct() {
        require_once('../config/conexion.php');
        $this->conn = (new Clase_Conectar())->Procedimiento_Conectar();
    }

    public function uno($id) {
        $query = "SELECT * FROM historial_medico WHERE id_historial = '$id'";
        return mysqli_query($this->conn, $query);
    }

    public function insertar($id_paciente, $enfermedad, $tratamiento) {
        $query = "INSERT INTO historial_medico (id_paciente, enfermedad, tratamiento) VALUES ('$id_paciente', '$enfermedad', '$tratamiento')";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function actualizar($id, $id_paciente, $enfermedad, $tratamiento) {
        $query = "UPDATE historial_medico SET id_paciente = '$id_paciente', enfermedad = '$enfermedad', tratamiento = '$tratamiento' WHERE id_historial = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function eliminar($id) {
        $query = "DELETE FROM historial_medico WHERE id_historial = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }
}
?>
