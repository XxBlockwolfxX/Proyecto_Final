<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Departamento</title>
</head>
<body>
    <h1>Formulario de Departamento</h1>
    <form action="../../controllers/departamento.controller.php?op=insertar" method="post">
        <label for="nombre_departamento">Nombre del Departamento:</label>
        <input type="text" id="nombre_departamento" name="nombre_departamento" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
