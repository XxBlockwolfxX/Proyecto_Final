document.addEventListener("DOMContentLoaded", function () {
    var submitButton = document.getElementById("submitHistorialForm");

    if (submitButton) {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            var data = {
                id_paciente: document.getElementById("id_paciente").value,
                enfermedad: document.getElementById("enfermedad").value,
                tratamiento: document.getElementById("tratamiento").value
            };
            
            var url = id ? `/Proyecto/Proyecto/controllers/historial_medico.controller.php?op=actualizar&id=${id}` : "/Proyecto/Proyecto/controllers/historial_medico.controller.php?op=insertar";
            
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert(`Historial médico ${id ? 'actualizado' : 'guardado'} exitosamente!`);
                        location.reload();
                    } else {
                        alert(`Error al ${id ? 'actualizar' : 'guardar'} el historial médico.`);
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    document.querySelectorAll(".editHistorial").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch("/Proyecto/Proyecto/controllers/historial_medico.controller.php?op=uno", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: id }),
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data) {
                        document.getElementById("id_paciente").value = data.id_paciente;
                        document.getElementById("enfermedad").value = data.enfermedad;
                        document.getElementById("tratamiento").value = data.tratamiento;
                        document.getElementById("submitHistorialForm").dataset.id = id;
                    } else {
                        alert("Error al cargar los datos del historial médico.");
                    }
                } catch (error) {
                    console.error("Error de parseo JSON:", error);
                    console.error("Respuesta del servidor:", text);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".deleteHistorial").forEach(function(button) {
        button.addEventListener("click", function () {
            var id = this.dataset.id;
            fetch(`/Proyecto/Proyecto/controllers/historial_medico.controller.php?op=eliminar&id=${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.text())  // Cambiado a .text() para ver la respuesta completa
            .then(text => {
                console.log(text);  // Mostrar la respuesta completa en la consola
                try {
                    var data = JSON.parse(text);
                    if (data.success) {
                        alert("Historial médico eliminado exitosamente!");
                        location.reload();
                    } else {
                        alert("Error al eliminar el historial médico.");
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
