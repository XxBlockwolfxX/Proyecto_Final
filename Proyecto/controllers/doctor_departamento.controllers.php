<?php
require_once('../config/conexion.php');
require_once('../models/doctor_departamento.model.php');
$doctor_departamento = new Clase_Doctor_Departamento();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

try {
    switch ($_GET['op']) {
        case "uno":
            $id = json_decode(file_get_contents("php://input"))->id;
            $datos = $doctor_departamento->uno($id);
            $doctorDepartamentoData = mysqli_fetch_assoc($datos);
            if ($doctorDepartamentoData) {
                echo json_encode($doctorDepartamentoData);
            } else {
                echo json_encode(["success" => false, "message" => "Registro no encontrado"]);
            }
            break;
        case "insertar":
            $data = json_decode(file_get_contents("php://input"), true);
            $id_doctor = $data["id_doctor"];
            $id_departamento = $data["id_departamento"];
            $result = $doctor_departamento->insertar($id_doctor, $id_departamento);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "actualizar":
            $id = $_GET['id'];
            $data = json_decode(file_get_contents("php://input"), true);
            $id_doctor = $data["id_doctor"];
            $id_departamento = $data["id_departamento"];
            $result = $doctor_departamento->actualizar($id, $id_doctor, $id_departamento);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "eliminar":
            $id = $_GET['id'];
            $result = $doctor_departamento->eliminar($id);
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
