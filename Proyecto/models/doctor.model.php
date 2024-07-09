<?php
require_once('../config/conexion.php');

class Clase_Doctor
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "SELECT * FROM doctores";
            $resultado = mysqli_query($con, $cadena);
            $con->close();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function uno($id)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "SELECT * FROM doctores WHERE id_doctor = $id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertar($nombre_doctor, $especialidad)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "INSERT INTO `doctores`(`nombre_doctor`, `especialidad`) VALUES ('$nombre_doctor', '$especialidad')";
            if (mysqli_query($con, $cadena)) {
                return "ok";
                $con->close();
            } else {
                return $con->error;
                $con->close();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizar($id, $nombre_doctor, $especialidad)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "UPDATE `doctores` SET `nombre_doctor`='$nombre_doctor',`especialidad`='$especialidad' WHERE `id_doctor`=$id";
            if (mysqli_query($con, $cadena)) {
                return "ok";
            } else {
                return $con->error;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($id)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "DELETE FROM doctores WHERE id_doctor = $id";
            if (mysqli_query($con, $cadena)) {
                return "ok";
            } else {
                return $con->error;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }
}
?>
