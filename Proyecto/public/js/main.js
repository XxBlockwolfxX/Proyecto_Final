document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitForm").addEventListener("click", function (e) {
        e.preventDefault();
        var data = {
            id_paciente: document.getElementById("id_paciente").value,
            id_doctor: document.getElementById("id_doctor").value,
            fecha_cita: document.getElementById("fecha_cita").value,
            motivo: document.getElementById("motivo").value,
        };
        
        fetch("../../controllers/cita.controller.php?op=insertar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Cita guardada exitosamente!");
                location.reload();
            } else {
                alert("Error al guardar la cita.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
