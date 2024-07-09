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

    public function insertar($nombre, $apellido, $edad, $direccion) {
        $cadena = "INSERT INTO `pacientes`(`nombre`, `apellido`, `edad`, `direccion`) VALUES ('$nombre','$apellido',$edad,'$direccion')";
        if (mysqli_query($this->con, $cadena)) {
            return "ok";
        } else {
            return $this->con->error;
        }
    }

    public function actualizar($id, $nombre, $apellido, $edad, $direccion) {
        $cadena = "UPDATE `pacientes` SET `nombre`='$nombre',`apellido`='$apellido',`edad`=$edad,`direccion`='$direccion' WHERE `id_paciente`=$id";
        if (mysqli_query($this->con, $cadena)) {
            return "ok";
        } else {
            return $this->con->error;
        }
    }

    public function eliminar($id) {
        $cadena = "DELETE FROM pacientes WHERE id_paciente = $id";
        if (mysqli_query($this->con, $cadena)) {
            return "ok";
        } else {
            return $this->con->error;
        }
    }

    public function buscarXNombre($nombre) {
        $cadena = "SELECT * FROM pacientes WHERE nombre = '$nombre'";
        $resultado = mysqli_query($this->con, $cadena);
        return $resultado;
    }
}
?>
