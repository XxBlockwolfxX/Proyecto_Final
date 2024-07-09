<?php
switch ($controller) {
    case 'paciente':
        require_once('paciente/' . $action . '.php');
        break;
    case 'cita':
        require_once('cita/' . $action . '.php');
        break;
    case 'doctor':
        require_once('doctor/' . $action . '.php');
        break;
    case 'departamento':
        require_once('departamento/' . $action . '.php');
        break;
    case 'doctor_departamento':
        require_once('doctor_departamento/' . $action . '.php');
        break;
    case 'historial_medico':
        require_once('historial_medico/' . $action . '.php');
        break;
    case 'receta':
        require_once('receta/' . $action . '.php');
        break;
    case 'main':
        require_once('main.php');
        break;
    default:
        require_once('main.php');
        break;
}
?>
