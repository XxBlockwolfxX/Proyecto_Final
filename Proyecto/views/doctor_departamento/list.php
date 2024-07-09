<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Doctor-Departamento</title>
</head>
<body>
    <h1>Listado de Doctor-Departamento</h1>
    <?php
    require_once('../../controllers/doctor_departamento.controller.php');
    $doctor_departamento = new Clase_DoctorDepartamento();
    $datos = $doctor_departamento->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Doctor</th>
                <th>ID Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_doctor_departamento']; ?></td>
                    <td><?php echo $fila['id_doctor']; ?></td>
                    <td><?php echo $fila['id_departamento']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_doctor_departamento']; ?>">Editar</a>
                        <a href="../../controllers/doctor_departamento.controller.php?op=eliminar&id=<?php echo $fila['id_doctor_departamento']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
