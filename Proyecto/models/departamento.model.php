<?php
require_once('../config/conexion.php');

class Clase_Departamento
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "SELECT * FROM departamentos";
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
            $cadena = "SELECT * FROM departamentos WHERE id_departamento = $id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertar($nombre_departamento)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "INSERT INTO `departamentos`(`nombre_departamento`) VALUES ('$nombre_departamento')";
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

    public function actualizar($id, $nombre_departamento)
    {
        try {
            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $cadena = "UPDATE `departamentos` SET `nombre_departamento`='$nombre_departamento' WHERE `id_departamento`=$id";
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
            $cadena = "DELETE FROM departamentos WHERE id_departamento = $id";
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
