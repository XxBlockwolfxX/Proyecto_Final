<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>
</head>
<body>
    <h1>Listado de Citas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Fecha de la Cita</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ajusta la ruta según la estructura de tu proyecto
            $path = realpath(dirname(__FILE__) . '/../../config/conexion.php');
            if (file_exists($path)) {
                require_once($path);
            } else {
                die("Error: El archivo de conexión no se encontró en la ruta especificada.");
            }

            $con = new Clase_Conectar();
            $con = $con->Procedimiento_Conectar();
            $query = "SELECT c.id_cita, p.nombre AS nombre_paciente, d.nombre_doctor, c.fecha_cita, c.motivo 
                      FROM citas c
                      JOIN pacientes p ON c.id_paciente = p.id_paciente
                      JOIN doctores d ON c.id_doctor = d.id_doctor";
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_cita']; ?></td>
                    <td><?php echo $fila['nombre_paciente']; ?></td>
                    <td><?php echo $fila['nombre_doctor']; ?></td>
                    <td><?php echo $fila['fecha_cita']; ?></td>
                    <td><?php echo $fila['motivo']; ?></td>
                    <td>
                        <button class="editCita" data-id="<?php echo $fila['id_cita']; ?>">Editar</button>
                        <button class="deleteCita" data-id="<?php echo $fila['id_cita']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Cita</h2>
    <form id="citaForm">
        <label for="id_paciente">ID Paciente:</label>
        <select id="id_paciente" name="id_paciente" required>
            <?php
            $queryPacientes = "SELECT id_paciente, nombre FROM pacientes";
            $resultPacientes = mysqli_query($con, $queryPacientes);
            if (mysqli_num_rows($resultPacientes) > 0) {
                while ($paciente = mysqli_fetch_assoc($resultPacientes)) {
                    echo "<option value='{$paciente['id_paciente']}'>{$paciente['nombre']}</option>";
                }
            } else {
                echo "<option value=''>No hay pacientes disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="id_doctor">ID Doctor:</label>
        <select id="id_doctor" name="id_doctor" required>
            <?php
            $queryDoctores = "SELECT id_doctor, nombre_doctor FROM doctores";
            $resultDoctores = mysqli_query($con, $queryDoctores);
            if (mysqli_num_rows($resultDoctores) > 0) {
                while ($doctor = mysqli_fetch_assoc($resultDoctores)) {
                    echo "<option value='{$doctor['id_doctor']}'>{$doctor['nombre_doctor']}</option>";
                }
            } else {
                echo "<option value=''>No hay doctores disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="fecha_cita">Fecha de la Cita:</label>
        <input type="date" id="fecha_cita" name="fecha_cita" required>
        <br>
        <label for="motivo">Motivo:</label>
        <input type="text" id="motivo" name="motivo" required>
        <br>
        <button type="submit" id="submitCitaForm">Guardar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/citas.js"></script>
</body>
</html>
