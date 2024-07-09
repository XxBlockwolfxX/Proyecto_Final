document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitPatientForm").addEventListener("click", function (e) {
        e.preventDefault();
        var data = {
            nombre: document.getElementById("nombre").value,
            apellido: document.getElementById("apellido").value,
            fecha_nacimiento: document.getElementById("fecha_nacimiento").value,
        };
        
        fetch("../../controllers/paciente.controller.php?op=insertar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Paciente guardado exitosamente!");
                location.reload();
            } else {
                alert("Error al guardar el paciente.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
