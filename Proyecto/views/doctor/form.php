<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Doctor</title>
</head>
<body>
    <h1>Formulario de Doctor</h1>
    <form action="../../controllers/doctor.controller.php?op=insertar" method="post">
        <label for="nombre_doctor">Nombre:</label>
        <input type="text" id="nombre_doctor" name="nombre_doctor" required>
        <br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
