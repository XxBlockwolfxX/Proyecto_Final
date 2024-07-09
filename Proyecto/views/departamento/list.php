<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Departamentos</title>
</head>
<body>
    <h1>Listado de Departamentos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
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
            $query = "SELECT id_departamento, nombre_departamento FROM departamentos";  // Asegúrate de que la columna "nombre_departamento" está seleccionada
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_departamento']; ?></td>
                    <td><?php echo $fila['nombre_departamento']; ?></td>
                    <td>
                        <button class="editDepartment" data-id="<?php echo $fila['id_departamento']; ?>">Editar</button>
                        <button class="deleteDepartment" data-id="<?php echo $fila['id_departamento']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Departamento</h2>
    <form id="departmentForm">
        <label for="nombre_departamento">Nombre:</label>
        <input type="text" id="nombre_departamento" name="nombre_departamento" required>
        <br>
        <button type="submit" id="submitDepartmentForm">Guardar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/departamentos.js"></script>
</body>
</html>
