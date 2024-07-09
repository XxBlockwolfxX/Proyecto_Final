<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Paciente</title>
</head>
<body>
    <h1>Insertar Paciente</h1>
    <form action="../../controllers/paciente.controller.php?op=insertar" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>
        <input type="submit" value="Insertar">
    </form>
    <a href="list.php">Volver al Listado</a>
</body>
</html>
