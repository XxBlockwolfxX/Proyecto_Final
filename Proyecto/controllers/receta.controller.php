<?php
require_once('../config/conexion.php');
require_once('../models/receta.model.php');
$receta = new Clase_Receta();

header('Content-Type: application/json');  // Asegúrate de que la respuesta sea JSON

try {
    switch ($_GET['op']) {
        case "uno":
            $id = json_decode(file_get_contents("php://input"))->id;
            $datos = $receta->uno($id);
            $recetaData = mysqli_fetch_assoc($datos);
            if ($recetaData) {
                echo json_encode($recetaData);
            } else {
                echo json_encode(["success" => false, "message" => "Receta no encontrada"]);
            }
            break;
        case "insertar":
            $data = json_decode(file_get_contents("php://input"), true);
            $id_cita = $data["id_cita"];
            $medicamento = $data["medicamento"];
            $dosis = $data["dosis"];
            $result = $receta->insertar($id_cita, $medicamento, $dosis);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "actualizar":
            $id = $_GET['id'];
            $data = json_decode(file_get_contents("php://input"), true);
            $id_cita = $data["id_cita"];
            $medicamento = $data["medicamento"];
            $dosis = $data["dosis"];
            $result = $receta->actualizar($id, $id_cita, $medicamento, $dosis);
            echo json_encode(["success" => $result == "ok"]);
            break;
        case "eliminar":
            $id = $_GET['id'];
            $result = $receta->eliminar($id);
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
