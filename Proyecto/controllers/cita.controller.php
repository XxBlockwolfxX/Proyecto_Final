<?php

require_once('../models/cita.model.php');
$cita = new Clase_Cita();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $cita->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $cita->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $id_paciente = $_POST["id_paciente"];
        $id_doctor = $_POST["id_doctor"];
        $fecha_cita = $_POST["fecha_cita"];
        $motivo = $_POST["motivo"];
        $datos = array();
        $datos = $cita->insertar($id_paciente, $id_doctor, $fecha_cita, $motivo);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $id_paciente = $_POST["id_paciente"];
        $id_doctor = $_POST["id_doctor"];
        $fecha_cita = $_POST["fecha_cita"];
        $motivo = $_POST["motivo"];
        $datos = array();
        $datos = $cita->actualizar($id, $id_paciente, $id_doctor, $fecha_cita, $motivo);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $cita->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
