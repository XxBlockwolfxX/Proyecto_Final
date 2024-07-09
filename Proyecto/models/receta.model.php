<?php
class Clase_Receta {
    private $conn;

    public function __construct() {
        require_once('../config/conexion.php');
        $this->conn = (new Clase_Conectar())->Procedimiento_Conectar();
    }

    public function uno($id) {
        $query = "SELECT * FROM recetas WHERE id_receta = '$id'";
        return mysqli_query($this->conn, $query);
    }

    public function insertar($id_cita, $medicamento, $dosis) {
        $query = "INSERT INTO recetas (id_cita, medicamento, dosis) VALUES ('$id_cita', '$medicamento', '$dosis')";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function actualizar($id, $id_cita, $medicamento, $dosis) {
        $query = "UPDATE recetas SET id_cita = '$id_cita', medicamento = '$medicamento', dosis = '$dosis' WHERE id_receta = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }

    public function eliminar($id) {
        $query = "DELETE FROM recetas WHERE id_receta = '$id'";
        return mysqli_query($this->conn, $query) ? "ok" : "error";
    }
}
?>
