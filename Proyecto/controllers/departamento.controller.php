<?php
require_once('../config/conexion.php');
require_once('../models/departamento.model.php');
$departamento = new Clase_Departamento();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

switch ($_GET['op']) {
    case "uno":
        $id = json_decode(file_get_contents("php://input"))->id;
        $datos = $departamento->uno($id);
        $departamentoData = mysqli_fetch_assoc($datos);
        if ($departamentoData) {
            echo json_encode($departamentoData);
        } else {
            echo json_encode(["success" => false, "message" => "Departamento no encontrado"]);
        }
        break;
    case "insertar":
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre_departamento = $data["nombre_departamento"];
        $result = $departamento->insertar($nombre_departamento);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "actualizar":
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre_departamento = $data["nombre_departamento"];
        $result = $departamento->actualizar($id, $nombre_departamento);
        echo json_encode(["success" => $result == "ok"]);
        break;
    case "eliminar":
        $id = $_GET['id'];
        $result = $departamento->eliminar($id);
        echo json_encode(["success" => $result == "ok"]);
        break;
    default:
        echo json_encode(["success" => false, "message" => "Operación no válida"]);
        break;
}
?>
