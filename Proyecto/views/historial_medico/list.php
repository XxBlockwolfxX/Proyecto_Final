<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Historiales Médicos</title>
</head>
<body>
    <h1>Listado de Historiales Médicos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Enfermedad</th>
                <th>Tratamiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $path = realpath(dirname(__FILE__) . '/../../config/conexion.php');
            if (file_exists($path)) {
                require_once($path);
            } else {
                die("Error: El archivo de conexión no se encontró en la ruta especificada.");
            }

            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $query = "SELECT h.id_historial, p.nombre AS nombre_paciente, h.enfermedad, h.tratamiento 
                      FROM historial_medico h
                      JOIN pacientes p ON h.id_paciente = p.id_paciente";
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_historial']; ?></td>
                    <td><?php echo $fila['nombre_paciente']; ?></td>
                    <td><?php echo $fila['enfermedad']; ?></td>
                    <td><?php echo $fila['tratamiento']; ?></td>
                    <td>
                        <button class="editHistorial" data-id="<?php echo $fila['id_historial']; ?>">Editar</button>
                        <button class="deleteHistorial" data-id="<?php echo $fila['id_historial']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Historial Médico</h2>
    <form id="historialForm">
        <label for="id_paciente">ID Paciente:</label>
        <select id="id_paciente" name="id_paciente" required>
            <?php
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
