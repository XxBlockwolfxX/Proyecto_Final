document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitCitaForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                id_paciente: document.getElementById("id_paciente").value,
                id_doctor: document.getElementById("id_doctor").value,
                fecha_cita: document.getElementById("fecha_cita").value,
                motivo: document.getElementById("motivo").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/cita.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/cita.controller.php?op=insertar";
            
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`Cita ${id ? 'actualizada' : 'guardada'} exitosamente!`);
                    location.reload();
                } else {
                    alert(`Error al ${id ? 'actualizar' : 'guardar'} la cita.`);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    document.querySelectorAll(".editCita").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/cita.controller.php?op=uno", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById("id_paciente").value = data.id_paciente;
                    document.getElementById("id_doctor").value = data.id_doctor;
                    document.getElementById("fecha_cita").value = data.fecha_cita;
                    document.getElementById("motivo").value = data.motivo;
                    document.getElementById("submitCitaForm").dataset.id = id;
                } else {
                    alert("Error al cargar los datos de la cita.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteCita").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/cita.controller.php?op=eliminar&id=${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Cita eliminada exitosamente!");
                    location.reload();
                } else {
                    alert("Error al eliminar la cita.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
