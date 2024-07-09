<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cita</title>
</head>
<body>
    <h1>Formulario de Cita</h1>
    <form id="citaForm">
        <label for="id_paciente">ID Paciente:</label>
        <input type="number" id="id_paciente" name="id_paciente" required>
        <br>
        <label for="id_doctor">ID Doctor:</label>
        <input type="number" id="id_doctor" name="id_doctor" required>
        <br>
        <label for="fecha_cita">Fecha de Cita:</label>
        <input type="date" id="fecha_cita" name="fecha_cita" required>
        <br>
        <label for="motivo">Motivo:</label>
        <input type="text" id="motivo" name="motivo" required>
        <br>
        <button type="submit" id="submitForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../../public/js/main.js"></script>
</body>
</html>
