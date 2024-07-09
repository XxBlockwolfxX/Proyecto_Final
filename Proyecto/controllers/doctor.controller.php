<?php

require_once('../models/doctor.model.php');
$doctor = new Clase_Doctor();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $doctor->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $doctor->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $nombre_doctor = $_POST["nombre_doctor"];
        $especialidad = $_POST["especialidad"];
        $datos = array();
        $datos = $doctor->insertar($nombre_doctor, $especialidad);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $nombre_doctor = $_POST["nombre_doctor"];
        $especialidad = $_POST["especialidad"];
        $datos = array();
        $datos = $doctor->actualizar($id, $nombre_doctor, $especialidad);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $doctor->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
