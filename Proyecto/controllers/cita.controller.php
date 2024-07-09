<?php
require_once('../config/conexion.php');
require_once('../models/cita.model.php');
$cita = new Clase_Cita();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

switch ($_GET['op']) {
    case "uno":
        $id = json_decode(file_get_contents("php://input"))->id;
        $datos = $cita->uno($id);
        $citaData = mysqli_fetch_assoc($datos);
        if ($citaData) {
            echo json_encode($citaData);
        } else {
            echo json_encode(["success" => false, "message" => "Cita no encontrada"]);
        }
        break;
    case "insertar":
        $data = json_decode(file_get_contents("php://input"), true);
        $id_paciente = $data["id_paciente"];
        $id_doctor = $data["id_doctor"];
        $fecha_cita = $data["fecha_cita"];
        $motivo = $data["motivo"];
        $result = $cita->insertar($id_paciente, $id_doctor, $fecha_cita, $motivo);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "actualizar":
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $id_paciente = $data["id_paciente"];
        $id_doctor = $data["id_doctor"];
        $fecha_cita = $data["fecha_cita"];
        $motivo = $data["motivo"];
        $result = $cita->actualizar($id, $id_paciente, $id_doctor, $fecha_cita, $motivo);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "eliminar":
        $id = $_GET['id'];
        $result = $cita->eliminar($id);
        echo json_encode(["success" => $result == "ok"]);
        break;
    default:
        echo json_encode(["success" => false, "message" => "Operación no válida"]);
        break;
}
?>
