<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Recetas</title>
</head>
<body>
    <h1>Listado de Recetas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cita</th>
                <th>Medicamento</th>
                <th>Dosis</th>
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
            $query = "SELECT r.id_receta, c.fecha_cita, r.medicamento, r.dosis 
                      FROM recetas r
                      JOIN citas c ON r.id_cita = c.id_cita";
            $result = mysqli_query($con, $query);
            
            while ($fila = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $fila['id_receta']; ?></td>
                    <td><?php echo $fila['fecha_cita']; ?></td>
                    <td><?php echo $fila['medicamento']; ?></td>
                    <td><?php echo $fila['dosis']; ?></td>
                    <td>
                        <button class="editReceta" data-id="<?php echo $fila['id_receta']; ?>">Editar</button>
                        <button class="deleteReceta" data-id="<?php echo $fila['id_receta']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Formulario de Receta</h2>
    <form id="recetaForm">
        <label for="id_cita">ID Cita:</label>
        <select id="id_cita" name="id_cita" required>
            <?php
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
