<?php

require_once('../models/doctor_departamento.model.php');
$doctor_departamento = new Clase_DoctorDepartamento();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $doctor_departamento->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $doctor_departamento->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $id_doctor = $_POST["id_doctor"];
        $id_departamento = $_POST["id_departamento"];
        $datos = array();
        $datos = $doctor_departamento->insertar($id_doctor, $id_departamento);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $id_doctor = $_POST["id_doctor"];
        $id_departamento = $_POST["id_departamento"];
        $datos = array();
        $datos = $doctor_departamento->actualizar($id, $id_doctor, $id_departamento);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $doctor_departamento->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
