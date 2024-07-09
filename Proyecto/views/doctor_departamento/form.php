<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Doctor-Departamento</title>
</head>
<body>
    <h1>Formulario de Cita</h1>
    <form id="DoctorDepaForm">
        <label for="id_doctor_departamento">ID:</label>
        <input type="text" id="id_doctor_departamento" name="id_doctor_departamento" required>
        <br>
        <label for="id_doctor">ID Doctor:</label>
        <input type="text" id="id_doctor" name="id_doctor" required>
        <br>
        <label for="id_departamento">ID Departamento:</label>
        <input type="date" id="id_departamento" name="id_departamento" required>
        <br>
        <button type="submit" id="submitDoctorDepaForm">Guardar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/Proyecto/Proyecto/public/js/doctores_departamentos.js"></script>
</body>
</html>
