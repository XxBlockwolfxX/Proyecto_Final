<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .menu a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>Menú Principal</h1>
        <a href="index.php?controller=paciente&action=list">Gestionar Pacientes</a>
        <a href="index.php?controller=cita&action=list">Gestionar Citas</a>
        <a href="index.php?controller=doctor&action=list">Gestionar Doctores</a>
        <a href="index.php?controller=departamento&action=list">Gestionar Departamentos</a>
        <a href="index.php?controller=doctor_departamento&action=list">Gestionar Doctor-Departamento</a>
        <a href="index.php?controller=historial_medico&action=list">Gestionar Historial Médico</a>
        <a href="index.php?controller=receta&action=list">Gestionar Recetas</a>
    </div>
</body>
</html>
