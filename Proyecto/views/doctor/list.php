<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Doctores</title>
</head>
<body>
    <h1>Listado de Doctores</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
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
            $query = "SELECT * FROM doctores";
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_doctor']; ?></td>
                    <td><?php echo $fila['nombre_doctor']; ?></td>
                    <td><?php echo $fila['especialidad']; ?></td>
                    <td>
                        <button class="editDoctor" data-id="<?php echo $fila['id_doctor']; ?>">Editar</button>
                        <button class="deleteDoctor" data-id="<?php echo $fila['id_doctor']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Doctores</h2>
    <form id="DoctorForm">
        <label for="nombre_doctor">Nombre:</label>
        <input type="text" id="nombre_doctor" name="nombre_doctor" required>
        <br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required>
        <br>
        <button type="submit" id="submitDoctorForm">Guardar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/doctores.js"></script>
</body>
</html>
