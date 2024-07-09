<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>
</head>
<body>
    <h1>Listado de Citas</h1>
    <?php
    require_once('../../controllers/cita.controller.php');
    $cita = new Clase_Cita();
    $datos = $cita->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Paciente</th>
                <th>ID Doctor</th>
                <th>Fecha de Cita</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_cita']; ?></td>
                    <td><?php echo $fila['id_paciente']; ?></td>
                    <td><?php echo $fila['id_doctor']; ?></td>
                    <td><?php echo $fila['fecha_cita']; ?></td>
                    <td><?php echo $fila['motivo']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_cita']; ?>">Editar</a>
                        <a href="../../controllers/cita.controller.php?op=eliminar&id=<?php echo $fila['id_cita']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
