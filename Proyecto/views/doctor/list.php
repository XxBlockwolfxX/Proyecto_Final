<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Doctores</title>
</head>
<body>
    <h1>Listado de Doctores</h1>
    <?php
    require_once('../../controllers/doctor.controller.php');
    $doctor = new Clase_Doctor();
    $datos = $doctor->todos();
    ?>
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
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_doctor']; ?></td>
                    <td><?php echo $fila['nombre_doctor']; ?></td>
                    <td><?php echo $fila['especialidad']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_doctor']; ?>">Editar</a>
                        <a href="../../controllers/doctor.controller.php?op=eliminar&id=<?php echo $fila['id_doctor']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
