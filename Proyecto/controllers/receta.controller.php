<?php

require_once('../models/receta.model.php');
$receta = new Clase_Receta();

switch ($_GET['op']) {
    case "todos":
        $datos = array();
        $datos = $receta->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $receta->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $id_cita = $_POST["id_cita"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $receta->insertar($id_cita, $descripcion);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $id_cita = $_POST["id_cita"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $receta->actualizar($id, $id_cita, $descripcion);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $receta->eliminar($id);
        echo json_encode($datos);
        break;
}
?>
