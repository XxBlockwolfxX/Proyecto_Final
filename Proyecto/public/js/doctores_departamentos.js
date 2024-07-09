document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitDocDepaForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                id_paciente: document.getElementById("id_doctor_departamento").value,
                id_doctor: document.getElementById("id_doctor").value,
                fecha_cita: document.getElementById("id_departamento").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=insertar";
            
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

    document.querySelectorAll(".editDocDepa").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=uno", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById("id_doctor_departamento").value = data.id_doctor_departamento;
                    document.getElementById("id_doctor").value = data.id_doctor;
                    document.getElementById("id_departamento").value = data.id_departamento;
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
            fetch(`/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=eliminar&id=${id}`, {
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
