<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Receta</title>
</head>
<body>
    <h1>Formulario de Receta</h1>
    <form id="recetaForm">
        <label for="id_cita">ID Cita:</label>
        <select id="id_cita" name="id_cita" required>
            <?php
            $path = realpath(dirname(__FILE__) . '/../../config/conexion.php');
            if (file_exists($path)) {
                require_once($path);
            } else {
                die("Error: El archivo de conexión no se encontró en la ruta especificada.");
            }

            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $queryCitas = "SELECT id_cita, fecha_cita FROM citas";
            $resultCitas = mysqli_query($con, $queryCitas);
            while ($cita = mysqli_fetch_assoc($resultCitas)) {
                echo "<option value='{$cita['id_cita']}'>Cita del {$cita['fecha_cita']}</option>";
            }
            ?>
        </select>
        <br>
        <label for="medicamento">Medicamento:</label>
        <input type="text" id="medicamento" name="medicamento" required>
        <br>
        <label for="dosis">Dosis:</label>
        <input type="text" id="dosis" name="dosis" required>
        <br>
        <button type="submit" id="submitRecetaForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/recetas.js"></script>
</body>
</html>
