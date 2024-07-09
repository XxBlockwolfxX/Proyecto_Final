<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pacientes</title>
</head>
<body>
    <h1>Listado de Pacientes</h1>
    <a href="form.php">Insertar Paciente</a>
    <?php
    require_once(__DIR__ . '/../../controllers/paciente.controller.php');
    $paciente = new Clase_Paciente();
    $datos = $paciente->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_paciente']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido']; ?></td>
                    <td><?php echo $fila['fecha_nacimiento']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_paciente']; ?>">Editar</a>
                        <a href="../../controllers/paciente.controller.php?op=eliminar&id=<?php echo $fila['id_paciente']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
