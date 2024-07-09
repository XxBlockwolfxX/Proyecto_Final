<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Doctor-Departamento</title>
</head>
<body>
    <h1>Listado de Doctor-Departamento</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Departamento</th>
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
            $query = "SELECT * FROM doctores_departamentos";
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_doctor_departamento']; ?></td>
                    <td><?php echo $fila['id_doctor']; ?></td>
                    <td><?php echo $fila['id_departamento']; ?></td>
                    <td>
                        <button class="editDocDepa" data-id="<?php echo $fila['id_doctor_departamento']; ?>">Editar</button>
                        <button class="deleteDocDepa" data-id="<?php echo $fila['id_doctor_departamento']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Doctor-Departamento</h2>
    <form id="DocDepaForm">
        <label for="id_doctor">ID Doctor:</label>
        <select id="id_doctor" name="id_doctor" required>
            <?php
            $queryDoctor = "SELECT id_doctor, nombre_doctor FROM doctores";
            $resultDoctor = mysqli_query($con, $queryDoctor);
            if (mysqli_num_rows($resultDoctor) > 0) {
                while ($doctor = mysqli_fetch_assoc($resultDoctor)) {
                    echo "<option value='{$doctor['id_doctor']}'>{$doctor['nombre_doctor']}</option>";
                }
            } else {
                echo "<option value=''>No hay doctores disponibles</option>";
            }
            ?>
        </select>
        <br>
        <label for="id_departamento">ID Departamento:</label>
        <select id="id_departamento" name="id_departamento" required>
            <?php
            $queryDepartamentos = "SELECT id_departamento, nombre_departamento FROM departamentos";
            $resultDepartamentos = mysqli_query($con, $queryDepartamentos);
            if (mysqli_num_rows($resultDepartamentos) > 0) {
                while ($departamento = mysqli_fetch_assoc($resultDepartamentos)) {
                    echo "<option value='{$departamento['id_departamento']}'>{$departamento['nombre_departamento']}</option>";
                }
            } else {
                echo "<option value=''>No hay departamentos disponibles</option>";
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
