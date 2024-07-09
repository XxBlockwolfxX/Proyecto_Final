<?php
require_once('../config/conexion.php');

class Clase_Cita
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "SELECT * FROM citas";
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
            $cadena = "SELECT * FROM citas WHERE id_cita = $id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertar($id_paciente, $id_doctor, $fecha_cita, $motivo)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "INSERT INTO `citas`(`id_paciente`, `id_doctor`, `fecha_cita`, `motivo`) VALUES ($id_paciente, $id_doctor, '$fecha_cita', '$motivo')";
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

    public function actualizar($id, $id_paciente, $id_doctor, $fecha_cita, $motivo)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "UPDATE `citas` SET `id_paciente`=$id_paciente,`id_doctor`=$id_doctor,`fecha_cita`='$fecha_cita',`motivo`='$motivo' WHERE `id_cita`=$id";
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
            $cadena = "DELETE FROM citas WHERE id_cita = $id";
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
