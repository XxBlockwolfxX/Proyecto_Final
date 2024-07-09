<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Departamentos</title>
</head>
<body>
    <h1>Listado de Departamentos</h1>
    <?php
    require_once('../../controllers/departamento.controller.php');
    $departamento = new Clase_Departamento();
    $datos = $departamento->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_departamento']; ?></td>
                    <td><?php echo $fila['nombre_departamento']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_departamento']; ?>">Editar</a>
                        <a href="../../controllers/departamento.controller.php?op=eliminar&id=<?php echo $fila['id_departamento']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
