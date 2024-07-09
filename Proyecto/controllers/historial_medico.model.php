<?php

require_once('../models/historial_medico.model.php');
$historial_medico = new Clase_HistorialMedico();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $historial_medico->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $historial_medico->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $id_paciente = $_POST["id_paciente"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $historial_medico->insertar($id_paciente, $descripcion);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $id_paciente = $_POST["id_paciente"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $historial_medico->actualizar($id, $id_paciente, $descripcion);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $historial_medico->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
