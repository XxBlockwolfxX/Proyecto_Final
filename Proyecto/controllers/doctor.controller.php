<?php
require_once('../config/conexion.php');
require_once('../models/doctor.model.php');
$doctor = new Clase_Doctor();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

switch ($_GET['op']) {
    case "uno":
        $id = json_decode(file_get_contents("php://input"))->id;
        $datos = $doctor->uno($id);
        $doctorData = mysqli_fetch_assoc($datos);
        if ($doctorData) {
            echo json_encode($doctorData);
        } else {
            echo json_encode(["success" => false, "message" => "Doctor no encontrado"]);
        }
        break;
    case "insertar":
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre_doctor = $data["nombre_doctor"];
        $especialidad = $data["especialidad"];
        $result = $doctor->insertar($nombre_doctor, $especialidad);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "actualizar":
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre_doctor = $data["nombre_doctor"];
        $especialidad = $data["especialidad"];
        $result = $doctor->actualizar($id, $nombre_doctor, $especialidad);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "eliminar":
        $id = $_GET['id'];
        $result = $doctor->eliminar($id);
        echo json_encode(["success" => $result == "ok"]);
        break;
    default:
        echo json_encode(["success" => false, "message" => "Operación no válida"]);
        break;
}
?>