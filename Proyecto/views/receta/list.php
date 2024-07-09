<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Recetas</title>
</head>
<body>
    <h1>Listado de Recetas</h1>
    <?php
    require_once('../../controllers/receta.controller.php');
    $receta = new Clase_Receta();
    $datos = $receta->todos();
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cita</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($datos)) { ?>
                <tr>
                    <td><?php echo $fila['id_receta']; ?></td>
                    <td><?php echo $fila['id_cita']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                    <td>
                        <a href="form.php?id=<?php echo $fila['id_receta']; ?>">Editar</a>
                        <a href="../../controllers/receta.controller.php?op=eliminar&id=<?php echo $fila['id_receta']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
