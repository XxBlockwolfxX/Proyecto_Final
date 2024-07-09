<?php
require_once('../config/conexion.php');

class Clase_DoctorDepartamento
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "SELECT * FROM doctores_departamentos";
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
            $cadena = "SELECT * FROM doctores_departamentos WHERE id_doctor_departamento = $id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertar($id_doctor, $id_departamento)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "INSERT INTO `doctores_departamentos`(`id_doctor`, `id_departamento`) VALUES ($id_doctor, $id_departamento)";
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

    public function actualizar($id, $id_doctor, $id_departamento)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "UPDATE `doctores_departamentos` SET `id_doctor`=$id_doctor,`id_departamento`=$id_departamento WHERE `id_doctor_departamento`=$id";
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
            $cadena = "DELETE FROM doctores_departamentos WHERE id_doctor_departamento = $id";
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
