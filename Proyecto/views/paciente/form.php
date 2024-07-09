<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Paciente</title>
</head>
<body>
    <h1>Formulario de Paciente</h1>
    <form action="../../controllers/paciente.controller.php?op=insertar" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
