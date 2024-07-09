<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Receta</title>
</head>
<body>
    <h1>Formulario de Receta</h1>
    <form action="../../controllers/receta.controller.php?op=insertar" method="post">
        <label for="id_cita">ID Cita:</label>
        <input type="number" id="id_cita" name="id_cita" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
