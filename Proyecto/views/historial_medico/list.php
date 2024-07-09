<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Historial Médico</title>
</head>
<body>
    <h1>Listado de Historial Médico</h1>
    <?php
    require_once('../../controllers/historial_medico.controller.php');
    $historial_medico = new Clase_HistorialMedico();
    $datos = $historial_medico->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Paciente</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_historial']; ?></td>
                    <td><?php echo $fila['id_paciente']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_historial']; ?>">Editar</a>
                        <a href="../../controllers/historial_medico.controller.php?op=eliminar&id=<?php echo $fila['id_historial']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
