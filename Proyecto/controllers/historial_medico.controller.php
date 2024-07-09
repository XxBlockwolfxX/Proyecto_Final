<?php
require_once('../config/conexion.php');
require_once('../models/historial_medico.model.php');
$historial = new Clase_Historial();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

try {
    switch ($_GET['op']) {
        case "uno":
            $id = json_decode(file_get_contents("php://input"))->id;
            $datos = $historial->uno($id);
            $historialData = mysqli_fetch_assoc($datos);
            if ($historialData) {
                echo json_encode($historialData);
            } else {
                echo json_encode(["success" => false, "message" => "Historial médico no encontrado"]);
            }
            break;
        case "insertar":
            $data = json_decode(file_get_contents("php://input"), true);
            $id_paciente = $data["id_paciente"];
            $enfermedad = $data["enfermedad"];
            $tratamiento = $data["tratamiento"];
            $result = $historial->insertar($id_paciente, $enfermedad, $tratamiento);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "actualizar":
            $id = $_GET['id'];
            $data = json_decode(file_get_contents("php://input"), true);
            $id_paciente = $data["id_paciente"];
            $enfermedad = $data["enfermedad"];
            $tratamiento = $data["tratamiento"];
            $result = $historial->actualizar($id, $id_paciente, $enfermedad, $tratamiento);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "eliminar":
            $id = $_GET['id'];
            $result = $historial->eliminar($id);
            echo json_encode(["success" => $result == "ok"]);
            break;
        default:
            echo json_encode(["success" => false, "message" => "Operación no válida"]);
            break;
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>
