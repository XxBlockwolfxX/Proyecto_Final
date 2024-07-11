<?php
require_once(__DIR__ . '/../config/conexion.php');

class Clase_Paciente {
    private $con;

    public function __construct() {
        $this->con = (new Clase_Conectar())->Procedimiento_Conectar();
    }

    public function probar() {
        return $this->con->error;
    }

    public function todos() {
        $cadena = "SELECT * FROM pacientes";
        $resultado = mysqli_query($this->con, $cadena);
        return $resultado;
    }

    public function uno($id) {
        $cadena = "SELECT * FROM pacientes WHERE id_paciente = $id";
        $resultado = mysqli_query($this->con, $cadena);
        return $resultado;
    }

    public function insertar($nombre, $apellido, $fecha_nacimiento) {
        $cadena = "INSERT INTO `pacientes`(`nombre`, `apellido`, `fecha_nacimiento`) VALUES ('$nombre','$apellido','$fecha_nacimiento')";
        if (mysqli_query($this->con, $cadena)) {
            return "ok";
        } else {
            return $this->con->error;
        }
    }

    public function actualizar($id, $nombre, $apellido, $fecha_nacimiento) {
        $cadena = "UPDATE `pacientes` SET `nombre`='$nombre',`apellido`='$apellido',`fecha_nacimiento`='$fecha_nacimiento' WHERE `id_paciente`=$id";
        if (mysqli_query($this->con, $cadena)) {
            return "ok";
        } else {
            return $this->con->error;
        }
    }

    public function eliminar($id) {
        $cadena = "DELETE FROM pacientes WHERE id_paciente = $id";
        try {
            if (mysqli_query($this->con, $cadena)) {
                return "ok";
            } else {
                throw new Exception($this->con->error);
            }
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
                return "No se puede eliminar el paciente porque tiene citas asociadas.";
            }
            return "Error al eliminar el paciente: " . $e->getMessage();
        }
    }

    public function buscarXNombre($nombre) {
        $cadena = "SELECT * FROM pacientes WHERE nombre = '$nombre'";
        $resultado = mysqli_query($this->con, $cadena);
        return $resultado;
    }
}
?>
