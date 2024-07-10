document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitDocDepaForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                id_doctor_departamento: document.getElementById("id_doctor_departamento") ? document.getElementById("id_doctor_departamento").value : null,
                id_doctor: document.getElementById("id_doctor") ? document.getElementById("id_doctor").value : null,
                id_departamento: document.getElementById("id_departamento") ? document.getElementById("id_departamento").value : null
            };

            var url = id ? `/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=insertar";

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log("Respuesta del servidor:", text);  // Depuración: imprimir respuesta completa
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert(`Registro ${id ? 'actualizado' : 'guardado'} exitosamente!`);
                        location.reload();
                    } else {
                        alert(`Error al ${id ? 'actualizar' : 'guardar'} el registro.`);
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
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
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log("Respuesta del servidor:", text);  // Depuración: imprimir respuesta completa
                try {
                    var data = JSON.parse(text);
                    if (data) {
                        if (document.getElementById("id_doctor_departamento")) document.getElementById("id_doctor_departamento").value = data.id_doctor_departamento;
                        if (document.getElementById("id_doctor")) document.getElementById("id_doctor").value = data.id_doctor;
                        if (document.getElementById("id_departamento")) document.getElementById("id_departamento").value = data.id_departamento;
                        document.getElementById("submitDocDepaForm").dataset.id = id;
                    } else {
                        alert("Error al cargar los datos.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteDocDepa").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/doctor_departamento.controllers.php?op=eliminar&id=${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log("Respuesta del servidor:", text);  // Depuración: imprimir respuesta completa
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert("Registro eliminado exitosamente!");
                        location.reload();
                    } else {
                        alert("Error al eliminar el registro.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
