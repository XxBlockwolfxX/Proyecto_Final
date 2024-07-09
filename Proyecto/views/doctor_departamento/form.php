<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Doctor-Departamento</title>
</head>
<body>
    <h1>Formulario de Doctor-Departamento</h1>
    <form id="docDepaForm">
        <input type="hidden" id="id_doctor_departamento" name="id_doctor_departamento">
        <label for="id_doctor">Doctor:</label>
        <select id="id_doctor" name="id_doctor" required>
            <?php
            $path = realpath(dirname(__FILE__) . '/../../config/conexion.php');
            if (file_exists($path)) {
                require_once($path);
            } else {
                die("Error: El archivo de conexión no se encontró en la ruta especificada.");
            }

            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $queryDoctores = "SELECT id_doctor, nombre FROM doctores";
            $resultDoctores = mysqli_query($con, $queryDoctores);
            while ($doctor = mysqli_fetch_assoc($resultDoctores)) {
                echo "<option value='{$doctor['id_doctor']}'>{$doctor['nombre']}</option>";
            }
            ?>
        </select>
        <br>
        <label for="id_departamento">Departamento:</label>
        <select id="id_departamento" name="id_departamento" required>
            <?php
            $queryDepartamentos = "SELECT id_departamento, nombre FROM departamentos";
            $resultDepartamentos = mysqli_query($con, $queryDepartamentos);
            while ($departamento = mysqli_fetch_assoc($resultDepartamentos)) {
                echo "<option value='{$departamento['id_departamento']}'>{$departamento['nombre']}</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit" id="submitDocDepaForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/doctores_departamentos.js"></script>
</body>
</html>
