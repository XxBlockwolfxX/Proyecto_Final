<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Departamento</title>
</head>
<body>
    <h1>Formulario de Departamento</h1>
    <form id="departmentForm">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br>
        <button type="submit" id="submitDepartmentForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/departamentos.js"></script>
</body>
</html>
