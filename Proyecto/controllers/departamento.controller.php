<?php

require_once('../models/departamento.model.php');
$departamento = new Clase_Departamento();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $departamento->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $departamento->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $nombre_departamento = $_POST["nombre_departamento"];
        $datos = array();
        $datos = $departamento->insertar($nombre_departamento);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $nombre_departamento = $_POST["nombre_departamento"];
        $datos = array();
        $datos = $departamento->actualizar($id, $nombre_departamento);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $departamento->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
