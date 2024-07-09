<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Historial Médico</title>
</head>
<body>
    <h1>Formulario de Historial Médico</h1>
    <form id="historialForm">
        <label for="id_paciente">ID Paciente:</label>
        <select id="id_paciente" name="id_paciente" required>
            <?php
            $path = realpath(dirname(__FILE__) . '/../../config/conexion.php');
            if (file_exists($path)) {
                require_once($path);
            } else {
                die("Error: El archivo de conexión no se encontró en la ruta especificada.");
            }

            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $queryPacientes = "SELECT id_paciente, nombre FROM pacientes";
            $resultPacientes = mysqli_query($con, $queryPacientes);
            while ($paciente = mysqli_fetch_assoc($resultPacientes)) {
                echo "<option value='{$paciente['id_paciente']}'>{$paciente['nombre']}</option>";
            }
            ?>
        </select>
        <br>
        <label for="enfermedad">Enfermedad:</label>
        <input type="text" id="enfermedad" name="enfermedad" required>
        <br>
        <label for="tratamiento">Tratamiento:</label>
        <input type="text" id="tratamiento" name="tratamiento" required>
        <br>
        <button type="submit" id="submitHistorialForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/historiales.js"></script>
</body>
</html>
