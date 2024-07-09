<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Doctor-Departamento</title>
</head>
<body>
    <h1>Formulario de Doctor-Departamento</h1>
    <form action="../../controllers/doctor_departamento.controller.php?op=insertar" method="post">
        <label for="id_doctor">ID Doctor:</label>
        <input type="number" id="id_doctor" name="id_doctor" required>
        <br>
        <label for="id_departamento">ID Departamento:</label>
        <input type="number" id="id_departamento" name="id_departamento" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
