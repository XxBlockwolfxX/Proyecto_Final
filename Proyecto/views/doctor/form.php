<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Doctor</title>
</head>
<body>
    <h1>Formulario de Doctor</h1>
    <form id="doctorForm">
        <label for="nombre_doctor">Nombre:</label>
        <input type="text" id="nombre_doctor" name="nombre_doctor" required>
        <br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required>
        <br>
        <button type="submit" id="submitDoctorForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/doctores.js"></script>
</body>
</html>