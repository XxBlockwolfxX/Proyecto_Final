<?php

require_once('../models/paciente.model.php');
$paciente = new Clase_Paciente();

switch ($_GET['op']) {
    case "probar":
        $datos = array();
        $datos = $paciente->probar();
        echo json_encode($datos);
        break;
    case "todos":
        $datos = array();
        $datos = $paciente->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $id = $_POST["id"];
        $datos = array();
        $datos = $paciente->uno($id);
        echo json_encode(mysqli_fetch_assoc($datos));
        break;
    case "insertar":
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $direccion = $_POST["direccion"];
        $datos = array();
        $datos = $paciente->insertar($nombre, $apellido, $edad, $direccion);
        echo json_encode($datos);
        break;
    case "actualizar":
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $direccion = $_POST["direccion"];
        $datos = array();
        $datos = $paciente->actualizar($id, $nombre, $apellido, $edad, $direccion);
        echo json_encode($datos);
        break;
    case "eliminar":
        $id = $_POST["id"];
        $datos = array();
        $datos = $paciente->eliminar($id);
        echo json_encode($datos);
        break;
    case "buscarXNombre":
        $nombre = $_POST["nombre"];
        $datos = array();
        $datos = $paciente->buscarXNombre($nombre);
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
}
?>
